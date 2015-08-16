<?php

include 'image-processing.php';

date_default_timezone_set('America/New_York');

$TARGETDIR = "../images/";
$TARGETFILE = $TARGETDIR . basename($_FILES["picture"]["name"]);
$uploadOk = true;
$imageFileType = pathinfo($TARGETFILE, PATHINFO_EXTENSION);
$output = "";

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if ($check !== false) {
        $output .= "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = true;
    } else {
        $output .= "File is not an image.<br>";
        $uploadOk = false;
    }
}

// Check for picture formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
    $output .= "Sorry, only JPG, PNG and GIF files are allowed.";
    $uploadOk = false;
}

if ($uploadOk == false) {
    echo $output;
} else {
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $TARGETFILE)) {
        $output .= "The file " . basename($_FILES["picture"]["name"]) . " has been uploaded.<br>";
        echo display_image($TARGETFILE);
    } else {
        $output .= "Sorry, there was an error uploading your image.";
        echo $output;
    }
}
?>