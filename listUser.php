<?php
error_reporting(0);
$page=$_GET['page'];
$pagesize=$_GET['pagesize'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select * from users limit ".$page.",".$pagesize;
$result = $mysqli->query($sql);
$arry=array();
while($arr = $result->fetch_assoc()){
    array_unshift($arry, $arr);
}
$json = json_encode($arry);
exit(($json));
?>