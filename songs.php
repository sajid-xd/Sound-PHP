<?php

$home='';


$songs='class="active"';

?>
<?php include "nav.php";?>
</br></br></br></br></br>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Discography</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Discography Section Begin -->
    <section class="discography spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-title">
                        <h2>Latest Releases</h2>
                        <h1>Discography</h1>
                    </div>
                </div>
            </div>
          <?php
// CONNECTION...
$con = mysqli_connect("localhost", "root", "", "sound");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize filter variables
$filterCondition = "";

// Check for GET parameters and build the filter condition
if (isset($_GET['year_id'])) {
    $yearId = intval($_GET['year_id']);
    $filterCondition .= " WHERE m.YEAR = $yearId";
}

if (isset($_GET['artist_id'])) {
    $artistId = intval($_GET['artist_id']);
    if ($filterCondition == "") {
        $filterCondition .= " WHERE m.ARTIST = $artistId";
    } else {
        $filterCondition .= " AND m.ARTIST = $artistId";
    }
}

if (isset($_GET['album_id'])) {
    $albumId = intval($_GET['album_id']);
    if ($filterCondition == "") {
        $filterCondition .= " WHERE m.ALBUM = $albumId";
    } else {
        $filterCondition .= " AND m.ALBUM = $albumId";
    }
}

// Fetch songs from the database with the filter
$songsQuery = "SELECT m.id, m.name AS song_name, m.icon, m.soucre, m.isaudio, a.name AS album_name, ar.name AS artist_name, m.YEAR
               FROM music m
               JOIN albums a ON m.ALBUM = a.id
               JOIN artist ar ON m.ARTIST = ar.id" . $filterCondition . 
               " ORDER BY m.id";

$songsResult = mysqli_query($con, $songsQuery);
$songCount = mysqli_num_rows($songsResult); // Count the number of songs retrieved
?>

<div class="container">
    <h2>Total Songs: <?php echo $songCount; ?></h2> <!-- Display the count of songs -->

    <div class="row">
        <?php
        if ($songCount > 0) {
            while ($song = mysqli_fetch_assoc($songsResult)) {
                // Determine player type based on isaudio field
                if ($song['isaudio'] == 1) {
                    $playerHTML = '<audio controls>
                                    <source src="admin/uploads/' . $song['soucre'] . '" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                  </audio>';
                } else {
                    $playerHTML = '<video controls width="250">
                                    <source src="admin/uploads/' . $song['soucre'] . '" type="video/mp4">
                                    Your browser does not support the video tag.
                                  </video>';
                }
        ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="discography__item">
                        <div class="discography__item__pic">
                            <img src="admin/uploads/images/<?php echo $song['icon']; ?>" alt="">
                        </div>
                        <div class="discography__item__text">
                            <span><?php echo $song['song_name']; ?></span>
                            <h4><?php echo $song['YEAR']; ?></h4>
                            <p>Album: <?php echo $song['album_name']; ?></p>
                            <p>Artist: <?php echo $song['artist_name']; ?></p>
                            <?php echo $playerHTML; ?>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>No songs found.</p>";
        }
        ?>
    </div>
</div>

<?php
// Close the database connection
mysqli_close($con);
?>

        </div>
    </section>
    <!-- Discography Section End -->
    </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
    <?php include "foot.php";?>