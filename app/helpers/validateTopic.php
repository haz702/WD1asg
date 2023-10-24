<?php

function validateTopic($topic)
{
    global $conn;
    $errors = array();

    if (empty($topic["name"])) {
        array_push($errors, "Topic name is required");
    }

    $existingTopic = selectOne("topics", ["name" => $topic["name"]]);
    //Check if exist
    if ($existingTopic) {
        array_push($errors, "Topic name already exist");
    }

    return $errors;
}
