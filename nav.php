<?php
session_start();

$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DJoz Template">
    <meta name="keywords" content="DJoz, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOUND</title>
    <link rel="shortcut icon" href="./img/fav-icon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/nowfont.css" type="text/css">
    <link rel="stylesheet" href="css/rockville.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
  
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                            <?php
                            include "db.php";
// Fetch albums
$albumsQuery = "SELECT * FROM albums";
$albumsResult = mysqli_query($con, $albumsQuery);

// Fetch artists
$artistsQuery = "SELECT * FROM artist";
$artistsResult = mysqli_query($con, $artistsQuery);

// Fetch years
$yearsQuery = "SELECT * FROM years";
$yearsResult = mysqli_query($con, $yearsQuery);
?>

<li <?=$home?>><a href="./index.php">Home</a></li>
    <?php if ($isLoggedIn): ?>
        <li><a <?=$songs?> href="songs.php">Songs</a></li>
        
        <li><a href="#">YEARs</a>
            <ul class="dropdown">
                <?php while ($year = mysqli_fetch_assoc($yearsResult)): ?>
                    <li><a href="songs.php?year_id=<?= $year['id'] ?>"><?= $year['name'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </li>

        <li><a href="#">ARTISTs</a>
            <ul class="dropdown">
                <?php while ($artist = mysqli_fetch_assoc($artistsResult)): ?>
                    <li><a href="songs.php?artist_id=<?= $artist['id'] ?>"><?= $artist['name'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </li>

        <li><a href="#">ALBUMs</a>
            <ul class="dropdown">
                <?php while ($album = mysqli_fetch_assoc($albumsResult)): ?>
                    <li><a href="songs.php?album_id=<?= $album['id'] ?>"><?= $album['name'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </li>
            <?php else: ?>
                <li><a href="#" id="meow">Songs</a>
                                   
                                   </li>
                <li><a href="#" id="meow1">YEARs</a>
                                   
                                   </li>
                                   <li><a href="#" id="meow2">ARTISTs</a>
                                   
                                   </li>
                                   <li><a href="#" id="meow3">ALBUMs</a>
                                   
                                   </li>
            <?php endif; ?>
                               

                                
                               
            <?php if ($isLoggedIn): ?>
                <li>
                    <form method="post" action="logout.php">
                        <a href=""><button type="submit" name="logout" style="border:none;background:none;color:inherit;padding:0;cursor:pointer;">
                            LOGOUT
                        </button></a>
                    </form>
                </li>
            <?php else: ?>
                <li><a href="./login.php">Login</a></li>
            <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->
