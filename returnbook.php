<?php
error_reporting(0);
$id=$_GET['id'];
$numbers=$_GET['numbers'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select *  from  transactions  where id=".$id;
$result = $mysqli->query($sql);
$assoc1 = $result->fetch_assoc();
$bcsub = bcsub($assoc1[amount], $numbers);
if($bcsub>0){
    $sql1="select * from books where id=".$assoc1["book_id"];
    $result1 = $mysqli->query($sql1);
    $assoc = $result1->fetch_assoc();
    $bcadd = bcadd($assoc[amount], $numbers);
    $sql2="update books set amount=".$bcadd." where id=".$assoc1["book_id"];
    $result = $mysqli->query($sql2);
    $sql3="update transactions set amount=".$bcsub." where id=".$id;
    $result = $mysqli->query($sql3);
    exit("true");
}
if($bcsub==0){
    $sql1="select * from books where id=".$assoc1["book_id"];
    $result1 = $mysqli->query($sql1);
    $assoc = $result1->fetch_assoc();
    $bcadd = bcadd($assoc[amount], $numbers);
    $sql2="update books set amount=".$bcadd." where id=".$assoc1["book_id"];
    $result = $mysqli->query($sql2);
    $sql3="DELETE from transactions where id=".$id;
    $result = $mysqli->query($sql3);
    exit("true");
}

?>