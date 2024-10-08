<?php

$home='class="active"';


$songs='';

?>
<?php include "nav.php";?>

    <!-- Hero Section Begin -->
    <section class="hero spad set-bg" data-setbg="img/hero-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <span>New Sound</span>
                        <h1>Feel the heart beats</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br />tempor
                            incididunt ut labore et dolore magna aliqua.</p>
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
    
    
    
    <?php if ($isLoggedIn){?>
        <!-- Event Section Begin -->
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
                            <div class="col-lg-4">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/1.jpg">
                                        <div class="tag-date">
                                            <a href="#"><span>Nov 15, 2024</span></a>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Atif Aslam</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/2.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Asim Azhar</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/3.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Talha Anjum</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/4.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Talhah Yunus</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Event Section End -->
        
    <!-- Track Section Begin -->
    <section class="track spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title">
                        <h2>Latest tracks</h2>
                        <h1>Music podcast</h1>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="track__all">
                        <a href="#" class="primary-btn border-btn">View all tracks</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 p-0">
                    <div class="track__content nice-scroll">
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_1"
                                data-url="music-files/1.mp3"></div>
                            <div class="jp-audio jp_container_1" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_2"
                                data-url="music-files/2.mp3"></div>
                            <div class="jp-audio jp_container_2" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_3"
                                data-url="music-files/3.mp3"></div>
                            <div class="jp-audio jp_container_3" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_4"
                                data-url="music-files/4.mp3"></div>
                            <div class="jp-audio jp_container_4" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_5"
                                data-url="music-files/5.mp3"></div>
                            <div class="jp-audio jp_container_5" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_6"
                                data-url="music-files/6.mp3"></div>
                            <div class="jp-audio jp_container_6" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 p-0">
                    <div class="track__pic">
                        <img src="img/track-right.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Track Section End -->

<!-- Most Listening -->
            <section class="event spad">
                <div class="container">
                <div class="row">
                       <div class="col-lg-12">
                       <div class="section-title">
                        <h2>Most Listening</h2>
                        <h1>Relaxing</h1>
                    </div>
                    <div class="row mt-5">
                        
                            <div class="col-lg-3">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/1.jpg">
                                        <div class="tag-date">
                                            <a href="#"><span>Nov 15, 2024</span></a>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Atif Aslam</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/2.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Asim Azhar</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/3.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Talha Anjum</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/4.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Talhah Yunus</h4>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Most Listening End -->

            <!-- 2024 Trending -->
            <section class="event spad">
                <div class="container">
                <div class="row">
                       <div class="col-lg-12">
                       <div class="section-title">
                        <h2>2024 Trending Songs</h2>
                        <h1>Sound</h1>
                    </div>
                    <div class="row mt-5">
                        
                            <div class="col-lg-3">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/1.jpg">
                                        <div class="tag-date">
                                            <a href="#"><span>Nov 15, 2024</span></a>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Atif Aslam</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/2.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Asim Azhar</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/3.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Talha Anjum</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="event__item">
                                    <div class="event__item__pic set-bg" data-setbg="img/events/4.jpg">
                                        <div class="tag-date">
                                            <span>Nov 15, 2024</span>
                                        </div>
                                    </div>
                                    <div class="event__item__text">
                                        <h4>Talhah Yunus</h4>
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
                            <h4>Aadat [slowed + reverbed] | Atif Aslam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="youtube__item">
                        <div class="youtube__item__pic set-bg" data-setbg="img/youtube/2.jpg">
                            <a href="https://www.youtube.com/watch?v=hq2mmXIc7GQ" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="youtube__item__text">
                            <h4>Bematlab (Official Video) Asim Azhar ft. Talha Anjum | BEMATLAB</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="youtube__item">
                        <div class="youtube__item__pic set-bg" data-setbg="img/youtube/3.jpg">
                            <a href="https://www.youtube.com/watch?v=jIQ0Dx-4peE" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="youtube__item__text">
                            <h4>GUMAAN - Young Stunners | Talha Anjum | Talhah Yunus</h4>
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
                        <a href="#" class="primary-btn">Buy tickets</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Countdown Section End -->
    <?php }else{?>
        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
        <?php }?>
    <?php include "foot.php";?>