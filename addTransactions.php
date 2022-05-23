<?php
error_reporting(0);
$userid=$_GET['userid'];
$bookid=$_GET['bookid'];
$number=$_GET['number'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql1 = "select * from books where id=".$bookid;
$result = $mysqli->query($sql1);
$assoc = $result->fetch_assoc();
if($assoc==""){
   exit(false);
}else{
    $number_format = number_format($assoc["amount"]);
    $number_format1 = number_format($number);
    $bcsub = bcsub($number_format, $number_format1);
    if($bcsub>=0){
        $sql = "update books set amount=".$bcsub." where id=".$bookid;
        $result1 = $mysqli->query($sql);
        $sql2 = "insert into  transactions(book_id,amount,user_id) values(".$bookid.",".$number_format1.",".$userid.")";
        $result2 = $mysqli->query($sql2);
        $json = json_encode("true");
        exit(($json));
    }else{
        $json = json_encode("false");
        exit(($json));
    }
}

?>