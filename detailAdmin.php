<?php
error_reporting(0);
$userid=$_GET['id'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select * from admins where id='".$userid."'";
$result = $mysqli->query($sql);
$assoc = $result->fetch_assoc();
$json = json_encode($assoc);
exit(($json));

?>