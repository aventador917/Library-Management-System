<?php
error_reporting(0);
$name=$_POST['name'];
$author=$_POST["author"];
$publishDate=$_POST["publishDate"];
$isbn=$_POST["isbn"];
$amount=$_POST["amount"];
$type=$_POST["type"];
$summary=$_POST["summary"];
$url=$_POST["picture"];
$mysqli = new mysqli("127.0.0.1","root","root","bookmange");
$newname=mysqli_real_escape_string($mysqli,$name);
$newauthor=mysqli_real_escape_string($mysqli,$author);
$newpublishDate=mysqli_real_escape_string($mysqli,$publishDate);
$newisbn=mysqli_real_escape_string($mysqli,$isbn);
$newamount=mysqli_real_escape_string($mysqli,$amount);
$newsummary=mysqli_real_escape_string($mysqli,$summary);
$newurl=mysqli_real_escape_string($mysqli,$url);
$sql = "insert into
    books(name,author,url,publish_date,isbn,amount,summary,type)
     values ('".$newname."','".$newauthor."','".$newurl."','".$newpublishDate."','".$newisbn."','".$newamount."','".$newsummary."',".$type.")";
$result = $mysqli->query($sql);
if($result==1){
    $json = json_encode("true");
    exit(($json));
}else{
    $json = json_encode("false");
    exit(($json));
}
?>