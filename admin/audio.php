<?php
   include "nav.php"; // Navigation
   
   // Handle file upload
   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['music_file'], $_FILES['image_file'])) {
       $artistId = intval($_POST['artist_id']);
       $albumId = intval($_POST['album_id']);
       $yearId = intval($_POST['year_id']);
       
       // Helper function to handle file uploads
       function handleFileUpload($file, $validExtensions) {
           $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
           return in_array($fileType, $validExtensions) ? $file : false;
       }
   
       $musicFile = handleFileUpload($_FILES['music_file'], ['mp3']);
       $imageFile = handleFileUpload($_FILES['image_file'], ['png', 'jpeg', 'jpg', 'gif']);
   
       if (!$musicFile) {
           echo "<div class='alert alert-danger'>Only MP3 files are allowed for upload.</div>";
       } elseif (!$imageFile) {
           echo "<div class='alert alert-danger'>Only PNG, JPEG, and GIF files are allowed for upload.</div>";
       } else {
           $uploadDir = 'uploads/';
           $imageDir = 'uploads/images/';
           foreach ([$uploadDir, $imageDir] as $dir) {
               if (!is_dir($dir)) mkdir($dir, 0755, true);
           }
   
           if (move_uploaded_file($musicFile['tmp_name'], $uploadDir . $musicFile['name']) &&
               move_uploaded_file($imageFile['tmp_name'], $imageDir . $imageFile['name'])) {
               
               $insertQuery = "INSERT INTO music (name, artist, album, year, soucre, isaudio, icon) 
                               VALUES ('{$musicFile['name']}', $artistId, $albumId, $yearId, '{$musicFile['name']}', 1, '{$imageFile['name']}')";
               echo mysqli_query($con, $insertQuery) ?
                   "<div class='alert alert-success'>Music file uploaded successfully!</div>" :
                   "<div class='alert alert-danger'>Error uploading file: " . mysqli_error($con) . "</div>";
           } else {
               echo "<div class='alert alert-danger'>Failed to move uploaded files.</div>";
           }
       }
   }
   
   // Handle deletion
   if (isset($_GET['delete_id'])) {
       $deleteId = intval($_GET['delete_id']);
       $deleteQuery = "DELETE FROM music WHERE id = $deleteId";
       echo mysqli_query($con, $deleteQuery) ?
           "<div class='alert alert-success'>Music entry deleted successfully!</div>" :
           "<div class='alert alert-danger'>Error deleting entry: " . mysqli_error($con) . "</div>";
   }
   
   // Fetch data for dropdowns
   $dropdownQueries = [
       'artists' => "SELECT * FROM artist",
       'albums' => "SELECT * FROM albums",
       'years' => "SELECT * FROM years"
   ];
   
   $dropdownResults = [];
   foreach ($dropdownQueries as $key => $query) {
       $dropdownResults[$key] = mysqli_query($con, $query);
   }
   
   // Fetch only MP3 music entries for display
   $songsResult = mysqli_query($con, "SELECT m.id, m.name, ar.name AS artist_name, a.name AS album_name, m.year, m.soucre, m.isaudio, m.icon 
                                       FROM music m 
                                       JOIN artist ar ON m.artist = ar.id 
                                       JOIN albums a ON m.album = a.id 
                                       WHERE m.isaudio = 1 
                                       ORDER BY m.id");
   ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <h4 class="page-title">Upload Audio Music</h4>
         </div>
      </div>
   </div>
   <div class="row mb-4">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h4 class="header-title">Upload New Music</h4>
               <form method="post" enctype="multipart/form-data">
                  <?php foreach (['artist' => 'Select Artist', 'album' => 'Select Album', 'year' => 'Select Year'] as $key => $label): ?>
                  <div class="mb-3">
                     <label for="<?= $key ?>_id" class="form-label"><?= $label ?></label>
                     <select class="form-select" name="<?= $key ?>_id" required>
                        <option value="">Choose...</option>
                        <?php while ($item = mysqli_fetch_assoc($dropdownResults["{$key}s"])): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endwhile; ?>
                     </select>
                  </div>
                  <?php endforeach; ?>
                  <div class="mb-3">
                     <label for="music_file" class="form-label">Upload Music File (MP3 Only)</label>
                     <input type="file" class="form-control" name="music_file" accept=".mp3" required>
                  </div>
                  <div class="mb-3">
                     <label for="image_file" class="form-label">Upload Music Image</label>
                     <input type="file" class="form-control" name="image_file" accept=".png, .jpg, .jpeg, .gif" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Upload</button>
               </form>
            </div>
         </div>
      </div>
   </div>
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
                        <td>MP3</td>
                        <td><img src="<?= "uploads/images/{$song['icon']}" ?>" alt="<?= $song['icon'] ?>" width="50" height="50"></td>
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
<?php include "foot.php"; ?>