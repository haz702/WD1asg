<?php

function validateUser($user)
{
    global $conn;
    $errors = array();

    if (empty($user["username"])) {
        array_push($errors, "Please enter a username");
    }

    if (empty($user["email"])) {
        array_push($errors, "Please enter an email");
    }

    if (empty($user["password"])) {
        array_push($errors, "Please enter a password");

    }

    if ($user["passwordConf"] !== $user["password"]) {
        array_push($errors, "Password do not match");
    }

    //$existingUser = selectOne("users", ["email" => $user["email"]]);
    //Check if exist
    //if ($existingUser) {
    //    array_push($errors, "Email already exist");
    //}
    // fetch a user from database using the title
    $existingUser = selectOne("users", ["email" => $user["email"]]);
    // check if it exist
    if ($existingUser) {
        // post defined in the database != $topic trying to update
        if ($user["update-user"] && $existingUser["id"] != $user["id"]) {
            array_push($errors, "Email already exist");
        }

        // check if user if creating a topic
        if (isset($user["add-topic"])) {
            array_push($errors, "Topic name already exist");
        }
    }
    return $errors;
}

function validateLogin($user)
{
    global $conn;
    $errors = array();

    if (empty($user["username"])) {
        array_push($errors, "Please enter a username");
    }

    if (empty($user["password"])) {
        array_push($errors, "Please enter a password");
    }

    return $errors;
}