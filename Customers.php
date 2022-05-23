<?php
error_reporting(0);
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select * from contact";
$result = $mysqli->query($sql);
$aryy1=array();
while($arr = $result->fetch_assoc()) {
    array_push($aryy1,$arr);
}
$json = json_encode($aryy1);
exit(($json));

?>