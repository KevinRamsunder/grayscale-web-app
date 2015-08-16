<?php

function display_image($image_url) {
    if (file_exists($image_url) == false) {
        return "error";
    } else {
        // strip first dot to resolve correct path to directory
        return substr($image_url, 1);
    }
}

function grayscale_image($image_url) {
       
}
?>