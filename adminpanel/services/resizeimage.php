<?php

function resizeImage($file, $max_resoultion)
{
    if (file_exists($file)) {
        echo "done";
        $original_image = imagecreatefrompng($file);
        $original_width = imagesx($original_image);
        $original_height = imagesy($original_image);

        $ratio = $max_resoultion / $original_width;
        $new_width = $max_resoultion;
        $new_height = $original_height * $ratio;

        if ($new_height > $max_resoultion) {
            $ratio = $max_resoultion / $original_height;
            $new_height = $max_resoultion;
            $new_width =  $original_width * $ratio;
        }

        if ($original_image) {
            $new_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
            imagepng($new_image, $file, 90);
            echo "resized";
        }
    }
}
