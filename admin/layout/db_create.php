<?php 
require("./db.php");

$sql = "CREATE TABLE IF NOT EXISTS staff (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(500) NOT NULL,
    mobile VARCHAR(500) NOT NULL UNIQUE,
    email VARCHAR(500) NOT NULL UNIQUE,
    eid VARCHAR(500) NOT NULL UNIQUE,
    shoe VARCHAR(500) NOT NULL,
    insfol VARCHAR(500) NOT NULL,
    handle VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Staff created successfully<br>";
} else {
    echo "Error creating table: Staff";
}

$sql = "CREATE TABLE IF NOT EXISTS video (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500) NOT NULL,
    data VARCHAR(500) NOT NULL,
    video VARCHAR(500) NOT NULL,
    img VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Video created successfully<br>";
} else {
    echo "Error creating table: Video";
}

?>