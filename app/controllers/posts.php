<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");
include(ROOT_PATH .  "/app/helpers/middleware.php");

$table = 'posts';

$errors = array();
$topics = selectAll("topics");
$posts = selectAll($table);
$id = "";
$title = "";
$body = "";
$topic_id = "";
$published = "";

$id = '';
$admin = '';
$username = '';
$password = '';

//GET variable used to get parameters from url
if (isset($_GET["id"])) {
    //2nd arg. Retrieves a post with a specific ID from a table.
    $post = selectOne($table, ["id" => $_GET["id"]]);

    $id = $post["id"];
    $title = $post["title"];
    $body = $post["body"];
    $topic_id = $post["topic_id"];
    $published = $post["published"];
}

if (isset($_GET["del_id"])) {
    if ($_SESSION["admin"] == 0) {
        $count = deleteData($table, $_GET["del_id"]);
        $_SESSION["message"] = 'Post deleted successfully';
        $_SESSION["type"] = 'success';
        header('location: ' . BASE_URL . '/user/posts/indexPost.php');
        exit();
    } else if ($_SESSION['admin'] == 1) {
        $count = deleteData($table, $_GET["del_id"]);
        $_SESSION["message"] = 'Post deleted successfully';
        $_SESSION["type"] = 'success';
        header('location: ' . BASE_URL . '/admin/posts/indexPost.php');
        exit();
    }
}

if (isset($_GET["published"]) && isset($_GET["p_id"])) {
    if ($_SESSION["admin"] == 0) {
        $published = $_GET["published"];
        $p_id = $_GET["p_id"];
        // ... update published
        // data is the key => value pair
        // updates the ‘published’ status of a post with a specific ID in a table.
        $count = update($table, $p_id, ["published" => $published]);

        $_SESSION["message"] = 'Post published state changed!';
        $_SESSION["type"] = 'success';
        header('location: ' . BASE_URL . '/user/posts/indexPost.php');
        exit();
    } else if ($_SESSION['admin'] == 1) {
        $published = $_GET["published"];
        $p_id = $_GET["p_id"];
        // ... update published
        // data is the key => value pair
        // updates the ‘published’ status of a post with a specific ID in a table.
        $count = update($table, $p_id, ["published" => $published]);

        $_SESSION["message"] = 'Post published state changed!';
        $_SESSION["type"] = 'success';
        header('location: ' . BASE_URL . '/admin/posts/indexPost.php');
        exit();
    }
}


// check if add button has been clicked
if (isset($_POST["add-post"])) {

    // dd($_FILES['image']['name']);
    $errors = validatePost($_POST);

    if (!empty($_FILES["image"]["name"])) {
        //Uploaded the image into our project destination
        $image_name = time() . '_' . $_FILES["image"]["name"];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES["image"]["tmp_name"], $destination);

        //Save the name of our image into database on the particular post
        if ($result) {
            $_POST["image"] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "Post image required");
    }

    if (count($errors) == 0) {

        if ($_SESSION["admin"] == 0) {
            unset($_POST["add-post"]);
            // user currently logged in, we use their id
            $_POST["user_id"] = $_SESSION["id"];
            $_POST["published"] = isset($_POST["published"]) ? 1 : 0;
            //Take the tags in the body and converts certain HTML entities!! To prevent X-site scripting
            $_POST["body"] = htmlentities($_POST["body"]);

            //Create a new topic
            $post_id = create($table, $_POST);
            $_SESSION["message"] = 'Post created successfully';
            $_SESSION["type"] = 'success';
            header('location:' . BASE_URL . '/user/posts/indexPost.php');
            exit();
        }

        if ($_SESSION["admin"] == 1) {
            unset($_POST["add-post"]);
            // user currently logged in, we use their id
            $_POST["user_id"] = $_SESSION["id"];
            $_POST["published"] = isset($_POST["published"]) ? 1 : 0;
            //Take the tags in the body and converts certain HTML entities!! To prevent X-site scripting
            $_POST["body"] = htmlentities($_POST["body"]);

            //Create a new topic
            $post_id = create($table, $_POST);
            $_SESSION["message"] = 'Post created successfully';
            $_SESSION["type"] = 'success';
            header('location:' . BASE_URL . '/admin/posts/indexPost.php');
            exit();
        }
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        //Checkbox work differently
        $published = isset($_POST["published"]) ? 1 : 0;
    }
}

if (isset($_POST["update-post"])) {
    //Validate Post variable coming from form
    $errors = validatePost($_POST);

    //Check if img was sent to the post, if true, upload and store
    if (!empty($_FILES["image"]["name"])) {
        //Uploaded the image into our project destination
        $image_name = time() . '_' . $_FILES["image"]["name"];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES["image"]["tmp_name"], $destination);

        //Save the name of our image into database on the particular post
        if ($result) {
            $_POST["image"] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "Post image required");
    }

    if ($_SESSION["admin"] == 0) {
        if (count($errors) == 0) {
            $id = $_POST["id"];
            unset($_POST["update-post"], $_POST["id"]);
            // user currently logged in: use their id for the session
            $_POST["user_id"] = $_SESSION["id"];
            $_POST["published"] = isset($_POST["published"]) ? 1 : 0;
            //Take the tags in the body and converts certain HTML entities!! To prevent X-site scripting
            $_POST["body"] = htmlentities($_POST["body"]);

            //Create a new topic
            $post_id = update($table, $id, $_POST);
            $_SESSION["message"] = 'Post updated successfully';
            $_SESSION["type"] = 'success';
            header('location:' . BASE_URL . '/user/posts/indexPost.php');
            exit();
        }
    } else {
        if (count($errors) == 0) {
            $id = $_POST["id"];
            unset($_POST["update-post"], $_POST["id"]);
            // user currently logged in: use their id for the session
            $_POST["user_id"] = $_SESSION["id"];
            $_POST["published"] = isset($_POST["published"]) ? 1 : 0;
            //Take the tags in the body and converts certain HTML entities!! To prevent X-site scripting
            $_POST["body"] = htmlentities($_POST["body"]);

            //Create a new topic
            $post_id = update($table, $id, $_POST);
            $_SESSION["message"] = 'Post updated successfully';
            $_SESSION["type"] = 'success';
            header('location:' . BASE_URL . '/admin/posts/indexPost.php');
            exit();
        }
    }
}
