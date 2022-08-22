<?php
	include './func/verify.php';	
		include './func/function.php';
	$getdate = new getDate();
	$act = $getdate -> getGet("act");
	$a="";
	if ($act==1){
		$a = "Success!";
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

	<title>Admin Panel</title>
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
					Welcome!
				</h1>
				<p>
					Welcome to Admin Panel, you can view statistic and manage restaurant here.
				</p>
<a class="btn btn-primary btn-large" href="index.php"><< Back </a>
			</div>
		</div>
	</div>




<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">Manage Shop</div> 
 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">Shop Information</div>
  <div class="panel-body">
    
<form action="./func/edit.php?act=1" method="post" enctype="multipart/form-data" id="dp" class="container container-small">
    <div class="form-group">
        <lable>Shop Name: </lable>
        <input name="name" id="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>Introduction: </lable>
        <input name="info" id="info" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>Photos: </lable>
        <input name="file" id="file" formenctype="multipart/form-data" type="file" class="form-control">
    <lable>Maximum 100KB of JPG/PNG.</lable>
    </div>

<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="Save Changes"/>
    <h5 style="color: red;"><?php echo $a;?></h5>
</form>

  </div>
</div>

 <br/>
 
 <div class="panel panel-danger">
  <div class="panel-heading">QR Code</div>
  <div class="panel-body">
    
<form action="./func/edit.php?act=2" method="post" enctype="multipart/form-data" id="dp" class="container container-small">
  
    <div class="form-group">
        <lable>Photo: </lable>
        <input name="file" id="file" formenctype="multipart/form-data" type="file" class="form-control">
    <lable>Maximum 100KB of JPG/PNG.</lable>
    </div>

<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="Save Changes"/>
    <h5 style="color: red;"><?php echo $a;?></h5>
</form>

  </div>
</div>


 
</div>
</div>



	


</body>
</html>
