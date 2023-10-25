<?php include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET["t_id"])) {
    $postsTitle = "Showing results related to '" . $_GET['name'] . "'";
    $posts = getPostsByTopicId($_GET["t_id"]);
} else if (isset($_POST["search-term"])) {
    $postsTitle = "Showing results related to '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST["search-term"]);
} else {
    $posts = getPublishedPosts();
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
    <link rel="stylesheet" href="assets\css\style.css">

    <title>EventShare</title>

</head>

<body>

    <!-- TODO: INCLUDE HEADER HERE -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>


    <!-- Page Wrapper-->
    <div class="page-wrapper">

        <!-- post slider-->
        <div class="post-slider">
            <h1 class="slider-title">Trending Posts</h1>
            <i class="fa-solid fa-chevron-left prev"></i>
            <i class="fa-solid fa-chevron-right next"></i>


            <div class="post-wrapper">

                <?php foreach ($posts as $post) : ?>
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL . "/assets/images/" . $post["image"] ?>" alt="thirst-fest" class="slider-image">
                        <div class="post-info">
                            <h4><a href="single.php?id=<?php echo $post["id"]; ?>">
                                    <?php echo $post["title"]; ?>
                                </a></h4>
                            <div class="post-userDesc">
                                <i class="fa fa-user">
                                    <?php echo $post["username"]; ?>
                                </i>
                                &nbsp;
                                <i class="fa-regular fa-calendar">&nbsp;
                                    <?php echo date('F j, Y', strtotime($post["created_at"])) ?>
                                </i>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <!--//Post Slider-->

            <!--Content-->
            <div class="content clearfix">

                <!-- Main Content-->
                <div class="main-content">
                    <h1 class="recent-post-title">
                        <?php echo $postsTitle; ?>
                    </h1>
                    <?php foreach ($posts as $post) : ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . "/assets/images/" . $post["image"] ?>" alt="SOASMosque" class="post-image">
                            <div class="post-preview">
                                <h2><a href="single.php?id=<?php echo $post["id"]; ?>">
                                        <?php echo $post["title"]; ?>
                                    </a></h2>
                                <i class="fa fa-user">
                                    <?php echo $post["username"]; ?>
                                </i>
                                &nbsp;
                                <i class="fa-regular fa-calendar">
                                    <?php echo date('F j, Y', strtotime($post["created_at"])) ?>
                                </i>
                                <p class="preview-text">
                                    <?php echo html_entity_decode(substr("body", 0, 150) . "..."); ?>
                                </p>
                                <a href="single.php?id=<?php echo $post["id"]; ?>" class="btn read-more">Read More</a>
                            </div>
                        </div>
                    <?php endforeach; ?>



                </div>
                <!--//Main Content-->

                <div class="sidebar">

                    <div class="section search">
                        <h2 class="section-title">Search</h2>
                        <form action="index.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search...">
                        </form>
                    </div>

                    <div class="section topics">
                        <h2 class="section-title">Types of Posts</h2>
                        <ul>
                            <?php foreach ($topics as $key => $topic) : ?>
                                <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>">
                                        <?php echo $topic["name"]; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>

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