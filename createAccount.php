<?php
 
include "dbh.php";
session_start();

$sql = "INSERT INTO member (username, password, firstname, lastname, email, zipcode) VALUES ( $_SESSION["username"], $_SESSION["password"], $_SESSION["first_name"], $_SESSION["last_name"], $_SESSION["email"], $_SESSION["zipcode"] )";

$conn->query($sql);
$conn->close();

header("Location : http://localhost:8888/FindFolks/index.php");

?>