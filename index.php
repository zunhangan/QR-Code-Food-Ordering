<?php
	include './admin/func/function.php';
	$getdate = new getDate();
	$table = $getdate -> getGet("table");
	$datebase = new Datebase();
	$sql = "SELECT * FROM foodorder where num='$table' and succ = 0";
	$res = $datebase -> querySql($sql,"./admin/func/config.php");
	$date = $datebase -> useDate($res);
	if($res->num_rows){
	if($date[0]['time']==date("Y-m-d")){
		$id = $date[0]['id'];
		echo "<script>window.location.href='./succeed.php?act=1&id=".$id."'</script>";
	}}
	?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8">
      	mui.init();
    </script>
</head>
<style type="text/css">
	.cer{
		margin: auto;
		margin-top: 60px;
		height: 200px;
		width: 200px;
		border:1px solid #000000;
		border-radius: 100px;
		text-align: center;
		line-height: 200px;
	}
	.plus{
		margin-left: 50px;
		font-size: 40px;
		color: #000000;
	}
	.minus{
		margin-right: 40px;
		font-size: 40px;
		color: #000000;
	}
	#num{
		text-align: center;
	}
	.tj{
		width: 250px;
		margin-top: 40px;
		background-color: #000000;
		border: #DD524D;
	}
	.bb{
		text-align: center;
	}
</style>
<body>
	<div class="mui-content">
	    <header class="mui-bar mui-bar-nav" style="background-color: #000000;">
	        <h1 class="mui-title" style="color: white;">How many guests?</h1>
	    </header>
	    <div class="box">
	    	<div class="cer">
	    	<span id="num1" style="font-size: 40px;">
	    		0
	    	</span>Pax
	    </div>
	    </div>
	    <div id="num">
	    	<div onclick="min()" class="mui-icon mui-icon-minus minus"></div>
	    	<div onclick="add()" class="mui-icon mui-icon-plus plus"></div>
	    </div>
	    <div class="bb">
	    	 <button onclick="tj()" type="button" class="mui-btn mui-btn-primary tj">Next</button>
	    
	    </div>
	   
	</div>
</body>

<script type="text/javascript">
	var num = 0;
	function add (){
		num = num+1;
		var o = document.getElementById("num1");
		if (num > 8){
			num = 0;
		}
		o.innerHTML = num;
	}
		function min (){
		num = num-1;
		var o = document.getElementById("num1");
		if (num < 0){
			num = 8;
		}
		o.innerHTML = num;
	}
		function tj(){
		var o = document.getElementById("num1");
		window.location.href="order.php?table=<?php echo $table; ?>&num="+o.innerHTML;
		}
</script>