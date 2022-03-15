<?php
include "./account.php";
$mysql = new mysqli($host, $user, $password, $database);
if ($mysql === false) {
    die("ERROR: Could not connect" . $mysql->connect_error);
}
$sql = "INSERT INTO persons(first_name,last_name,email) VALUES('Peter1','Packer1','bestbuffban@gmai.com')";
if ($mysql->query($sql) === true) {
    echo "Insert data successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysql->error;
}
$mysql->close();