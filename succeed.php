<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
header("Content-Type: text/html;charset=utf-8");
	include './admin/func/function.php';
	$getdate = new getDate();
	$id = $getdate -> getGet("id");
	$act = $getdate -> getGet("act");
	if(!$act){
		$dis = "display:none;";
	}
	
	$datebase = new Datebase();
	$sql = "SELECT * FROM foodorder where id='$id'";
	$sql1 = "SELECT * FROM shopqr where id=1";
	$res = $datebase -> querySql($sql,"./admin/func/config.php");
	$date = $datebase -> useDate($res);
	$res1 = $datebase -> querySql($sql1,"./admin/func/config.php");
	$data = $res1 -> fetch_row();
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
	.color{
		background-color: #000000;
		color: white;
	}
	        .table {
                border: 1px solid #cad9ea;
                color: #666;
                margin: auto;
            }

            .table th {
                background-repeat: repeat-x;
                height: 60px;
            }

            .table td,
            .table th {
                border: 1px solid #cad9ea;
                padding: 0 1em 0;
                height: 40px;
            }

            .table tr.alter {
                background-color: #000000;
            }
            #money{color: red;}
</style>
<body style="text-align: center;margin: auto;">
	<div class="mui-content">
		<div style="text-align: center; margin-top: 10%;">
			 <img src="img/succeed.png"/>
			 <h4>Order Placed!</h4>
		</div>
	   <div style="text-align: center;"> 
        <table width="80%" class="table" id="tablevalue">
            <tr><th width=80%>Items</th><th width=20%>Quantity</th></tr>
                
                <?php
                	$info = json_decode($date[0]['info']);
                	foreach($info as $name => $number){
					echo '<tr><td>'.$name.'</td><td>'.$number.'</td></tr>';
					}
                	
                	?>
        </table>
        <p style="margin-top: 20px;">Pax: <?php echo $date[0]['pnum']; ?>Pax</p>
        <img width="200px" height="200px" src="<?php echo $data[1]; ?>"/>
    	<h5>Scan the QR code to Pay <span id="money">
    		RM<?php echo $date[0]['money']; ?>
    	</span></h5>
	  
	  <div style="height: 60px;">
	  	
	  </div>
	 <button onclick="tz();" type="button" class="mui-btn  mui-btn-block color">Add more Order</button>
	   </div>

</body>

<script type="text/javascript">
	function tz(){
		window.location.href="./order.php?id=<?php echo $date[0]['id']; ?>&table=<?php echo $date[0]['num']; ?>&num=<?php echo $date[0]['pnum']; ?>";
	}
</script>