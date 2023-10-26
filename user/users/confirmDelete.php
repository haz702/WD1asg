<?php include("../../path.php"); ?>
<?php
include(ROOT_PATH . "/app/controllers/users.php");
include(ROOT_PATH . "/app/controllers/profile.php");
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

    <title>Admin Section - Add Users</title>
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
            <div class="content">

                <h2 class="page-title">User Profile</h2>


                <div class="profile-pic">
                    <form action="profile.php" method="post" enctype="multipart/form-data">
                        <label for="avatar">
                            <img src="../../assets/images/image4.jpg" alt="User Avatar" style="width: 200px; height: 200px;">
                            <input type="file" id="avatar" name="avatar" style="display: none;">
                        </label>
                        <input type="submit" value="Update Avatar" name="submit">
                    </form>
                </div>

                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
                <?php foreach ($admin_users as $key => $user) : ?>
                    <?php if (isset($_SESSION["id"]) && $_SESSION["username"] == $user["username"] && $_SESSION["email"] == $user["email"]) : ?>

                        <table>
                            <tr>
                                <th>Username</th>
                                <td><?php echo $user["username"]; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $user["email"]; ?></td>
                            </tr>
                            <tr>
                                <th>Action</th>
                                <td><a href="editUser.php?id=<?php echo $user["id"]; ?>" class="edit">Edit Profile</a></td>
                            </tr>
                            <tr>
                                <th>Delete Account</th>
                                <td><a href="indexUser.php?del_id=<?php echo $user["id"]; ?>" class="delete">Delete Account</a></td>
                            </tr>
                        </table>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="confirm-delete">
                    <form method="post" action="confirmDelete.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <h2>Your account will be deleted permanently</h2>
                        <p>Are you sure to proceed?</p>
                        <input type="submit" value="Confirm">
                    </form>
                    <input class="cancel" type="submit" value="Cancel">
                </div>
                <div class="background-blur">
                    
                </div>
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