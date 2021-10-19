<?php 
function actress() {
    $conn= mysqli_connect("localhost","root","","data_menu");
    $all= "
    SELECT * from movies order by id asc";
    return mysqli_query($conn,$all);
}
function filter_2() {
    $conn= mysqli_connect("localhost","root","","data_menu");
    $all= "SELECT * FROM movies where state='vietsub' order by id asc";
    return mysqli_query($conn,$all);
}
function filter_3() {
    $conn= mysqli_connect("localhost","root","","data_menu");
    $all= "SELECT * FROM movies where state='uncen' order by id asc";
    return mysqli_query($conn,$all);
}
?>