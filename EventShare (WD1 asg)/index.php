<?php include("path.php");
include(ROOT_PATH . "/app/database/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- icons used and taken from: FontAwesome-->
    <script src="https://kit.fontawesome.com/aa96e6185d.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Roboto+Slab&display=swap" rel="stylesheet">

    <!-- CSS File-->
    <link rel="stylesheet" href="assets\css\style.css">

    <title>EventShare</title>

</head>

<body>

    <!-- TODO: INCLUDE HEADER HERE -->
    <?php include(ROOT_PATH . "/app/database/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/app/database/includes/messages.php"); ?>


    <!-- Page Wrapper-->
    <div class="page-wrapper">

        <!-- post slider-->
        <div class="post-slider">
            <h1 class="slider-title">Trending Posts</h1>
            <i class="fa-solid fa-chevron-left prev"></i>
            <i class="fa-solid fa-chevron-right next"></i>

            <div class="post-wrapper">

                <div class="post clearfix">
                    <img src="assets/images/image2.jpg" alt="thirst-fest" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">New 'Thrift-fest' in Times Square, see you there!</a></h4>
                        <div class="post-userdesc">
                            <i class="fa fa-user">User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar">&nbsp; Oct 15th, 2023</i>
                        </div>
                    </div>
                </div>

                <div class="post clearfix">
                    <img src="assets/images/image3.jpg" alt="koreanfestival" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Korean festival in Times Square, open to everyone!</a></h4>
                        <div class="post-userdesc">
                            <i class="fa fa-user">User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar">&nbsp; Sep 20th, 2023</i>
                        </div>
                    </div>
                </div>

                <div class="post clearfix">
                    <img src="assets/images/image4.jpg" alt="UTBCarnival" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">UTB Canival 2023, open to the public!</a></h4>
                        <div class="post-userdesc">
                            <i class="fa fa-user">User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar">&nbsp; Aug 31st, 2023</i>
                        </div>

                    </div>
                </div>

                <div class="post clearfix">
                    <img src="assets/images/image2.jpg" alt="thirst-fest" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">New 'Thrift-fest' in Times Square, see you there!</a></h4>
                        <div class="post-userdesc">
                            <i class="fa fa-user">User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar">&nbsp; Oct 15th, 2023</i>
                        </div>
                    </div>
                </div>

                <div class="post clearfix">
                    <img src="assets/images/image3.jpg" alt="koreanfestival" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Korean festival in Times Square, open to everyone!</a></h4>
                        <div class="post-userdesc">
                            <i class="fa fa-user">User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar">&nbsp; Sep 20th, 2023</i>
                        </div>
                    </div>
                </div>

                <div class="post clearfix">
                    <img src="assets/images/image4.jpg" alt="UTBCarnival" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">UTB Canival 2023, open to the public!</a></h4>
                        <div class="post-userdesc">
                            <i class="fa fa-user">User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar">&nbsp; Aug 31st, 2023</i>
                        </div>
                    </div>
                </div>
            </div>
            <!--//Post Slider-->

            <!--Content-->
            <div class="content clearfix">

                <!-- Main Content-->
                <div class="main-content">
                    <h1 class="recent-post-title">Recent Posts</h1>

                    <div class="post clearfix">
                        <img src="assets/images/image5.jpg" alt="SOASMosque" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.html">Brunei Darussalam's Most Visited Attraction</a></h2>
                            <i class="fa fa-user"> User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar"> Oct 19th, 2023</i>
                            <p class="preview-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Consequatur veniam quia dolor laudantium tempora. Voluptatem.
                            </p>
                            <a href="single.html" class="btn read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post clearfix">
                        <img src="assets/images/image1.jpg" alt="Tamu-Kianggeh" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single2.html">Tamu Kianggeh - A Treasured heritage</a></h2>
                            <i class="fa fa-user"> User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar"> Oct 19th, 2023</i>
                            <p class="preview-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Consequatur veniam quia dolor laudantium tempora. Voluptatem.
                            </p>
                            <a href="single2.html" class="btn read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post clearfix">
                        <img src="assets/images/image5.jpg" alt="SOASMosque" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.html">Brunei Darussalam's Most Visited Attraction</a></h2>
                            <i class="fa fa-user"> User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar"> Oct 19th, 2023</i>
                            <p class="preview-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Consequatur veniam quia dolor laudantium tempora. Voluptatem.
                            </p>
                            <a href="single.html" class="btn read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post clearfix">
                        <img src="assets/images/image1.jpg" alt="Tamu-Kianggeh" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single2.html">Tamu Kianggeh - A Treasured heritage</a></h2>
                            <i class="fa fa-user"> User</i>
                            &nbsp;
                            <i class="fa-regular fa-calendar"> Oct 19th, 2023</i>
                            <p class="preview-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Consequatur veniam quia dolor laudantium tempora. Voluptatem.
                            </p>
                            <a href="single2.html" class="btn read-more">Read More</a>
                        </div>
                    </div>


                </div>
                <!--//Main Content-->

                <div class="sidebar">

                    <div class="section search">
                        <h2 class="section-title">Search</h2>
                        <form action="index.html" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search...">
                        </form>
                    </div>

                    <div class="section topics">
                        <h2 class="section-title">Types of Posts</h2>
                        <ul>
                            <li><a href="#">Trending Posts</a></li>
                            <li><a href="#">Blogs of Local Places</a></li>
                            <li><a href="#">Upcoming Events</a></li>
                            <li><a href="#">Interesting Stories</a></li>
                            <li><a href="#">Brunei Wiki</a></li>
                        </ul>
                    </div>

                </div>




            </div>
            <!--//Content-->
        </div>
        <!--//Page Wrapper-->

        <!-- TODO: include footer here -->
        <?php include(ROOT_PATH . "/app/database/includes/footer.php"); ?>

    </div>
    <!-- JQuery (placed at the end for performance reasons)-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Slick Carousel-->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>