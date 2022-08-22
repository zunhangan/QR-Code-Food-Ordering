<?php
include './func/function.php';	
include './func/verify.php';	

$datebase = new Datebase();
$sql = "SELECT * FROM foodorder";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
$allorder = count($date);
$order = [];
$l = 0;
for($i=0;$i<$allorder;$i++){
	if ($date[$i]['succ']==0 OR $date[$i]['addonsucc']==0){
		$l = array_push($order,$date[$i]);
	}
}
//var_dump($order);
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
	
	<title>Order</title>
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
					Manage Order
				</h1>
				<p>
					You can View order details, and manage orders here.
				</p>

			</div>
		</div>
	</div>



<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">Manage Order</div>
 <br/>


 <?php
 $s = 0;
 	for($k=0;$k<$l;$k++){
 		if($date[$k]['succ']==0){
 			$s++;
 		echo '<div class="panel panel-primary ">';
		echo '<div class="panel-heading ">Table '.$order[$k]['num'].'</div>';
		echo '<div class="panel-body">';
		echo '<p>Order ID:'.$order[$k]['id'].'，Pax: '.$order[$k]['pnum'].'Pax</p></div><table class="table"><tr><th>Item</th><th>Quantity</th></tr>';
		$info = json_decode($order[$k]['info']);
		foreach($info as $name => $number){
			echo'<tr><td>'.$name.'</td><td>'.$number.'</td></tr>';
		}
		echo '  </table>';
		echo '<a href="./func/succ.php?tag=1&id='.$order[$k]['id'].'" class="btn btn-primary bb">Done</a><a href="./func/del.php?tag=1&id='.$order[$k]['id'].'" class="btn btn-danger bb">Delete</a></div>';
		}
 		if($order[$k]['addon']){
 			$addon = $order[$k]['addon'];
			$datebase = new Datebase();
			$sql = "SELECT * FROM foodaddon WHERE id = '$addon'";
			$res1 = $datebase -> querySql($sql,"./func/config.php");
			$date1 = $datebase -> useDate($res1);
			$allorder1 = count($date1);
			$order1 = [];
			$l1 = 0;
			for($j=0;$j<$allorder1;$j++){
				if ($date1[$j]['succ']==0){
					$l1 = array_push($order1,$date1[$j]);
				}
			}
			for($j=0;$j<$l1;$j++){
				$s++;
				echo '<div class="panel panel-danger ">';
				echo '<div class="panel-heading ">Table(Addon) '.$order[$k]['num'].' </div>';
				echo '<div class="panel-body">';
				echo '<p>Order ID: '.$order1[$j]['id'].'，Pax: '.$order[$k]['pnum'].'Pax</p></div><table class="table"><tr><th>Item</th><th>Quantity</th></tr>';
				$info1 = json_decode($order1[$j]['info']);
				foreach($info1 as $name1 => $number1){
					echo'<tr><td>'.$name1.'</td><td>'.$number1.'</td></tr>';
				}
				echo '  </table>';
				echo '<a href="./func/succ.php?tag=2&id='.$order1[$j]['id'].'" class="btn btn-primary bb">Done</a>
	
				<a href="./func/del.php?tag=2&id='.$order1[$j]['id'].'" class="btn btn-danger bb">Delete</a></div>';
			
		
			}
			
			
 		}
 	}
 	
 ?>
  <?php
 	if($s==0){
 		echo ' <h4>No Order Found.</h4>';
 	}
 	
 	?>
 
</div>
</div>



	


</body>
</html>
