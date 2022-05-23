<?php
error_reporting(0);
$userid=$_GET['userid'];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select *  from  transactions where user_id=".$userid;
$result = $mysqli->query($sql);
$aryy1=array();
while($arr = $result->fetch_assoc()) {
    array_push($aryy1,$arr);
}
$listBook=array();
foreach ($aryy1 as $value){
    $bookId=$value["book_id"];
    $sql = "select * from books where  id='".$bookId."'";
    $result = $mysqli->query($sql);
    $assoc = $result->fetch_assoc();
    array_push($listBook,$assoc[type]);
}
$recommend=array();
$array_unique = array_unique($listBook);
$array_unique1=array();
foreach ($array_unique as $item){
    $sql = "select * from books where  type='".$item."'";
    $result = $mysqli->query($sql);
    while($arr = $result->fetch_assoc()) {
        array_push($array_unique1,$arr);
    }
}

if(sizeof($array_unique1)>10){
    $array_unique2=array();
    $array = array();
    while(sizeof($array_unique2)!=10){
        $rand = rand(0, sizeof($array_unique1));
        if(!in_array($rand,$array)){
            array_push($array,$rand);
            array_push($array_unique2,$array_unique1[$rand]);
        }
    }
    $array_filter = array_filter($array_unique2);
    $json = json_encode($array_filter);
    exit(($json));
}else{
    $json = json_encode($array_unique1);
    exit(($json));
}


?>