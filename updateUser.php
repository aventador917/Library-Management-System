<?php
error_reporting(0);
$id=$_GET["id"];
$paassword=$_GET["password"];
$gender=$_GET["gender"];
$IsAtive=$_GET["IsAtive"];
$email=$_GET["email"];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "update users set gender='".$gender."',password='".md5($paassword)."',ia_activete=".$IsAtive.", eamil='".$email."' where id=".$id;
$result = $mysqli->query($sql);
if($result==1){
    $json = json_encode("true");
    exit(($json));
}else{
    $json = json_encode("false");
    exit(($json));
}




