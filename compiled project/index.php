<?php
session_start();
require('php/getdata.php');

$nowplaying = getData(createurl('nowplaying'));
$latest = getData(createurl('latest'));
$popular = getData(createurl('popular'));
$popular = $popular['results'];
$latest = $latest['results'];
$nowplaying = $nowplaying['results'];
$imgbase = 'https://image.tmdb.org/t/p/';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReFilm</title>

    <link rel="stylesheet" href="css/lightslider.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Chivo:300,700|Playfair+Display:700i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/63ad159168.js" crossorigin="anonymous"></script>

    <script src="js/JQuery3.3.1.js"></script>
    <script src="js/lightslider.js"></script>
</head>

<body>
    <div class="nav-header">
        <a href="index.php">
            <div class="nav-logo"></div>
        </a>
        <div class="nav-links">
            <div class="nav-link-div">
                <a href="#" class="nav-link-a">
                    <span class="nav-link-span">
                        TV Shows
                    </span>
                </a>
            </div>



            <div class="nav-link-div">
                <a href="#" class="nav-link-a">
                    <span class="nav-link-span">
                        Movies
                    </span>
                </a>
            </div>



            <div class="nav-link-div">
                <a href="#" class="nav-link-a">
                    <span class="nav-link-span">
                        Your Lists
                    </span>
                </a>
            </div>



            <div class="nav-link-div">
                <a href="#" class="nav-link-a">
                    <span class="nav-link-span">
                        Popular
                    </span>
                </a>
            </div>

        </div>

        <div class="nav-spacer"></div>

        <div class="nav-login-block">
            <?php if (isset($_SESSION['username'])) {
            ?>
                <span class="login"><a href="profile.html"><i class="fa fa-user" aria-hidden="true"></i> <?= $_SESSION['username'] ?></a></span>
            <?php } else { ?>

                <span class="login"><a href="login.php">Login/Signup</a></span>
            <?php }  ?>
        </div>
        <div class="nav-globalsearch">
            <div class="nav-search">
                <form action="search.php" method="GET" id="form">
                    <input type="text" name="q1" id="search" class="searchbox fa" placeholder="&#xF002; Search...">

                </form>
            </div>

        </div>
    </div>
    <div class="container-main">
        <div class="big-poster">

            <div class="popular">
                <div class="popular-info">
                    <h1>Peaky Blinders</h1>
                    <h3>Put on a happy face</h3>
                    <div class="pop-sum">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum cum reiciendis sed magnam
                            consequatur ducimus expedita voluptatum soluta optio dolorum.
                        </p>
                    </div>
                    <button class="readmore button--pandora" type="button">Read Info </button>
                </div>




            </div>
        </div>
        <div class="pop-card-holder">
            <h2>Now Showing</h2>

            <div class="pop-cards">
                <?php $i = 0;
                foreach ($nowplaying as $now) {
                    if ($i == 3) {
                        break;
                    }
                ?>
                    <article class="movie-card">
                        <img src="<?= $imgbase . 'w500' . $now['poster_path'] ?>" alt="Poster">
                        <div class="card-details">
                            <h4><?= $now['title']; ?></h4>
                        </div>
                    </article>
                <?php $i++;
                } ?>


            </div>

        </div>




    </div>
    <hr>
    <!-- <div class="section1">
        <section id="main2">
            <h2 class="latest-heading">Top Rated</h2>
            <ul id="autoWidth2" class="cs-hidden">
                <?php
                $i = 0;
                foreach ($latest as $lat) {
                    if ($i == 6) {
                        break;
                    }
                ?>

                    <l1 class="item-a">

                        <div class="latest=box">
                            <a href="movie.php?q1=<?= $lat['id'] ?>" target="_blank_">
                                <div class="latest-b-img">

                                    <div class="card-info">

                                        <button role="button" href="#" class="card-button card-watched">
                                            <i class="fa fa-check" aria-hidden="true"></i><span> Seen</span>
                                        </button>
                                        <button role="button" href="#" class="card-button card-add"><i class="fa fa-plus" aria-hidden="true"></i> <span>Add to
                                            List </span></button>

                                        <div class="latest-b-text">
                                            Star Wars
                                            <p>Action</p>
                                        </div>
                                    </div>
                                    <img src="<?= $imgbase . 'w500' . $lat['poster_path'] ?>">
                                </div>

                            </a>
                        </div>

                    </l1>
                <?php $i++;
                } ?>
            </ul>

        </section>
    </div> -->
    <!-- <div class="pick">
        <div class="pick-bg"></div>
<div class="pick-info" ><h1>Star Wars</h1></div>
    </div> -->
    <h2 class="latest-heading">Popular Movies</h2>
    <section id="ac-list">

        <?php
        $i = 0;
        foreach ($popular as $pop) {
            if ($i == 12) {
                break;
            }


        ?>

            <div class="movie"><a href="movie.php?q1=<?= $pop['id'] ?>" target="_blank_">
                    <img src="<?= $imgbase . 'w500' . $pop['poster_path'] ?>" alt="Image">
                    <button role="button" href="#" class="card-button card-watched">
                        <i class="fa fa-check" aria-hidden="true"></i><span> Seen it</span>
                    </button>
                    <button role="button" href="#" class="card-button card-add"><i class="fa fa-plus" aria-hidden="true"></i><span> Add to
                            List</span></button>


                    <div class="card-rate">
                        <div class="ratings">
                            <div class="imdb rating">
                                <i class="fa fa-imdb" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="movie-info">
                        <h3><?= $pop['title'] ?></h3>
                        <span class="green"><?php echo (number_format((float)$pop['vote_average'], 1, '.', '')); ?></span>
                    </div>
                    <div class="overview">
                        <h2><?= $pop['title'] ?></h2>
                        <?= $pop['overview'] ?>
                    </div>
                </a>
            </div>
        <?php $i++;
        } ?>

    </section>
    <script>
        $(document).ready(function() {
            $('#autoWidth,#autoWidth2').lightSlider({
                autoWidth: true,
                loop: true,
                onSliderLoad: function() {
                    $('#autoWidth,#autoWidth2').removeClass('cS-hidden');
                }
            });
        });
    </script>

</body>

</html>