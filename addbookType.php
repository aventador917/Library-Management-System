<?php
error_reporting(0);
$name=$_GET['name'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "insert into booktype(name) values ('".$name."')";
$result = $mysqli->query($sql);
if($result==1){
    $json = json_encode("true");
    exit(($json));
}else{
    $json = json_encode("false");
    exit(($json));
}
?>