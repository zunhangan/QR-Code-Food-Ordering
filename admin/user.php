<?php
	include './func/verify.php';	
		include './func/function.php';
	$getdate = new getDate();
	$act = $getdate -> getGet("act");
	$datebase = new Datebase();
	$sql = "SELECT * FROM foodadmin";
	$res = $datebase -> querySql($sql,"./func/config.php");
	$date = $datebase -> useDate($res);
	//var_dump($date);
	if($act == 1){
		$a = "Changes Saved!";
	}elseif($act == 5||$act == 0){
		$a = "";
	}
	else{
		$a = "Failed to Change!";
	}
	?>
<!DOCTYPE html>
<html>
<head>

  <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script src="//cdn.staticfile.org/jquery/1.12.4/jquery.min.js"></script>
 	<script src="c" type="text/javascript" charset="utf-8"></script>
  <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" />
	<meta charset="utf-8"/>
	
	<title>Manage User</title>
</head>
<style type="text/css">
	.bb{
		margin-left: 20px;
		margin-bottom: 10px;
	}
</style>

<body>
	
	<?php
		include "header.php";
		?>


<div class="container-fluid">
	<div class="row-fluid" style="background-color: darkslateblue; color: #FFFFA0; padding: 10px;">
		<div class="span12">
			<div class="hero-unit">
				<h1>
					Manage User
				</h1>
				<p>
					Add new user or Change password here.
				</p>
			</div>
		</div>
	</div>




<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">Manage User</div> 
 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">Add New User</div>
  <div class="panel-body">
    
<form action="./func/add.php?tag=3" method="post" class="container container-small">
    <div class="form-group">
        <lable>Username: </lable>
        <input name="user" id="user" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>Password: </lable>
        <input name="pass" id="pass" type="text" class="form-control">
    </div>

<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="Add User"/>
</form>

  </div>
</div>

 <br/>
 
 <div class="panel panel-danger">
  <div class="panel-heading">Change Password</div>
  <div class="panel-body">
    
<form action="./func/edit.php?act=3&id=<?php echo $_COOKIE['id']; ?>" method="post" enctype="multipart/form-data" id="dp" class="container container-small">
  
    <div class="form-group">
        <lable>Enter new password</lable>
        <input name="newpass" id="newpass" type="text" class="form-control">
    <lable>Please insert new password directly!</lable>
    </div>

<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="Change"/>
    <h5><?php echo $a; ?></h5>
</form>

  </div>
</div>

 <div class="panel panel-danger">
  <div class="panel-heading">User Lists</div>
  <div class="panel-body">
    
<table class="table">
	<?php

			echo '<tr><th>id</th><th>Username</th><th>Password</th><th>Action</th></tr>';
			foreach ($date as $v){
				echo '<tr><td>'.$v['id'].'</td><td>'.$v['user'].'</td><td>'.$v['pass'].'</td><td><a href="./func/del.php?tag=6&id='.$v['id'].'">Delete</a></td></tr>';
			}
			
		?>

    	
  </table>

  </div>
</div>
 
</div>
</div>



	


</body>
</html>
