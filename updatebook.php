<?php
error_reporting(0);
$id=$_POST["id"];
$name=$_POST['name'];
$author=$_POST["author"];
$publishDate=$_POST["publishDate"];
$isbn=$_POST["isbn"];
$amount=$_POST["amount"];
$summary=$_POST["summary"];
$type=$_POST["type"];
$picture = $_POST["picture"];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "update books set url='".$picture."', name='".$name."',author='".$author."',publish_date='".$publishDate."',isbn='".$isbn."',amount='".$amount."',summary='".$summary."',type='".$type."' where id=".$id;
$result = $mysqli->query($sql);
if($result==1){
    $json = json_encode("true");
    exit(($json));
}else{
    $json = json_encode("false");
    exit(($json));
}
?>
