<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");

if (isset($_GET["id"])) {
    $post = selectOne("posts", ["id" => $_GET["id"]]);

}
$topics = selectAll('topics');
$posts = selectAll("posts", ["published" => 1]);
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

    <title>
        <?php echo $post["title"]; ?> | EventShare
    </title>

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
                    <h1 class="post-title">
                        <?php echo $post["title"]; ?>
                    </h1>
                    <img src="assets/images/image5.jpg" alt="SOASMosque" class="single-image">

                    <div class="post-content">
                        <?php echo html_entity_decode($post["body"]); ?>
                    </div>
                </div>
            </div>
            <!--// Main Content-->

            <!--SideBar-->
            <div class="sidebar single">

                <div class="section-popular">
                    <h2 class="section-title">Popular Posts</h2>
                    <?php foreach ($posts as $p): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . "/assets/images/" . $p["image"]; ?>" alt="ImgNotWork">
                            <a href="single.php" class="title">
                                <h4>
                                    <?php echo $p["title"]; ?>
                                </h4>
                            </a>
                        </div>
                    <?php endforeach; ?>



                </div>

                <div class="section topics">
                    <h2 class="section-title">Types of Posts</h2>
                    <ul>
                        <li>
                            <?php foreach ($topics as $topic): ?>
                                <!-- t_id = topic id -->
                                <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>">
                                    <?php echo $topic["name"]; ?>
                                </a>
                            <?php endforeach; ?>
                        </li>

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