<?php

function validatePost($post)
{
    $errors = array();

    if (empty($post["title"])) {
        array_push($errors, "Title is required");
    }

    if (empty($post["body"])) {
        array_push($errors, "Body is required");
    }

    if (empty($post["topic_id"])) {
        array_push($errors, "Please select a topic");

    }

    // fetch a post from database using the title
    $existingPost = selectOne("posts", ["title" => $post["title"]]);
    // check if it exist
    if ($existingPost) {
        // post defined in the database != $post trying to update
        if (isset($post["update-post"]) && $existingPost["id"] != $post["id"]) {
            array_push($errors, "A post with that title already exists");
        }

        // check if user if creating a post
        if (isset($post["add-post"])) {
            array_push($errors, "Post with that title already exist");
        }
    }

    return $errors;
}

?>