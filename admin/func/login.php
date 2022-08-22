<?php
	include 'function.php';
	$date = new getDate();
	$user = $date ->getPost("user");
	$pass = $date ->getPost("pass");
	if (!$user and !$pass){
		echo "<script>window.location.href='../login.html'</script>";
		die();
	}
	$login = new login();
	$res = $login -> userLogin($user,$pass);
	
	if(!$res){
		echo "<script>window.location.href='../login.html'</script>";
		die();
	}
	setcookie("user",$res['1'],time()+3600*6,"/");
	setcookie("id",$res['0'],time()+3600*6,"/");
	echo "<script>window.location.href='../index.php'</script>";
	die();
	?>

