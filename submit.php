<?php
	header("Content-Type: text/html;charset=utf-8");
	include './admin/func/function.php';
	$getdate = new getDate();
	$table = $getdate -> getGet("table");
	$num = $getdate -> getGet("num");
	$id = $getdate -> getGet("id");
	$money = $getdate -> getGet("money");
	$data = $getdate -> getPost('data');
	//var_dump($data);
	
	$time = date("Y-m-d");
	$addon = time().rand(1000, 9999).rand(10, 99).rand(100, 999);
	$datebase = new Datebase();
	if($id){
		//echo "2";
		$sql = "update foodorder set addon = '$addon' , addonsucc = 0 where id = '$id'";
		$sql1 = "insert into foodaddon (id,info,money,time) value ('$addon','$data',$money,'$time')";
		$res = $datebase -> querySql($sql,"./admin/func/config.php");
		$res1 = $datebase -> querySql($sql1,"./admin/func/config.php");
		if($res1){
			//echo "1";
			echo "<script>window.location.href='./succ.php?id=".$addon."'</script>";
			die();
		}else{
			echo "<script>window.location.href='./fail.html'</script>";
			die();
	}
	}
	//echo "3";
	$id = time().rand(1000, 9999).rand(10, 99).rand(100, 999);
	$sql = "insert into foodorder (id,num,info,money,pnum,time) value ('$id','$table','$data',$money,'$num','$time')";
	$res = $datebase -> querySql($sql,"./admin/func/config.php");
	if($res){
		echo "<script>window.location.href='./succeed.php?id=".$id."'</script>";
	}else{
		echo "<script>window.location.href='./fail.html'</script>";
	}
	die();
?>