<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
usersOnly();
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
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <!-- Admin Styling File-->
    <link rel="stylesheet" href="../../assets/css/admin.css" />

    <title>Admin Section - Manage Post</title>
</head>

<body>
    <!-- Admin Header Here -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper-->
    <div class="admin-wrapper">
        <!-- Left Sidebar-->
        <?php include(ROOT_PATH . "/app/includes/userSidebar.php"); ?>
        <!-- // Left Sidebar-->

        <!-- Admin Content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="createPost.php" class="btn btn-big">Add Post</a>
                <a href="indexPost.php" class="btn btn-big">Manage Posts</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Posts</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <table>
                    <thead>
                        <th>Serial No.</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <tbody>
                        <?php foreach ($posts as $key => $post) : ?>
                            <?php if ($_SESSION["id"] == $post["user_id"]) : ?>
                                <tr>
                                    <td>
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $post["title"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $_SESSION["username"] ?>

                                    <td><a href="editPost.php?id=<?php echo $post["id"]; ?>" class="edit">edit</a></td>
                                    <td><a href="editPost.php?del_id=<?php echo $post["id"]; ?>" class="delete">delete</a>

                                        <?php if ($post['published']) : ?>
                                            <!-- Want to know the post and identify it, then need published variable to set it -->
                                    <td><a href="editPost.php?published=0&p_id=<?php echo $post["id"] ?>" class="unpublish">unpublish</a></td>
                                <?php else : ?>
                                    <td><a href="editPost.php?published=1&p_id=<?php echo $post["id"] ?>" class="publish">publish</a>
                                    </td>
                                <?php endif; ?>
                                </td>

                                </tr>
                            <?php endif ?></td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>