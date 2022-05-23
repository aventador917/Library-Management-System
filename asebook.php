<?php
error_reporting(0);
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select *,users.name as userName,transactions.id as transactionsId from transactions  join users  on users.id=transactions.user_id  order by transactions.create_at asc";
$result = $mysqli->query($sql);
$aryy1=array();
while($arr = $result->fetch_assoc()) {
    array_push($aryy1,$arr);
}
$aryy2=array();
foreach ($aryy1 as $value){
    $sql2 = "select *  from  books where  id=".$value[book_id];
    $mysqli_result = $mysqli->query($sql2);
    while($arr = $mysqli_result->fetch_assoc()) {
        $arr["borrowId"]=$value["id"];
        $arr["borrowBook"]=$value["amount"];
        $arr["userName"]=$value["userName"];
        array_push($aryy2,$arr);
    }
}
$array_unset = array_unset($aryy2, "name");
function array_unset($arr,$key){
    $res = array();
    foreach ($arr as $value) {
        if(isset($res[$value[$key]])){
            unset($value[$key]);
        }else{
            $res[$value[$key]] = $value;
        }
    }
    return $res;
}
$arr3=array();
foreach ($array_unset as $value){
    array_push($arr3,$value);
}
$json = json_encode($arr3);
exit(($json));
?>