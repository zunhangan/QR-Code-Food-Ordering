<?php
include './function.php';

$getdate = new getDate();
$datebase = new Datebase();
$tag = $getdate -> getGet("tag");
$id = $getdate -> getGet("id");
$sql1 = "update foodorder set succ = '1' where id = '$id'";
$sql2 = "update foodaddon set succ = '1' where id = '$id'";
$sql3 = "update foodorder set addonsucc = '1' where id = '$id'";
if($tag==1){
	$res = $datebase -> querySql($sql1,"./config.php");
}else{
	$res = $datebase -> querySql($sql2,"./config.php");
	$res = $datebase -> querySql($sql3,"./config.php");
}
echo "<script>window.location.href='../order.php'</script>";
die();
?>