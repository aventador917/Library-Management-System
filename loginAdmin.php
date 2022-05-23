<?php
error_reporting(0);
$username=$_GET['username'];
$paassword=$_GET["password"];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$sql = "select * from admins where name='".$username."'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
if(md5($paassword)==$row[password]){
    $id=$row[id];
    $respone = new Respone("true", $id);
    $json = json_encode($respone);
    exit(($json));
}else{
    exit("false");
}
class Respone {
    public $status;
    public $id;
    public function __construct($status, $id)
    {
        $this->status = $status;
        $this->id = $id;
    }
}
?>