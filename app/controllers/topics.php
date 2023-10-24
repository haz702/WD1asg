<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateTopic.php");
$table = "topics";
$topics = selectAll($table);
$errors = array();
$id = '';
$name = '';
$description = '';

//Check if add button has been clicked
if (isset($_POST["add-topic"])) {
    $errors = validateTopic($_POST);
    if (count($errors) == 0) {
        unset($_POST["add-topic"]);
        //Create a new topic
        $topic_id = create("topics", $_POST);
        //Sets session messages
        $_SESSION["message"] = 'Topic created successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/admin/topics/indexTopic.php');
        exit();
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

//Now we can fetch particular record in topics File
//if there is an id on url, we pickup the id
if (isset($_GET["id"])) {
    // Store the 'id' in a variable
    $id = $_GET["id"];
    // Use the 'selectOne' function to get the record from the table that matches the 'id'
    $topic = selectOne($table, ["id" => $id]);

    // Store the 'id', 'name', and 'description' fields of the topic in variables
    $id = $topic["id"];
    $name = $topic["name"];
    $description = $topic["description"];
}

if (isset($_GET["del_id"])) {
    $id = $_GET["del_id"];
    $count = deleteData($table, $id);
    $_SESSION["message"] = 'Topic deleted successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/admin/topics/indexTopic.php');
    exit();
}

if (isset($_POST["update-topic"])) {
    $errors = validateTopic($_POST);
    if (count($errors) == 0) {
        // Store the 'id' in a variable
        $id = $_POST["id"];
        unset($_POST["update-topic"], $_POST["id"]);
        $topic_id = update($table, $id, $_POST);
        $_SESSION["message"] = 'Topic updated successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/admin/topics/indexTopic.php');
        exit();
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}
?>