<?php
error_reporting(0);
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql1="select * from transactions";
$mysqli_result = $mysqli->query($sql1);
$aryy1=array();
while($arr = $mysqli_result->fetch_assoc()) {
    array_push($aryy1,$arr[book_id]);
}
$array_unique = array_unique($aryy1);
$aryy2=array();
foreach ($array_unique as $value){
    $sql2 = "select *  from  books where  id=".$value;
    $mysqli_result = $mysqli->query($sql2);
    while($arr = $mysqli_result->fetch_assoc()) {
        array_push($aryy2,$arr);
    }
}
$json = json_encode($aryy2);
exit(($json));
?>