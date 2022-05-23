<?php
error_reporting(0);
$type=$_GET['type'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select *  from  books  where type=".$type;
$result = $mysqli->query($sql);
$aryy1=array();
while($arr = $result->fetch_assoc()) {
    array_push($aryy1,$arr);
}
$json = json_encode($aryy1);
exit(($json));
?>