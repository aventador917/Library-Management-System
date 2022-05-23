<?php
error_reporting(0);
$name=$_GET['name'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$newisbn=mysqli_real_escape_string($mysqli,$name);
$sql = "select * from books  where books.`name` like '%".$newisbn."%'";
$result = $mysqli->query($sql);
$arry=array();
while($arr = $result->fetch_assoc()){
    array_unshift($arry, $arr);
}
$json = json_encode($arry);
exit($json);

?>