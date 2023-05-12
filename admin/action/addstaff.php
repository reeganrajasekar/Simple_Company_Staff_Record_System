<?php 
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_start();
$name = test_input($_POST["name"]);
$mobile = test_input($_POST["mobile"]);
$eid = test_input($_POST["eid"]);
$email = test_input($_POST["email"]);

$sql = "INSERT INTO staff(name,mobile,email,eid,shoe,insfol,handle) VALUES('$name','$mobile','$email','$eid',100,100,100);";

try {
    $conn->query($sql);
    header("Location:/admin/staff.php?msg=Staff Account Created Successfully!");
    die();
} catch (Exception $e) {
    header("Location:/admin/staff.php?err=Duplicate Entry Found!");
    die();
}

?>