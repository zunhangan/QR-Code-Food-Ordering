<?php
include './func/function.php';	
include './func/verify.php';	

$datebase = new Datebase();
$sql = "SELECT * FROM foodorder";
$sql2 = "SELECT * FROM foodmenu";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
//var_dump($date);
$allorder = count($date);
$money = "0";
$torder = 0;
for($i=0;$i<$allorder;$i++){
	$money = $money+$date[$i]['money'];
}
for($i=0;$i<$allorder;$i++){
	if($date[$i]['time']==date("Y-m-d")){
		$torder++;
	}
}
$res1 = $datebase -> querySql($sql2,"./func/config.php");
$date1 = $datebase -> useDate($res1);
$cd = count($date1);

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
	
	<title>Dashboard</title>
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
					Welcome!
				</h1>
				<p>
					Welcome to Admin Dashboard, you can view statistic and manage restaurant here.
				</p>
				<p>
					 <a class="btn btn-primary btn-large" href="shop.php">Manage Restaurant</a>
				 <a class="btn btn-primary btn-large" href="qrcode.php">Generate QR Code</a>
				</p>

			</div>
		</div>
	</div>



<div class="panel panel-default" style="margin: 10px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">Statistic</div>
  <div class="panel-body" style="text-align: center;">
    
    
    <div style="display: inline-block;position: relative;">
    <img src="img/money1.jpg"/ style="width: 300px; height: 155px;border-radius: 10px;margin: 2px">	
    <span style="position: absolute; top: 50px; left: 130px;font-size: 40px;color: white;">RM <?php echo $money; ?></span>
    <span style="position: absolute; top: 120px; left: 150px;font-size: 20px;color: white;">Amount</span>
    </div>
    
    <div style="display: inline-block; position: relative;">
    <img src="img/order1.jpg"/ style="width: 300px; height: 155px;border-radius: 10px;">	
    <span style="position: absolute; top: 50px; left: 180px;font-size: 40px;color: white;"><?php echo $torder; ?></span>
    <span style="position: absolute; top: 120px; left: 150px;font-size: 20px;color: white;">Today's Sales</span>
    </div>
    
    <div style="display: inline-block;position: relative;">
    <img src="img/history1.jpg"/ style="width: 300px; height: 155px;border-radius: 10px;margin: 2px">	
    <span style="position: absolute; top: 50px; left: 180px;font-size: 40px;color: white;"> <?php echo $allorder; ?></span>
    <span style="position: absolute; top: 120px; left: 150px;font-size: 20px;color: white;">Total Sales</span>
    </div>
    
    <div style="display: inline-block;position: relative;">
    <img src="img/order2.jpg"/ style="width: 300px; height: 155px;border-radius: 10px;">
    <span style="position: absolute; top: 40px; left: 160px;font-size: 50px;color: white;"><?php echo $cd; ?></span>
    <span style="position: absolute; top: 120px; left: 150px;font-size: 20px;color: white;">Menu Items</span>
    </div>
    
  </div>
</div>

<div class="panel panel-default" style="margin: 10px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">About This System</div>
  <div class="panel-body">
  <table class="table">
    	<tr><th>Name</th><th>Details</th><th></th><th>Name</th><th>Details</th></tr>
    	<tr><td>System Version: </td><td>1.1.3</td><td></td><td>System Details</td><td>php+mysql</td></tr>
    	<tr><td>Version Date: </td><td>1st June 2022</td><td></td><td>Current Time</td><td><?php echo @date("Y-m-d H:i:s"); ?></td></tr>
    	<tr><td>Accessibility</td><td>Admin</td><td></td></tr>
  </table>
  </div>
</div>


</div>




	


</body>
</html>
