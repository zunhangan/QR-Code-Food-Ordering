<?php
include './func/function.php';	
include './func/verify.php';	
$s="";
$u = "";
	$getdate = new getDate();
	$act = $getdate -> getGet("act");

if($act){
	$url = $getdate -> getPost("url");
	$num = $getdate -> getPost("num");
	$s = $url."".$num;
	$u = $url;	
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
	
	<title>QR Generator</title>
</head>


<body>
	
	<?php
		include "header.php";
		?>


<div class="container-fluid">
	<div class="row-fluid" style="background-color: darkslateblue; color: #FFFFA0; padding: 10px;">
		<div class="span12">
			<div class="hero-unit">
				<h1>
					Table QR Generator
				</h1>
				<p>
					PLease insert your URL and Table number to generate the QR code!
				</p>
				<p>
					 <a class="btn btn-primary btn-large" href="index.php"><< Back</a>
				</p>

			</div>
		</div>
	</div>




<div class="panel panel-default" style="margin: 10px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">QR Code Generator</div>
  <div class="panel-body" style="text-align: center;">
    <form action="qrcode.php?act=1" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">URL</label>
    <input name="url" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $u; ?>" placeholder="http://www.southernbistro.com">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Table</label>
    <input name="num" type="number" class="form-control" id="exampleInputPassword1" placeholder="1">
  </div>
  
  
  <button type="submit" class="btn btn-default">Generate</button>
</form>
    <iframe width="350px" height="350px" src=" https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?php echo $s; ?>&mhid=4RbPDg3qyZ4hMHcrItNTOqM" width="" height=""></iframe>

</div>
</div>



	


</body>
</html>
