<?php
error_reporting(0);
$id=$_GET['id'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "DELETE from booktype where id=".$id;
$result = $mysqli->query($sql);
if($result==1){
    $json = json_encode("true");
    exit(($json));
}else{
    $json = json_encode("false");
    exit(($json));
}
?>