<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- icons used and taken from: FontAwesome-->
    <script src="https://kit.fontawesome.com/aa96e6185d.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Roboto+Slab&display=swap" rel="stylesheet" />

    <!-- CSS Custom File-->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- Admin Styling File-->
    <link rel="stylesheet" href="../assets/css/admin.css" />

    <title>Admin Section - Dashboard</title>
</head>

<body>
    <!-- Admin Header Here -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper-->
    <div class="admin-wrapper">
        <!-- Left Sidebar-->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
        <!-- // Left Sidebar-->

        <!-- Admin Content-->
        <div class="admin-content">

            <div class="content">
                <h2 class="page-title">Dashboard</h2>
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
            </div>
        </div>
        <!--//Admin Content-->
    </div>
    <!--//Page Wrapper-->

    <!-- JQuery (placed at the end for performance reasons)-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!--CKEditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <!-- Custom Script-->
    <script src="../assets/js/scripts.js"></script>
</body>

</html>