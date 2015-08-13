<?php

function display_image($image_url) {
    if (file_exists($image_url) == false) {
        echo 'File ' . $image_url . ' not found!<br>';
    } else {
        echo '<img src="' . $image_url . '" width="500" height="200"/>';
    }
}

function grayscale_image($image_url) {
       
}
?>