<?php
header("Content-Type:text/html; charset=utf-8");
$host = "localhost";
$user = "android";
$password = "00000000";
$db ="input";

$sql ="select * from getdate";
$con = mysqli_connect($host,$user,$password,$db);
mysqli_query($con,"SET NAMES 'utf8'");
$result =mysqli_query($con,$sql);
$response =array();

while($row = mysqli_fetch_array($result)){
    array_push($response,array("id"=>$row[0],"dates"=>$row[1],
	"year"=>$row[2],"month"=>$row[3],"day"=>$row[4],"week"=>$row[5],"note"=>$row[6]));
}
echo json_encode($response, JSON_UNESCAPED_UNICODE);
mysqli_close($con);
?>
