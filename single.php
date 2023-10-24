<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); ?>
<?php
if (isset($_GET["id"])) {
    $post = selectOne("posts", ["id" => $_GET["id"]]);
}

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
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Single Post</title>

</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- Page Wrapper-->
    <div class="page-wrapper">

        <!--Content-->
        <div class="content clearfix">

            <!-- Main Content-->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h1 class="post-title">Brunei Darussalam's Most Visited Attraction</h1>
                    <img src="assets/images/image5.jpg" alt="SOASMosque" class="single-image">

                    <div class="post-content">
                        <p>
                            The Sultan Omar Ali Saifuddien Mosque is indeed one of Brunei's most renowned landmarks,
                            celebrated for its stunning architecture and cultural significance.
                            Situated in Bandar Seri Begawan, the mosque was completed in 1958 and is named after the
                            28th Sultan of Brunei, Omar Ali Saifuddien III.
                            With its gleaming golden domes, intricate marble work, and elegant minarets, the mosque is a
                            striking blend of Mughal and Italian architectural styles, showcasing the country's
                            commitment to preserving its Islamic heritage while embracing modern influences.
                            The mosque is also surrounded by an artificial lagoon, creating a stunning reflection of the
                            mosque's grandeur in the water.
                            It stands as a symbol of the nation's devotion to Islam and is often regarded as one of the
                            most beautiful mosques in the Asia-Pacific region.
                        </p>
                        <p>
                            The interior of the Sultan Omar Ali Saifuddien Mosque is equally impressive, adorned with
                            luxurious carpets, ornate chandeliers, and intricate calligraphy.
                            The main prayer hall is known for its intricate designs and breathtaking craftsmanship,
                            showcasing the skill and dedication of local artisans.
                            The mosque's role extends beyond being a place of worship; it serves as a hub for community
                            activities, religious events, and cultural celebrations, fostering a sense of unity and
                            inclusivity within the country.
                            Its iconic stature and cultural significance have made it a must-visit destination for
                            tourists and locals alike, highlighting the proud heritage and religious devotion of Brunei.
                        </p>
                        <p>
                            With its rich history and architectural grandeur, the Sultan Omar Ali Saifuddien Mosque
                            continues to stand as a symbol of Brunei's deep-rooted Islamic heritage and the nation's
                            commitment to preserving its cultural legacy.
                            Its serene ambiance, intricate design, and cultural importance make it a site of reverence
                            and admiration for visitors and locals alike, reflecting the profound spiritual and cultural
                            significance of Islam in Brunei's society.
                        </p>
                    </div>
                </div>
            </div>
            <!--// Main Content-->

            <!--SideBar-->
            <div class="sidebar single">

                <div class="section-popular">
                    <h2 class="section-title">Popular Posts</h2>
                    <div class="post clearfix">
                        <img src="assets/images/image1.jpg" alt="Kianggeh">
                        <a href="single2.html" class="title">
                            <h4>Tamu Kianggeh - A treasured heritage</h4>
                        </a>
                    </div>

                    <div class="post clearfix">
                        <img src="assets/images/image1.jpg" alt="Kianggeh">
                        <a href="single2.html" class="title">
                            <h4>Tamu Kianggeh - A treasured heritage</h4>
                        </a>
                    </div>

                    <div class="post clearfix">
                        <img src="assets/images/image1.jpg" alt="Kianggeh">
                        <a href="single2.html" class="title">
                            <h4>Tamu Kianggeh - A treasured heritage</h4>
                        </a>
                    </div>

                    <div class="post clearfix">
                        <img src="assets/images/image1.jpg" alt="Kianggeh">
                        <a href="single2.html" class="title">
                            <h4>Tamu Kianggeh - A treasured heritage</h4>
                        </a>
                    </div>

                    <div class="post clearfix">
                        <img src="assets/images/image1.jpg" alt="Kianggeh">
                        <a href="single2.html" class="title">
                            <h4>Tamu Kianggeh - A treasured heritage</h4>
                        </a>
                    </div>
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
            <!--//Sidebar-->

        </div>
        <!--//Content-->
    </div>
    <!--//Page Wrapper-->

    <!-- TODO: include footer here -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

    </div>
    <!-- JQuery (placed at the end for performance reasons)-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Slick Carousel-->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>