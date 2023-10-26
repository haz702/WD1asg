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
    } elseif (strlen($user["password"]) < 8) {
        array_push($errors, "Password must be at least 8 characters");
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

        if (isset($user["update-user"]) && $existingUser["id"] != $user["id"]) {
            array_push($errors, "Email already exist");
        }

        if (isset($user["create-admin"])) {
            array_push($errors, "Email already exist");
        }

        if (isset($user["register-btn"])) {
            array_push($errors, "Email already exist");
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
