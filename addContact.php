<?php
error_reporting(0);
$name=$_GET['name'];
$userid=$_GET['userid'];
$eamil=$_GET['eamil'];
$message=$_GET['message'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "insert into contact(name,eamil,msg,user_id) values ('".$name."','".$eamil."','".$message."','".$userid."')";
$result = $mysqli->query($sql);
if($result==1){
    $json = json_encode("true");
    exit(($json));
}else{
    $json = json_encode("false");
    exit(($json));
}
?>