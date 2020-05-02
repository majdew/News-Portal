<?php
require "./../services/connection.php";
function resizeImage($file, $max_resoultion)
{
    if (file_exists($file)) {
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
            imagejpeg($new_image, $file, 90);
        }
    }
}

if (isset($_POST['submit'])) {


    $title = $_POST['title'];
    $body = $_POST['body'];
    $isUrgent = $_POST['isUrgent'];
    $isGlobal = $_POST['isGlobal'];
    $category = $_POST['category'];

    $newtitle = mysqli_escape_string($connection, $title);
    $newbody = mysqli_escape_string($connection, $body);

    if (isset($_FILES['news'])) {
        $image = $_FILES['news']['name'];
        resizeImage($image , '500');


        $query = "INSERT INTO news (title, body, category , image , isUrgent , isGlobal ,writerId) 
                    VALUES ('$newtitle', '$newbody','$category', '$image', $isUrgent , $isGlobal , $id )";

        $result = mysqli_query($connection, $query);

        if ($result) {
            move_uploaded_file($_FILES['news']['tmp_name'], "./../../images/news/$image");
            header("location:./../views/usersviews/allnews.php");
        } else {
            header("location:./../views/usersviews/addnews.php?error=1");
        }
    }
} else {
    header("location:./../views/usersviews/addnews.php?error=1");
}
