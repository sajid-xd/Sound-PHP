<?php

$home = '';
$songs = 'class="active"';

?>
<?php include "nav.php"; ?>
</br></br></br></br></br>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Discography</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Search Bar Begin -->
<div class="container mt-2">
    <form method="GET" action="" style="width: 50%; margin: 0 auto;">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>

<!-- Search Bar End -->

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

        $filterCondition = "";

        // Add the search condition
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($con, $_GET['search']);
            $filterCondition .= " WHERE m.name LIKE '%$search%' OR ar.name LIKE '%$search%' OR a.name LIKE '%$search%'";
        }

        // Existing filters (year, artist, album)
        if (isset($_GET['year_id'])) {
            $yearId = intval($_GET['year_id']);
            $filterCondition .= ($filterCondition == "") ? " WHERE m.YEAR = $yearId" : " AND m.YEAR = $yearId";
        }

        if (isset($_GET['artist_id'])) {
            $artistId = intval($_GET['artist_id']);
            $filterCondition .= ($filterCondition == "") ? " WHERE m.ARTIST = $artistId" : " AND m.ARTIST = $artistId";
        }

        if (isset($_GET['album_id'])) {
            $albumId = intval($_GET['album_id']);
            $filterCondition .= ($filterCondition == "") ? " WHERE m.ALBUM = $albumId" : " AND m.ALBUM = $albumId";
        }

        // Query to get songs based on filters
        $songsQuery = "SELECT m.id, m.name AS song_name, m.icon, m.soucre, m.isaudio, a.name AS album_name, ar.name AS artist_name, m.YEAR
                       FROM music m
                       JOIN albums a ON m.ALBUM = a.id
                       JOIN artist ar ON m.ARTIST = ar.id" . $filterCondition . " ORDER BY m.id";

        $songsResult = mysqli_query($con, $songsQuery);
        $songCount = mysqli_num_rows($songsResult);
        ?>

        <div class="container">
            <h2>Total Songs: <?php echo $songCount; ?></h2>

            <div class="row">
                <?php
                if ($songCount > 0) {
                    while ($song = mysqli_fetch_assoc($songsResult)) {
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
        mysqli_close($con);
        ?>

    </div>
</section>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<?php include "foot.php"; ?>
