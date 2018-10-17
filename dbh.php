<?php


$conn = new mysqli("localhost", "root", "root", "find_folks");


/* check connection */
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}


?>