<?php 
   include "nav.php"; // Navigation
   
   // Handle file upload
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['music_file'], $_FILES['image_file'])) {
       $artistId = intval($_POST['artist_id']);
       $albumId = intval($_POST['album_id']);
       $yearId = intval($_POST['year_id']);
       
       // Handle uploads
       $musicFile = $_FILES['music_file'];
       $imageFile = $_FILES['image_file'];
       $uploadDir = 'uploads/videos/';
       $imageDir = 'uploads/images/';
       
       // Ensure upload directories exist
       foreach ([$uploadDir, $imageDir] as $dir) {
           if (!is_dir($dir)) mkdir($dir, 0755, true);
       }
   
       // Move uploaded files and validate formats
       if (pathinfo($musicFile['name'], PATHINFO_EXTENSION) === 'mp4' &&
           move_uploaded_file($musicFile['tmp_name'], $uploadDir . $musicFile['name']) &&
           in_array(pathinfo($imageFile['name'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']) &&
           move_uploaded_file($imageFile['tmp_name'], $imageDir . $imageFile['name'])) {
           
           // Insert the video record into the database
           $insertQuery = "INSERT INTO music (name, artist, album, year, soucre, isaudio, icon) 
                           VALUES ('{$musicFile['name']}', $artistId, $albumId, $yearId, '{$musicFile['name']}', 0, '{$imageFile['name']}')";
           echo mysqli_query($con, $insertQuery) 
               ? "<div class='alert alert-success'>Video file uploaded successfully!</div>" 
               : "<div class='alert alert-danger'>Error uploading file: " . mysqli_error($con) . "</div>";
       } else {
           echo "<div class='alert alert-danger'>Failed to move uploaded files. Only MP4 format for videos and JPG, JPEG, PNG, GIF for images are allowed.</div>";
       }
   }
   
   // Handle deletion
   if (isset($_GET['delete_id'])) {
       $deleteId = intval($_GET['delete_id']);
       echo mysqli_query($con, "DELETE FROM music WHERE id = $deleteId") 
           ? "<div class='alert alert-success'>Music entry deleted successfully!</div>" 
           : "<div class='alert alert-danger'>Error deleting entry: " . mysqli_error($con) . "</div>";
   }
   
   // Fetch artists, albums, and years for dropdowns
   $results = [
       'artists' => mysqli_query($con, "SELECT * FROM artist"),
       'albums' => mysqli_query($con, "SELECT * FROM albums"),
       'years' => mysqli_query($con, "SELECT * FROM years"),
   ];
   
   // Fetch all video entries for display
   $songsResult = mysqli_query($con, "SELECT m.id, m.name, ar.name AS artist_name, a.name AS album_name, m.year, m.soucre, m.isaudio, m.icon 
                                       FROM music m 
                                       JOIN artist ar ON m.artist = ar.id 
                                       JOIN albums a ON m.album = a.id 
                                       WHERE m.isaudio = 0 ORDER BY m.id");
   ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <h4 class="page-title">Upload Video Music</h4>
         </div>
      </div>
   </div>
   <!-- Upload Form -->
   <div class="row mb-4">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h4 class="header-title">Upload New Video</h4>
               <form method="post" enctype="multipart/form-data">
                  <?php foreach (['artist' => 'Select Artist', 'album' => 'Select Album', 'year' => 'Select Year'] as $key => $label): ?>
                  <div class="mb-3">
                     <label class="form-label"><?= $label ?></label>
                     <select class="form-select" name="<?= $key ?>_id" required>
                        <option value="">Choose...</option>
                        <?php while ($item = mysqli_fetch_assoc($results[$key . 's'])): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endwhile; ?>
                     </select>
                  </div>
                  <?php endforeach; ?>
                  <div class="mb-3">
                     <label class="form-label">Upload Video File (MP4 Only)</label>
                     <input type="file" class="form-control" name="music_file" accept=".mp4" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Upload Music Image</label>
                     <input type="file" class="form-control" name="image_file" accept=".jpg,.jpeg,.png,.gif" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Upload</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Video Entries Table -->
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h4 class="header-title">Video Entries</h4>
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
                        <td>MP4</td>
                        <td><img src="<?= "uploads/images/". $song['icon'] ?>" alt="<?= $song['icon'] ?>" width="50" height="50"></td>
                        <td>
                           <a href="?delete_id=<?= $song['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this entry?');">Delete</a>
                        </td>
                     </tr>
                     <?php endwhile; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include "foot.php"; // Footer ?>