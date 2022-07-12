<?php
require "dbconfig.php";
$id=$_GET['sid'];
$flg=$_GET["flag"];

$sq="";
if($flg==0)
{
	$sq="UPDATE property SET utype='approved' WHERE utype='pending_property' AND pid='$id'";
}
else if($flg==1){
	$sq="UPDATE property SET utype='rejected' WHERE utype='pending_property' AND pid='$id'";
}
$res = mysqli_query($conn,$sq);
echo $sq;
header("location:property_approval.php");

?>