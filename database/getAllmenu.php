<?php
function getAll() {
    $conn= mysqli_connect("localhost","root","","data_menu");
    $all= "
    SELECT * From categories order by id
    ";
    return mysqli_query($conn,$all);
}
function paginates() {
    $conn= mysqli_connect("localhost","root","","data_menu");
    $categories= mysqli_query($conn,"SELECT * FROM movies ORDER BY id");
    $total= mysqli_num_rows($categories);
    return $total;
}
function convert_vi_to_en($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
    $str = preg_replace("/(Đ)/", "D", $str);
    //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
    return $str;
}
function replaceAll($text) { 
    $text = strtolower(htmlentities($text)); 
    $text = str_replace(get_html_translation_table(), "-", $text);
    $text = str_replace(" ", "-", $text);
    $text = preg_replace("/[-]+/i", "-", $text);
    return $text;
}
$conn= mysqli_connect("localhost","root","","data_menu");
$categories= mysqli_query($conn,"SELECT * FROM movies");
while($row= mysqli_fetch_array($categories)) {
    $cove= convert_vi_to_en($row['title']);
    $dash= replaceAll($cove);
    $rmcm= str_replace(',','',$dash);
    $fly= str_replace('.','',$rmcm);
    // echo $fly."\n";
    // echo $row['image']."\n";
}
$getname= mysqli_query($conn,"SELECT title,id from movies order by id asc");
                    $roww= mysqli_fetch_array($getname);
                    $rtstri= implode(" ",$roww);

function featured() {
    $conn=mysqli_connect("localhost","root","","data_menu");
    $sql= "SELECT * FROM featured_video order by id_featured asc";
    $query= mysqli_query($conn,$sql);
    return $query;
}
function random_8() {
    $conn=mysqli_connect("localhost","root","","data_menu");
    $sql= "SELECT * FROm movies order by rand() limit 8";
    $query= mysqli_query($conn,$sql);
    return $query;
}
function get_content() {
    $conn=mysqli_connect("localhost","root","","data_menu");
    $sql= "SELECT * FROM movies order by id asc";
    return mysqli_query($conn,$sql);
}
function search_algorithm() {
    $conn= mysqli_connect("localhost","root","","data_menu");
    $sql= "SELECT title FROM movies order by id asc";
    return mysqli_query($conn,$sql);
}

?>