<?php
if (isset($_POST['submit'])) {
    $target_dir = "../../assets/images/profileImages"; // specify the directory where you want to save the image
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if ($check !== false) {
        // Check if file already exists
        if (!file_exists($target_file)) {
            // Check file size, you can set the limit you want
            if ($_FILES["avatar"]["size"] < 500000) {
                // Allow certain file formats
                if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                    // Try to upload file
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["avatar"]["name"]) . " has been uploaded.";
                        // Here you can update the user's avatar in your database
                        // For example: updateAvatar($_SESSION["id"], $target_file);
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
            } else {
                echo "Sorry, your file is too large.";
            }
        } else {
            echo "Sorry, file already exists.";
        }
    } else {
        echo "File is not an image.";
    }
}
