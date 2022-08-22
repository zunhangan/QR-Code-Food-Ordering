<?php
	include './func/function.php';	

$datebase = new Datebase();
$getdate = new getDate();
$pag = $getdate -> getGet("pag");
$sql = "SELECT * FROM foodorder";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
//var_dump($date);
$allorder = count($date);
if($allorder<100){
	$p = 1;
}else{
	$p = intval(floor($allorder/100)); 
	if($allorder%100){
		$p = $p+1;
	}
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
	
	<title>History</title>
</head>
<style type="text/css">
	.bb{
		margin-left: 20px;
		margin-bottom: 10px;
	}
</style>

<body>
	<
	<?php
		include "header.php";
		?>


<div class="container-fluid">
	<div class="row-fluid" style="background-color: darkslateblue; color: #FFFFA0; padding: 10px;">
		<div class="span12">
			<div class="hero-unit">
				<h1>
					History
				</h1>
				<p>
					You can view the restaurant's order histories here.
				</p>

			</div>
		</div>
	</div>



<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">History</div> 
 <br/>

<table class="table">
	<?php
		$n = 100*$p+1;
		$i = ($p-1)*100+1;
		if($allorder<100){
			$n=$allorder+1;
		}
		for($i;$i<$n;$i++){
				$s =0;
			echo '<tr><th>id</th><th>Table</th><th>Items</th><th>Price</th><th>Pax</th><th>Time</th><th>Action</th></tr>';
			echo '<tr><td>'.$date[$i-1]['id'].'</td><td>'.$date[$i-1]['num'].'</td><td>';
			$info = json_decode($date[$i-1]['info']);
			foreach($info as $name => $number){
				$s++;
				echo $s.'.'.$name.'&nbsp;&nbsp;&nbsp;'.$number.' Set(s)<br/>';
			}
			echo '</td><td>';
			echo $date[$i-1]['money'];
			echo '</td><td>'.$date[$i-1]['pnum'].'</td><td>'.$date[$i-1]['time'].'</td><td><a class="btn btn-danger" href="./func/del.php?tag=4&id='.$date[$i-1]['id'].'">Delete</a></td></tr>';
		}
		
		?>

    	
  </table>
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    	for($k=0;$k<$p;$k++){
    		echo '<li><a href="./history.php?act=4&pag='.$p.'">'.$p.'</a></li>';
    	}
    	?>
    
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
 
</div>
</div>



	


</body>
</html>
