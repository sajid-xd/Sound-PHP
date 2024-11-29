<?php

$home = '';
$songs = 'class="active"';

?>
<?php include "nav.php"; ?>
</br></br></br></br></br>

<style>
:root {
  --primary-color: #227093;
  --size: 48px;
}

.main-body {
  display: grid;
  place-items: center;
  min-height: 100vh;
  background: #f7f1e3;
}

fieldset {
  display: flex;
  align-items: center;
}

legend {
    padding-inline: 0.5rem;
    color: #000000;
    border-bottom: 2px solid #000000;
}

label {
  width: 0;
  overflow: hidden;
}

input {
  appearance: none;
  width: var(--size);
  height: var(--size);
  text-align: center;
  cursor: pointer;
}

input::after {
  content: "☆";
  font-size: calc(var(--size) * 3 / 4);
  line-height: var(--size);
  color: #ffc161;
}

input:is(:checked, :hover)::after,
input:has(~ input:is(:checked, :hover))::after {
  content: "★";
}

input:hover ~ input::after {
  content: "☆";
}

.rating {
    margin-top: 10px;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

</style>

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

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $filterCondition = "";

        // Add the search condition
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($con, $_GET['search']);
            if (is_numeric($search)) {
                // If the search term is a number, treat it as a year
                $filterCondition .= " WHERE m.YEAR = $search";
            } else {
                // If not a number, search across song, artist, and album names
                $filterCondition .= " WHERE m.name LIKE '%$search%' OR ar.name LIKE '%$search%' OR a.name LIKE '%$search%'";
            }
        }

        if (isset($_GET['artist_id'])) {
            $artistId = intval($_GET['artist_id']);
            $filterCondition .= ($filterCondition == "") ? " WHERE m.ARTIST = $artistId" : " AND m.ARTIST = $artistId";
        }

        if (isset($_GET['album_id'])) {
            $albumId = intval($_GET['album_id']);
            $filterCondition .= ($filterCondition == "") ? " WHERE m.ALBUM = $albumId" : " AND m.ALBUM = $albumId";
        }

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
                $playerHTML = $song['isaudio'] == 1
                    ? '<audio controls>
                        <source src="admin/uploads/' . $song['soucre'] . '" type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>'
                    : '<video controls width="250">
                        <source src="admin/uploads/' . $song['soucre'] . '" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>';
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
                            <div class="rating">
                                <form>
                                    <fieldset>
                                        <legend>Rating:</legend>
                                        <input type="radio" name="rating-<?php echo $song['id']; ?>" id="rating-1-<?php echo $song['id']; ?>" value="1">
                                        <label for="rating-1-<?php echo $song['id']; ?>">1 Star</label>
                                        <input type="radio" name="rating-<?php echo $song['id']; ?>" id="rating-2-<?php echo $song['id']; ?>" value="2">
                                        <label for="rating-2-<?php echo $song['id']; ?>">2 Stars</label>
                                        <input type="radio" name="rating-<?php echo $song['id']; ?>" id="rating-3-<?php echo $song['id']; ?>" value="3">
                                        <label for="rating-3-<?php echo $song['id']; ?>">3 Stars</label>
                                        <input type="radio" name="rating-<?php echo $song['id']; ?>" id="rating-4-<?php echo $song['id']; ?>" value="4">
                                        <label for="rating-4-<?php echo $song['id']; ?>">4 Stars</label>
                                        <input type="radio" name="rating-<?php echo $song['id']; ?>" id="rating-5-<?php echo $song['id']; ?>" value="5">
                                        <label for="rating-5-<?php echo $song['id']; ?>">5 Stars</label>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            // Check if the search term is numeric to display "Year not found"
            if (isset($_GET['search']) && is_numeric($_GET['search'])) {
                echo "<p>Songs not found.</p>";
            } else {
                echo "<p>No songs found.</p>";
            }
        }
        ?>
    </div>
</div>


        <?php
        mysqli_close($con);
        ?>
    </div>
</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "foot.php"; ?>
