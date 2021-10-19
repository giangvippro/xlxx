<?php
$servername="localhost";
$username="root";
$password="";
$database="image_actress";
$conn= mysqli_connect($servername,$username,$password,$database);
if(!$conn) {
    die(mysqli_connect_error()); 
}
echo "Connect successfully\n";
// delete database
// $sql= "drop database actress_jav";
// $exec=mysqli_query($conn,$sql);
// if(!$exec) {
//     die("Could not delete database");
// }
// echo "database deleted successfully";
// $conn->close();
// $sql= "CREATE database image_actress";
// if($conn->query($sql)) {
//     echo "create successfully";
// }
// else {
//     echo "Error".$conn->error;
// }
$sql= "CREATE table image_thumbnail(
    id int(6),
    code varchar(50),
    title varchar(255)
)";
if($conn->query($sql)) {
    echo "create successfully";
}
else {
    echo "Error".$conn->error;
}
$conn->close();
