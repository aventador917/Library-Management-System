<?php
error_reporting(0);
$page=$_GET['page'];
$pagesize=$_GET['pagesize'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select * from  books  limit ".$page.",".$pagesize;
$result = $mysqli->query($sql);
$aryy1=array();
while($arr = $result->fetch_assoc()){
    array_unshift($aryy1, $arr);
}
$json = json_encode($aryy1);
exit(($json));
?>