<?php 
require("../layout/db.php");

$id = $_POST["id"];

$sql = "DELETE FROM video WHERE id='$id'";

try {
    $conn->query($sql);
    header("Location:/admin/video.php?msg=Video Deleted Successfully!");
    die();
} catch (Exception $e) {
    header("Location:/admin/video.php?err=Something went Wrong!");
    die();
}
?>