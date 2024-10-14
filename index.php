<?php

$home = 'class="active"';


$songs = '';


?>
<?php include "nav.php"; ?>

<!-- Hero Section Begin -->
<section class="hero spad set-bg" data-setbg="img/hero-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__text">
                    <span>New Sound</span>
                    <h1>Feel the heart beats</h1>
                    <p>Discover the latest hits, trending artists, and immersive music experiences <br />
                        that will make your heart beat to the rhythm. Explore 2024's top trending tracks.</p>
                    <a href="https://www.youtube.com/watch?v=K4DyBUG242c" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="linear__icon">
        <i class="fa fa-angle-double-down"></i>
    </div>
</section>
<!-- Hero Section End -->



<?php if ($isLoggedIn) { ?>
    <!-- Trading Artist -->
    <section class="event spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Trading Artist</h2>
                    </div>
                </div>
            </div>
            <div class="row">
    <div class="event__slider owl-carousel">
        <?php 
        $artistsQuery = "SELECT * FROM artist";
        $artistsResult = mysqli_query($con, $artistsQuery);
        foreach ($artistsResult as $data) {
            $imagePath = 'img/events/' . $data['artist_img'];
        ?>
            <div class="col-lg-4">
                <div class="event__item">
                    <div class="event__item__pic set-bg" data-setbg="<?php echo $imagePath; ?>">
                        <div class="tag-date">
                            <a href="songs.php?artist_id=<?php echo $data['id'] ?>">
                                <span>View More</span></a>
                        </div>
                    </div>
                    <div class="event__item__text">
                        <h4><?php echo $data['name'] ?></h4>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

        </div>
    </section>
    <!-- Trading Artist End -->


    <!-- Most Listening -->
    <section class="event spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title" style="text-align: center;">
                        <h2>Most Listening</h2>
                        <h1>Relaxing</h1>
                    </div>
                    <div class="row mt-5">

                        <div class="col-lg-3">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="img/most_listening/1.jpeg">
                                    <div class="tag-date">
                                        <a href="#" data-toggle="modal" data-target="#songModal"><span>Play Now</span></a>
                                    </div>
                                </div>
                                <div class="event__item__text">
                                    <h4>Bematlab</h4>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-lg-3">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="img/most_listening/2.jpeg">
                                    <div class="tag-date">
                                        <span>Play Now</span>
                                    </div>
                                </div>
                                <div class="event__item__text">
                                    <h4>Jurmana</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="img/most_listening/3.jpeg">
                                    <div class="tag-date">
                                        <span>Play Now</span>
                                    </div>
                                </div>
                                <div class="event__item__text">
                                    <h4>Yaad</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="img/most_listening/4.jpeg">
                                    <div class="tag-date">
                                        <span>Play Now</span>
                                    </div>
                                </div>
                                <div class="event__item__text">
                                    <h4>Aadat</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--  Modal Code  -->


                <div class="modal" id="songModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <audio controls style="width:100%">
                                    <source src="https://www.w3schools.com/TagS/horse.ogg" type="audio/ogg">
                                    <source src="https://www.w3schools.com/TagS/horse.mp3" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Code  -->
    </section>
    <!-- Most Listening End -->

    <!-- 2024 Trending -->
    <section class="event spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title" style="text-align: center;">
                        <h2>2024 Trending Songs</h2>
                        <h1>Sound</h1>
                    </div>
                    <div class="row mt-5">

                        <div class="col-lg-3">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="img/2024_trending/1.jpeg">
                                    <div class="tag-date">
                                        <a href="#"><span>Play Now</span></a>
                                    </div>
                                </div>
                                <div class="event__item__text">
                                    <h4>Kahani Suno</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="img/2024_trending/2.jpeg">
                                    <div class="tag-date">
                                        <span>Play Now</span>
                                    </div>
                                </div>
                                <div class="event__item__text">
                                    <h4>Pasoori</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="img/2024_trending/3.jpeg">
                                    <div class="tag-date">
                                        <span>Play Now</span>
                                    </div>
                                </div>
                                <div class="event__item__text">
                                    <h4>Jhol</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="event__item">
                                <div class="event__item__pic set-bg" data-setbg="img/2024_trending/4.jpeg">
                                    <div class="tag-date">
                                        <span>Play Now</span>
                                    </div>
                                </div>
                                <div class="event__item__text">
                                    <h4>Therapy</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- 2024 Trending End -->

    <!-- Youtube Section Begin -->
    <section class="youtube spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Youtube feed</h2>
                        <h1>Latest videos</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="youtube__item">
                        <div class="youtube__item__pic set-bg" data-setbg="img/youtube/1.jpg">
                            <a href="https://www.youtube.com/watch?v=5eu6GtxMfkQ" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="youtube__item__text">
                            <h4>Aadat By (Atif Aslam)</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="youtube__item">
                        <div class="youtube__item__pic set-bg" data-setbg="img/youtube/2.jpg">
                            <a href="https://www.youtube.com/watch?v=hq2mmXIc7GQ" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="youtube__item__text">
                            <h4>Bematlab By (Asim Azhar)</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="youtube__item">
                        <div class="youtube__item__pic set-bg" data-setbg="img/youtube/3.jpg">
                            <a href="https://www.youtube.com/watch?v=jIQ0Dx-4peE" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="youtube__item__text">
                            <h4>GUMAAN By (Talha Anjum)</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Youtube Section End -->

    <!-- Countdown Section Begin -->
    <section class="countdown spad set-bg" data-setbg="img/countdown-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="countdown__text">
                        <h1>ParkView City 2024</h1>
                        <h4>Young Stunners Concert</h4>
                    </div>
                    <div class="countdown__timer" id="countdown-time">
                        <div class="countdown__item">
                            <span>20</span>
                            <p>days</p>
                        </div>
                        <div class="countdown__item">
                            <span>45</span>
                            <p>hours</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>minutes</p>
                        </div>
                        <div class="countdown__item">
                            <span>09</span>
                            <p>seconds</p>
                        </div>
                    </div>
                    <div class="buy__tickets">
                        <span class="primary-btn">Enjoy Sound</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Countdown Section End -->
<?php } else { ?>
    </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<?php } ?>
<?php include "foot.php"; ?>