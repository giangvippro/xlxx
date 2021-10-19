<?php
$servername="localhost";
$username="root";
$password="";
$database="data_menu";
$conn=mysqli_connect($servername, $username, $password, $database);
if(!$conn) {
    die("connect failed: ".mysqli_connect_error());
}
?>