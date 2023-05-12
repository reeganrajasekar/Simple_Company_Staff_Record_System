<?php 
require("../layout/db.php");

$id = $_GET["id"];
$data = $_GET["data"];

$sql = "UPDATE staff SET $data=$data-1 WHERE id='$id'";

try {
    $conn->query($sql);
    header("Location:/admin/view.php?id=$id");
    die();
} catch (Exception $e) {
    header("Location:/admin/staff.php?err=Something went Wrong!");
    die();
}
?>