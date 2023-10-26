<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH .  "/app/helpers/middleware.php");

//Initialize
$table = 'users';
$admin_users = selectAll($table);
$id = '';
$admin = '';
$username = '';
$password = '';
$email = '';
$passwordConf = '';

$errors = array(); // Initialize $errors as an array

if (isset($_POST["register-btn"]) || isset($_POST["create-admin"])) {

    $errors = validateUser($_POST);


    if (in_array("Email already exist", $errors)) {
        $emailClass = "input-error";
    }

    if (in_array("Password must be at least 8 characters", $errors) || in_array("Password do not match", $errors)) {
        $passwordClass = "input-error";
    }


    if (count($errors) === 0) {
        // remove variables so that our post sent matches the database table attributes
        unset($_POST["register-btn"], $_POST["passwordConf"], $_POST["create-admin"]);
        $_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // check if the values incoming has the admin attribute
        if (isset($_POST["admin"])) {
            $_POST['admin'] = 1;
            $user_id = create('users', $_POST);
            $_SESSION["message"] = "Admin user created successfully";
            $_SESSION["type"] = "success";
            header('location: ' . BASE_URL . '/admin/users/indexUser.php');
            exit();
        } else {
            $_POST['admin'] = 0;
            $user_id = create('users', $_POST);
            //Selecting the id column where id = user_id
            $user = selectOne($table, ["id" => $user_id]);
            // log normal user in after register, admin doesn't require 
            loginUser($user);
        }
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

//GET variable used to get parameters from url
if (isset($_GET["id"])) {
    //2nd arg. Retrieves a post with a specific ID from a table.
    $user = selectOne($table, ["id" => $_GET["id"]]);
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'] == 1 ? 1 : 0;
    $email = $user['email'];
}


function loginUser($user)
{
    $_SESSION["id"] = $user["id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["admin"] = $user["admin"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["message"] = 'You are now logged in';
    $_SESSION["type"] = 'success';

    if ($_SESSION["admin"]) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }
    exit();
}

if (isset($_POST["login-btn"])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ["username" => $_POST["username"]]);

        if ($user && password_verify($_POST["password"], $user["password"])) {
            // log user in
            loginUser($user);
        } else {
            array_push($errors, 'Wrong credentials');
        }
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if (isset($_POST["update-user"])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {

        if ($_SESSION["admin"] == 0) {            // remove variables so that our post sent matches the database table attributes
            $id = $_POST["id"];
            unset($_POST["passwordConf"], $_POST["update-user"], $_POST["id"]);
            $_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);

            // check if the values incoming has the admin attribute
            $_POST['admin'] = isset($_POST["admin"]) ? 1 : 0;
            $count = update($table, $id, $_POST);
            $_SESSION["message"] = "Profile updated successfully";
            $_SESSION["type"] = "success";
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["email"] = $_POST["email"];

            header('location: ' . BASE_URL . '/user/users/indexUser.php');
            exit();
        }

        if ($_SESSION["admin"] == 1) {            // remove variables so that our post sent matches the database table attributes
            $id = $_POST["id"];
            unset($_POST["passwordConf"], $_POST["update-user"], $_POST["id"]);
            $_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);

            // check if the values incoming has the admin attribute
            $_POST['admin'] = isset($_POST["admin"]) ? 1 : 0;
            $count = update($table, $id, $_POST);
            $_SESSION["message"] = "/user updated successfully";
            $_SESSION["type"] = "success";
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["email"] = $_POST["email"];
            header('location: ' . BASE_URL . '/admin/users/indexUser.php');
            exit();
        }
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

// only admin can delete their account, didn't implement profile delete acc for users.
if (isset($_GET["del_id"])) {
    if ($_SESSION["admin"] == 0) {
        $count = deleteData($table, $_GET["del_id"]);
        $_SESSION["message"] = 'User deleted';
        $_SESSION["type"] = 'success';
        header('location: ' . BASE_URL . '/logout.php');
        exit();
    } else {
        $count = deleteData($table, $_GET["del_id"]);
        $_SESSION["message"] = 'User deleted';
        $_SESSION["type"] = 'success';
        header('location: ' . BASE_URL . '/admin/users/indexUser.php');
        exit();
    }
    

}
