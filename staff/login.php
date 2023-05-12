<?php
require("./layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$mobile = test_input($_POST["mobile"]);
$eid = test_input($_POST["eid"]);

$sql = "SELECT * FROM staff WHERE mobile='$mobile' AND eid='$eid' ";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION["staff"]="u6rv9tb8pq89u";
        $_SESSION["sname"]=$row["name"];
        $_SESSION["sid"]=$row["id"];
        header("Location:/staff/home.php");
        die();
    }
} else {
    header("Location:/");
    die();
}
?>