<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
guestsOnly();
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

    <title>EventShare</title>

</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>


    <div class="auth-content">

        <form action="login.php" method="post">
            <h2 class="form-title">Login</h2>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>


            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>

            <div>
                <button type="submit" name="login-btn" class="btn btn-big">Login</button>
            </div>

            <p>Or <a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></p>
        </form>


    </div>




    <!-- JQuery (placed at the end for performance reasons)-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>