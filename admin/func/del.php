<?php
include './function.php';

$getdate = new getDate();
$datebase = new Datebase();
$tag = $getdate -> getGet("tag");
$id = $getdate -> getGet("id");
$sql1 = "delete from foodorder where id = '$id'";
$sql2 = "delete from foodaddon where id = '$id'";
$sql3 = "update foodorder set addonsucc = '1' where id = '$id'";
$sqlfl = "delete from foodtype where id = '$id'";
$sqlcd = "delete from foodmenu where id = '$id'";
$sqlus = "delete from foodadmin where id = '$id'";
if($tag==1){
	$datebase -> querySql($sql1,"./config.php");
	echo "<script>window.location.href='../order.php'</script>";
}else if($tag==2){
	$datebase -> querySql($sql2,"./config.php");
	$datebase -> querySql($sql3,"./config.php");
	echo "<script>window.location.href='../order.php'</script>";
}else if($tag==3){
	$datebase -> querySql($sqlfl,"./config.php");
	echo "<script>window.location.href='../foodtype.php'</script>";
}else if($tag==4){
	$datebase -> querySql($sql1,"./config.php");
	echo "<script>window.location.href='../history.php'</script>";
}else if($tag==5){
	$datebase -> querySql($sqlcd,"./config.php");
	echo "<script>window.location.href='../menu.php'</script>";
}else if($tag==6){
	$datebase -> querySql($sqlus,"./config.php");
	echo "<script>window.location.href='../user.php'</script>";
}

die();
?>