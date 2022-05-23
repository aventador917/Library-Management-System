<?php
error_reporting(0);
$username=$_GET['username'];
$paassword=$_GET["password"];
$gender=$_GET["gender"];
$IsAtive=$_GET["IsAtive"];
$mailbox=$_GET["mailbox"];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql1="select * from users where name='".$username."'";
$result = $mysqli->query($sql1);
$assoc1 = $result->fetch_assoc();
if(isset($assoc1)){
    $json = json_encode("false");
    exit($json);
}else{
    $sql = "insert into users(name,password,gender,ia_activete,eamil) values('".$username."','".md5($paassword)."',".$gender.",".$IsAtive.",'".$mailbox."')";
    $result1 = $mysqli->query($sql);
    if($result1=="1"){
        $json = json_encode("true");
        exit(($json));
    }else{
        $json = json_encode("false");
        exit(($json));
    }
}
?>