<?php
include './func/function.php';	
include './func/verify.php';	

$datebase = new Datebase();
$sql = "SELECT * FROM foodtype";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
$allorder = count($date);
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
	
	<title>Food Category</title>
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
					Manage Food Category
				</h1>
				<p>
					You can Add or Delete Food Category here.
				</p>

			</div>
		</div>
	</div>




<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">Manage Categories</div> 
 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">Add Group</div>
  <div class="panel-body">
    
<form action="./func/add.php?tag=1" method="post" class="container container-small">
    <div class="form-group">
        <lable>Group Name: </lable>
        <input name="name" id="name" type="text" class="form-control">
    </div>
    <input class="btn btn-primary" type="submit" id="" name="" value="Add"/>
</form>

  </div>
</div>

 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">Category List</div>
  <div class="panel-body">
    <table class="table">
    	<tr><th>id</th><th>Group</th><th>Action</th></tr>
    	<?php
    		for($i=0;$i<$allorder;$i++){
    			echo '<tr><td>';
				echo $date[$i]['id'];
				echo '</td><td>';
				echo $date[$i]['name'];
				echo '</td><td width="20%"><a class="btn btn-danger" href="./func/del.php?tag=3&id='.$date[$i]['id'].'">Delete</a></td></tr>';
    		}
    		
    		?>
    	
  </table>
  </div>
</div>
  
 
</div>
</div>



	


</body>
</html>
