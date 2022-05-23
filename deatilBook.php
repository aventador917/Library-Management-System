<?php
error_reporting(0);
$id = $_GET["id"];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select *  from  books where id=".$id;
$result = $mysqli->query($sql);
$assoc = $result->fetch_assoc();
$json = json_encode($assoc);
exit(($json));
?>