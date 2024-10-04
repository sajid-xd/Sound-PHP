<?php
include "nav.php"; // Navigation

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['music_file']) && isset($_FILES['image_file'])) {
    $artistId = intval($_POST['artist_id']);
    $albumId = intval($_POST['album_id']);
    $yearId = intval($_POST['year_id']);
    
    // Music file handling
    $musicFileName = $_FILES['music_file']['name'];
    $musicFileTmpName = $_FILES['music_file']['tmp_name'];
    $musicFileType = pathinfo($musicFileName, PATHINFO_EXTENSION);
    
    // Image file handling
    $imageFileName = $_FILES['image_file']['name'];
    $imageFileTmpName = $_FILES['image_file']['tmp_name'];
    $imageFileType = pathinfo($imageFileName, PATHINFO_EXTENSION);

    // Directory to store uploaded files
    $uploadDir = 'uploads/';
    $imageDir = 'uploads/images/'; // Separate directory for images

    // Ensure upload directories exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    if (!is_dir($imageDir)) {
        mkdir($imageDir, 0755, true);
    }

    // Move uploaded music file
    if (move_uploaded_file($musicFileTmpName, $uploadDir . $musicFileName) &&
        move_uploaded_file($imageFileTmpName, $imageDir . $imageFileName)) {
        
        // Insert the music record into the database
        $insertQuery = "INSERT INTO music (name, artist, album, year, soucre, isaudio, icon) 
                        VALUES ('$musicFileName', $artistId, $albumId, $yearId, '$musicFileName', " . ($musicFileType == 'mp3' ? 1 : 0) . ", '$imageFileName')";
        if (mysqli_query($con, $insertQuery)) {
            echo "<div class='alert alert-success'>Music file uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error uploading file: " . mysqli_error($con) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Failed to move uploaded files.</div>";
    }
}

// Handle deletion
if (isset($_GET['delete_id'])) {
    $deleteId = intval($_GET['delete_id']);
    $deleteQuery = "DELETE FROM music WHERE id = $deleteId";
    if (mysqli_query($con, $deleteQuery)) {
        echo "<div class='alert alert-success'>Music entry deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting entry: " . mysqli_error($con) . "</div>";
    }
}

// Fetch artists, albums, and years for dropdowns
$artistsResult = mysqli_query($con, "SELECT * FROM artist");
$albumsResult = mysqli_query($con, "SELECT * FROM albums");
$yearsResult = mysqli_query($con, "SELECT * FROM years");

// Fetch all music entries for display
$songsResult = mysqli_query($con, "SELECT m.id, m.name, ar.name AS artist_name, a.name AS album_name, m.year, m.soucre, m.isaudio, m.icon 
                                    FROM music m 
                                    JOIN artist ar ON m.artist = ar.id 
                                    JOIN albums a ON m.album = a.id 
                                    ORDER BY m.id");
?>

<div class="container-fluid">
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Music Upload</h4>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Upload Form -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Upload New Music</h4>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="artist_id" class="form-label">Select Artist</label>
                            <select class="form-select" name="artist_id" required>
                                <option value="">Choose...</option>
                                <?php while ($artist = mysqli_fetch_assoc($artistsResult)): ?>
                                    <option value="<?= $artist['id'] ?>"><?= $artist['name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="album_id" class="form-label">Select Album</label>
                            <select class="form-select" name="album_id" required>
                                <option value="">Choose...</option>
                                <?php while ($album = mysqli_fetch_assoc($albumsResult)): ?>
                                    <option value="<?= $album['id'] ?>"><?= $album['name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="year_id" class="form-label">Select Year</label>
                            <select class="form-select" name="year_id" required>
                                <option value="">Choose...</option>
                                <?php while ($year = mysqli_fetch_assoc($yearsResult)): ?>
                                    <option value="<?= $year['id'] ?>"><?= $year['name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="music_file" class="form-label">Upload Music File (MP3/MP4)</label>
                            <input type="file" class="form-control" name="music_file" accept=".mp3, .mp4" required>
                        </div>
                        <div class="mb-3">
                            <label for="image_file" class="form-label">Upload Image File (PNG)</label>
                            <input type="file" class="form-control" name="image_file" accept=".png" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- Music Entries Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Music Entries</h4>
                    <table class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>Artist</th>
                                <th>Album</th>
                                <th>Year</th>
                                <th>Type</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($song = mysqli_fetch_assoc($songsResult)): ?>
                                <tr>
                                    <td><?= $song['name'] ?></td>
                                    <td><?= $song['artist_name'] ?></td>
                                    <td><?= $song['album_name'] ?></td>
                                    <td><?= $song['year'] ?></td>
                                    <td><?= $song['isaudio'] == 1 ? 'MP3' : 'MP4' ?></td>
                                    <td><img src="<?= "uploads/images/". $song['icon'] ?>" alt="<?= $song['icon'] ?>" width="50" height="50"></td>
                                    <td>
                                        <a href="?delete_id=<?= $song['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this entry?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- end container -->

<?php include "foot.php"; // Assuming your footer is included here ?>
