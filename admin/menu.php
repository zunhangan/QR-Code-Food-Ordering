<?php
include './func/function.php';
include './func/verify.php';		

$datebase = new Datebase();
$sql = "SELECT * FROM foodmenu";
$sql1 = "SELECT * FROM foodtype";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
$res1 = $datebase -> querySql($sql1,"./func/config.php");
$foodtype = $datebase -> useDate($res1);
//var_dump($date);
$allorder = count($date);
$foodtypen = count($foodtype);
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

	<title>Manage Menu</title>
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
					Manage Menu
				</h1>
				<p>
					You can Add menu items, Delete menu items here.  
				</p>

			</div>
		</div>
	</div>


<!--
	数据统计面板
-->

<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">Manage Menu</div> 
 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">Add Item</div>
  <div class="panel-body">
    
<form id="cd" enctype="multipart/form-data" action="./func/add.php?tag=2" method="post"  class="container container-small">
    <div class="form-group">
        <lable>Name: </lable>
        <input name="name" id="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>Details: </lable>
        <input name="info" id="info" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>Price: </lable>
        <input name="money" id="money" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>Photo: </lable>
        <input name="file" type="file" formenctype="multipart/form-data" class="form-control">
    <lable>Maximum 100KB of JPG/PNG.</lable>
    </div>
    <lable>Recommended?: </lable>
   <select name="push" form="cd" id="push" class="form-control">
  <option value="0">No</option>
  <option value="1">Yes</option>
</select>
    <lable>Food Categories: </lable>
   <select name="foodtype" id="foodtype" form="cd" class="form-control">
  <?php
  	for($u=0;$u<$foodtypen;$u++){
  		echo '<option value="'.$foodtype[$u]['id'].'">'.$foodtype[$u]['name'].'</option>';
  	}
  	
  	?>

</select>
<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="Save Changes"/>
</form>

  </div>
</div>

 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">Items Listed</div>
  <div class="panel-body">
    <table class="table">
    	<tr><th>id</th><th>Food Category</th><th>Name</th><th>Pic</th><th>Price </th><th>Details</th><th>Recommended</th><th>Action</th></tr>
    	
    	<?php
    		for($i=0;$i<$allorder;$i++){
    			if($date[$i]['push']==1){
    				$push = "Yes";
    			}else{
    				$push = "No";
    			}
    			echo '<tr><td>'.$date[$i]['id'].'</td><td>'.$foodtype[$date[$i]['foodtype']-1]['name'].'</td><td>'.$date[$i]['name'].'</td><td>';
				echo '<img width="60px" height="60px" src="../'.$date[$i]['pic'].'"'.$date[$i]['pic'].'"/>';
				echo '</td><td>'.$date[$i]['money'].'</td>';
				echo '</td><td>'.$date[$i]['info'].'</td><td>'.$push.'</td><td><a class="btn btn-danger" href="./func/del.php?tag=5&id='.$date[$i]['id'].'">Delete</a></td></tr>';
    		}
    		
    	?>
    	
    	
    		
    	
  </table>
  </div>
</div>
  
 
</div>
</div>



	


</body>
</html>
