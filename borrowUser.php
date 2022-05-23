<?php
error_reporting(0);
$userid=$_GET['userid'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select *,users.name as userName,transactions.id as transactionsId from transactions  join users  on users.id=transactions.user_id where user_id=".$userid;
$result = $mysqli->query($sql);
$aryy1=array();
while($arr = $result->fetch_assoc()) {
    array_push($aryy1,$arr);
}
$aryy2=array();
foreach ($aryy1 as $value){
    $sql2 = "select *  from  books where  id=".$value["book_id"];
    $mysqli_result = $mysqli->query($sql2);
    while($arr = $mysqli_result->fetch_assoc()) {
        $arr["transactionsId"]=$value["transactionsId"];
        $arr["userName"]=$value["userName"];
        $arr["borrowId"]=$value["id"];
        $arr["borrowBook"]=$value["amount"];
        array_push($aryy2,$arr);
    }
}
$json = json_encode($aryy2);
exit(($json));
?>