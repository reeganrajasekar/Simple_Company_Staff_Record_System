<?php 
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$target_dir = "../../uploads/";

$title = test_input($_POST["title"]);
$data = test_input($_POST["data"]);
$img = uniqid().basename($_FILES["img"]["name"]);
$video = uniqid().basename($_FILES["video"]["name"]);
$target_file = $target_dir .$img ;
$target_file_video = $target_dir .$video ;

try {
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    move_uploaded_file($_FILES["video"]["tmp_name"], $target_file_video);
    $sql = "INSERT INTO video(title,data,img,video) VALUES('$title','$data','$img','$video');";
    $conn->query($sql);
    header("Location:/admin/video.php?msg=Video Added Successfully!");
    die();
} catch (Exception $e) {
    header("Location:/admin/video.php?err=Somthing Went Wrong!");
    die();
}

?>