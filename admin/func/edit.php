<?php
header("Content-type:text/html;charset=utf-8");
include './function.php';

$getdate = new getDate();
$datebase = new Datebase();
$name = $getdate -> getPost("name");
$info = $getdate -> getPost("info");
$act = $getdate -> getGet("act");
$pic=0;
if($act==1){
	
	$allowedExts = array("gif", "jpeg", "jpg", "png","JPG","PNG");
	$temp = explode(".", $_FILES["file"]["name"]);
	echo $_FILES["file"]["size"];
	$extension = end($temp);     
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 204800)   
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
	        echo "File type: " . $_FILES["file"]["type"] . "<br>";
	        echo "File size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	        echo "Temporary File Located: " . $_FILES["file"]["tmp_name"] . "<br>";
	        
	        
	        if (file_exists("upload/" . $_FILES["file"]["name"]))
	        {
	            echo $_FILES["file"]["name"] . "File existed! ";
	        }
	        else
	        {
	         
	            $filename = "dpimg_".time().rand(1000,9999).".jpg";
	            move_uploaded_file($_FILES["file"]["tmp_name"], "../../upload/" . $filename);
				$url = "upload/".$filename;
	            echo "File Saved at: " . "upload/" . $filename;
	        }
	    }
	}
	else
	{
	    echo "Invalid File format!";
		$pic=1;
	}
	if($name==""||$info==""||$pic){
		echo "<br/>Add Failed!";
		die();
	}
	
	$sql = "update shop set name = '$name' , pic = '$url' , info = '$info' where id = '1'";
	$datebase -> querySql($sql,"./config.php");
	echo "<script>window.location.href='../shop.php?act=1'</script>";
}else if($act==2){

	$allowedExts = array("gif", "jpeg", "jpg", "png","JPG","PNG");
	$temp = explode(".", $_FILES["file"]["name"]);
	echo $_FILES["file"]["size"];
	$extension = end($temp);     
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 204800)   
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
	        echo "File Type: " . $_FILES["file"]["type"] . "<br>";
	        echo "File Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	        echo "File Temporary Saved at: " . $_FILES["file"]["tmp_name"] . "<br>";
	        
	        
	        if (file_exists("upload/" . $_FILES["file"]["name"]))
	        {
	            echo $_FILES["file"]["name"] . " File Exist! ";
	        }
	        else
	        {
	            
	            $filename = "qrcode_".time().rand(1000,9999).".jpg";
	            move_uploaded_file($_FILES["file"]["tmp_name"], "../../upload/" . $filename);
				$url = "upload/".$filename;
	            echo "File Saved at: " . "upload/" . $filename;
	        }
	    }
	}
	else
	{
	    echo "Invalid Format";
		$pic=1;
	}
	
	$sql = "update shopqr set url = '$url' where id = 1";
	$datebase -> querySql($sql,"./config.php");
	echo "<script>window.location.href='../shop.php?act=1'</script>";
}elseif($act == 3){
	$pass = md5($getdate -> getPost("newpass"));
	$id = $getdate -> getGet("id");
	$sql = "update foodadmin set pass = '$pass' where id = '$id'";
	$res = $datebase -> querySql($sql,"./config.php");
	if($res){
		echo "<script>window.location.href='../user.php?act=1'</script>";
	}else{
		echo "<script>window.location.href='../user.php?act=2'</script>";
	}
	
}
?>