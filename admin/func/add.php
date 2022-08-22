<?php
header("Content-type:text/html;charset=utf-8");
include './function.php';

$getdate = new getDate();
$datebase = new Datebase();
$tag = $getdate -> getGet("tag");
$name = $getdate -> getPost("name");



if($tag==1){
	$sql = "ALTER TABLE `foodtype` AUTO_INCREMENT =1";
	$sql1 = "insert into foodtype (name) value ('$name')";
	$datebase -> querySql($sql,"./config.php");
	$datebase -> querySql($sql1,"./config.php");
	echo "<script>window.location.href='../foodtype.php'</script>";
}else if($tag==2){
	$sql0 = "ALTER TABLE `foodmenu` AUTO_INCREMENT =1";
	

	$info = $getdate -> getPost("info");
	$money = $getdate -> getPost("money");
	$push = $getdate -> getPost("push");
	$foodtype = $getdate -> getPost("foodtype");
	$pic=0;
	
	$allowedExts = array("gif", "jpeg", "JPG", "PNG","jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	echo $_FILES["file"]["size"];
	$extension = end($temp);     
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 2048000)   
	&& in_array($extension, $allowedExts))
	{
	    if ($_FILES["file"]["error"] > 0)
	    {
	        echo "Error: " . $_FILES["file"]["error"] . "<br>";
			$pic=1;
	    }
	    else
	    {
	        echo "File name: " . $_FILES["file"]["name"] . "<br>";
	        echo "File type " . $_FILES["file"]["type"] . "<br>";
	        echo "File size " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	        echo "Temporary file location: " . $_FILES["file"]["tmp_name"] . "<br>";
	        
	        
	        if (file_exists("upload/" . $_FILES["file"]["name"]))
	        {
	            echo $_FILES["file"]["name"] . " File saved at :  ";
	        }
	        else
	        {
	            
	            $filename = "img_".time().rand(1000,9999).".jpg";
	            move_uploaded_file($_FILES["file"]["tmp_name"], "../../upload/" . $filename);
				$url = "upload/".$filename;
	            echo "File saved at: " . "upload/" . $filename;
	        }
	    }
	}
	else
	{
	    echo "Invalid Format";
		$pic=1;
	}
	if($name==""||$info==""||$money==""||$push==""||$foodtype==""||$pic){
		echo "<br/>Failed to Add!";
		die();
	}
		$sql2 = "insert into foodmenu (foodtype,name,money,pic,info,push) value ('$foodtype','$name','$money','$url','$info','$push')";
		$datebase -> querySql($sql0,"./config.php");
		$datebase -> querySql($sql2,"./config.php");
		echo "<script>window.location.href='../menu.php'</script>";
}elseif($tag == 3){
	$user = $getdate -> getPost("user");
	
	$pass = md5($getdate -> getPost("pass"));
	$sql = "ALTER TABLE `foodtype` AUTO_INCREMENT =1";
	$sql1 = "insert into foodadmin (user,pass) value ('$user','$pass')";
	$datebase -> querySql($sql,"./config.php");
	$datebase -> querySql($sql1,"./config.php");
	echo "<script>window.location.href='../user.php'</script>";
}
	
	die();
?>