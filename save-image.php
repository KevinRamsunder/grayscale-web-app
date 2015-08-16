<?php

include 'image-processing.php';

date_default_timezone_set('America/New_York');

$TARGETDIR = "images/";
$TARGETFILE = $TARGETDIR . basename($_FILES["picture"]["name"]);
$uploadOk = true;
$imageFileType = pathinfo($TARGETFILE, PATHINFO_EXTENSION);

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = true;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = false;
    }
}

// Check for picture formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
    echo "Sorry, only JPG, PNG and GIF files are allowed.";
    $uploadOk = false;
}

if ($uploadOk == false) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $TARGETFILE)) {
        echo "The file " . basename($_FILES["picture"]["name"]) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your image.";
    }
}

display_image($TARGETFILE);

?>