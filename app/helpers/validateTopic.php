<?php

function validateTopic($topic)
{
    global $conn;
    $errors = array();

    if (empty($topic["name"])) {
        array_push($errors, "Topic name is required");
    }

    // $existingTopic = selectOne("topics", ["name" => $topic["name"]]);
    //Check if exist
    //  if ($existingTopic) {
    //      array_push($errors, "Topic name already exist");
    //  }
    // fetch a topic from database using the title
    $existingTopic = selectOne("topics", ["name" => $topic["name"]]);
    // check if it exist
    if ($existingTopic) {
        // post defined in the database != $topic trying to update
        if (isset($topic["update-topic"]) && $existingTopic["id"] != $topic["id"]) {
            array_push($errors, "Topic name already exist");
        }

        // check if user if creating a topic
        if (isset($topic["add-topic"])) {
            array_push($errors, "Topic name already exist");
        }
    }

    return $errors;
}
