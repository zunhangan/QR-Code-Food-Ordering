<?php
header("Content-Type: text/html;charset=utf-8");
	include './admin/func/function.php';
	$getdate = new getDate();
	$table = $getdate -> getGet('table');
	$num = $getdate -> getGet('num');
	$id = $getdate -> getGet('id');
	if(!$table&&!$num){
		
	}
	


$datebase = new Datebase(); 
$sql = "SELECT * FROM foodmenu";
$sql2 = "SELECT * FROM foodtype";
$sql3 = "SELECT * FROM shop where id ='1'";
$cdres = $datebase -> querySql($sql,"./admin/func/config.php");
$cddate = $datebase -> useDate($cdres);
$foodtyperes = $datebase -> querySql($sql2,"./admin/func/config.php");
$foodtypedate = $datebase -> useDate($foodtyperes);
$dpres = $datebase -> querySql($sql3,"./admin/func/config.php");
$dpdate = $dpres -> fetch_row();
//var_dump($date);
$cdnum = count($cddate);
$foodtypenum = count($foodtypedate);

$push = [];
for($i=0;$i<$cdnum;$i++){
	if ($cddate[$i]['push']==1){
		$l = array_push($push,$cddate[$i]);
	}
}

	
	
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Southern Bistro</title>
    <script src="js/mui.min.js"></script>
    <script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8">
      	mui.init();
    </script>
</head>
<style type="text/css">
	::-webkit-scrollbar{
display:none;
}
.imgbox{
	text-align: center;	
}
.textbox{
	text-align: center;
}
.infobox{
	text-align: center; 
	margin-top: 20px;

}
.push{
	padding-top: 10px; 
	padding-left: 15px;
}
        .slide-box{ 
            margin-top: 10px;
            display: -webkit-box;
            overflow-x: overlay;
            -webkit-overflow-scrolling:touch;
        }
        .slide-item{
            width: 200px;
            height: 250px;
            margin-right: 30px;
			
        }
        .wimg{
        	height: 120px;
        }
        .wtext{
        	color: #000000;
        	
        	font-size: 18px;
        	font-weight: 650;
        	margin-top: 5px;
        }
        #money{
        	color: black;
        	font-size: 18px;
        	margin-left: 0px;
        }
        .plus{
        	color: #FAFAFA;
        	background-color: #000000;
        	float: right;
        	border-radius:12px ;
        	margin-right: 25px;
        } 
        .minus{
        	color: #FAFAFA;
        	background-color: #000000;
        	float: left;
        	border-radius:12px ;
        	margin-left: 25px;
        }
		.plus1{
        	color: #FAFAFA;
        	background-color: #000000;
        	float: right;
        	border-radius:12px ;
        	margin-left: 10px;
        	margin-top: 4px;
        } 
        .minus1{
        	color: #FAFAFA;
        	background-color: #000000;
        	float: right;
        	border-radius:12px ;
        	margin-right: 10px;
        	margin-top: 4px;
        }
        .wimg2{
        	
        	text-align: center;
        }
        .iinfo{
        	display:inline ;
        	text-align: center;
        	margin-top: 10px;
        }

        .main{ /*Foodtype list*/
        	display: flex;
        	flex-flow: row; 
       
        }
        .left{
        	width: 80px;
        	height: 100%;
        	background-color: #DDDDDD;
        }
        .right{ /*Foodlists*/
        	flex: auto;
        	width: 100%;
        	height: 400px;
        	margin-left: 5px;
        	overflow-x: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling:touch;
        }
        .itext2{
        	font-size: 12px;
        }
        .pm{
        	display: inline;
        }
</style>

<body>
	<div class="mui-content">
	    <header class="mui-bar mui-bar-nav" style="background-color: #000000;">
	        <h1 class="mui-title" style="color: white;"><?php echo $dpdate[1];?></h1>
	    </header>
	    <div style="height: 60px;"></div>
	<div class="topbox">
		<div class="imgbox">
			<img style="width: 80px; height: 80px;border-radius: 40px;" src="<?php echo $dpdate[2];?>"/>
		</div>
		<div class="textbox">
			<h3 style="font-family: 'Arial';color: #555555;font-size: larger;">Table No.：<?php echo $table; ?></h3>
		</div>
		<div class="infobox">
			<h6><?php echo $dpdate[3];?></h6>
		</div>
	</div>
	<hr style="width: 90%;">
	<div class="push">
		<h4 style="font-family: 'Arial';color: #555555;margin-left: 20px;">Our Signatures</h4>
		
		<div class="slide-box">
			
			<?php
			for($i=0;$i<$l;$i++){
				echo '<div class="slide-item"><div class="wimg2">';
				echo '<img style="width: 150px; height: 150px;" class="wimg" src="'.$push[$i]['pic'].'"/></div><div class="iinfo"><h5 id = "pname'.$push[$i]['id'].'" class="wtext">'.$push[$i]['name'].'</h5>';
				echo '<h5 id="money">RM<span id="pmoney'.$push[$i]['id'].'">'.$push[$i]['money'].'</span>	</h5></div><div class="pm">';
				echo '<div onclick="minus(\'pnum'.$push[$i]['id'].'\',\'pname'.$push[$i]['id'].'\',\'pmoney'.$push[$i]['id'].'\')" class="mui-icon mui-icon-minus minus"></div>';
				echo '<h5 style="margin-left: 50px;float: left;" id="pnum'.$push[$i]['id'].'">0</h5>';
				echo '<div onclick="add(\'pnum'.$push[$i]['id'].'\',\'pname'.$push[$i]['id'].'\',\'pmoney'.$push[$i]['id'].'\')" class="mui-icon mui-icon-plus plus"></div>';
				echo '</div></div>';
				
			}	
		?>


	</div>
	</div>
	
	<div class="main" style="margin-top: 20px;">
		<div class="left">
		<ul class="mui-table-view" style="background-color: #DDDDDD;">
    		
    		<?php
    			for($k=0;$k<$foodtypenum;$k++){
    				echo '<a style="color:#222222" href = "#list'.$k.'"><li class="mui-table-view-cell itext2">'.$foodtypedate[$k]['name'].'</li></a>';
    			}
    			?>
		</ul>
		</div>
		
		<div class="right">
			
			<span class="itext2">
				Our Food
			</span>
			
			
			
			<?php
				
				for($k=0;$k<$foodtypenum;$k++){
    				echo '<ul id="list'.$k.'" class="mui-table-view">';
    				for($u=0;$u<$cdnum;$u++){
    					if($cddate[$u]['foodtype']==$foodtypedate[$k]['id']&&$cddate[$u]['push']==0){
    						echo '<li class="mui-table-view-cell mui-media">';
							echo '<span id="cdnum'.$cddate[$u]['id'].'" class="mui-badge mui-badge-danger">0</span>';
							//List Pic style="width: 80px; height: 80px;float:left;
							echo '<img class="mui-media-object mui-pull-left" src="'.$cddate[$u]['pic'].'">';
							//List name style="margin-left: 20px;float: left;
							echo '<div  class="mui-media-body"><span id="cdname'.$cddate[$u]['id'].'">'.$cddate[$u]['name'].'</span><br><span style="color:blue;">RM<span id="cdmoney'.$cddate[$u]['id'].'">'.$cddate[$u]['money'].'</span>'.'<p>'.$cddate[$u]['info'].'</p>';
							echo '</div>';
							echo '<div onclick="add1(\'cdnum'.$cddate[$u]['id'].'\',\'cdname'.$cddate[$u]['id'].'\',\'cdmoney'.$cddate[$u]['id'].'\')" class="mui-icon mui-icon-plus plus1"></div>';
							echo '<div onclick="minus1(\'cdnum'.$cddate[$u]['id'].'\',\'cdname'.$cddate[$u]['id'].'\',\'cdmoney'.$cddate[$u]['id'].'\')" class="mui-icon mui-icon-minus minus1"></div></li>';
    					}
					}
					echo '</ul><br/>';
				}
				
				?>

			
		</div>
	</div>
	<div style="height: 40px;"></div>
	
	 <nav class="mui-bar mui-bar-tab">
            <div class="mui-tab-item mui-active" hr='main.html'>
                <span id="hj" class="mui-tab-label" style="color: #000000;">Price：RM<span id="all">0.00</span></span>
            </div>
        
            <div onclick="tj()" class="mui-tab-item" style="background-color: #000000;color: white;">
                <span onclick="" class="mui-tab-label"><a style="color: white;" onclick="tj()">Check out</a></span>
            </div>
        </nav>
        
        <form style="display: none;" id="form" action="" method="post">
        	<input type="text" name="data" id="data" value="" />
        	<input type="submit" value=""/>
        </form>
	</div>
</body>
</html>

<script type="text/javascript">
	var num = 0;
	var tem = {};
	var money = 0;
	
	function add(oid,nid,mid){
		var o = document.getElementById(oid);
		num = Number(o.innerHTML);
		var o1 = document.getElementById(nid);
		var oname = o1.innerHTML;
		var o2 = document.getElementById(mid);
		var omoney = Number(o2.innerHTML);
		var o3 = document.getElementById("all");
		num = num+1;
		//alert(oname);
		tem[oname] = num;
		money = money+omoney;
		if (num >99){
			num = 99;
			money = money-omoney;
		}
		
			o.innerHTML = num;
			o3.innerHTML = money;
		//alert(JSON.stringify(tem));
	}
	function minus(oid,nid,mid){ 
		var o = document.getElementById(oid);
		num = Number(o.innerHTML);
		var o1 = document.getElementById(nid);
		var oname = o1.innerHTML;
		var o2 = document.getElementById(mid);
		var omoney = Number(o2.innerHTML);
		var o3 = document.getElementById("all");
		num = num-1;
		//alert(oname);
		money = money-omoney;
		tem[oname] = num;
		if (num <0){
			num = 0;
			money = money+omoney;
		}
			o.innerHTML = num;
			o3.innerHTML = money;
		//alert(JSON.stringify(tem));
	}
	function add1(oid,nid,mid){ 
		var o = document.getElementById(oid);
		num = Number(o.innerHTML);
		var o1 = document.getElementById(nid);
		var oname = o1.innerHTML;
		var o2 = document.getElementById(mid);
		var omoney = Number(o2.innerHTML);
		var o3 = document.getElementById("all");
		num = num+1;
		//alert(oname);
		money = money+omoney;
		tem[oname] = num;
		
		if (num >99){
			num = 99;
			money = money-omoney;
		}
		o.innerHTML = num;
		o3.innerHTML = money;
		//alert(JSON.stringify(tem));
	}
	function minus1(oid,nid,mid){ 
		var o = document.getElementById(oid);
		num = Number(o.innerHTML);
		var o1 = document.getElementById(nid);
		var oname = o1.innerHTML;
		var o2 = document.getElementById(mid);
		var omoney = Number(o2.innerHTML);
		var o3 = document.getElementById("all");
		num = num-1;
		//alert(oname);
		money = money-omoney;
		tem[oname] = num;
		
		if (num <0){
			num = 0;
			money = money+omoney;
		}
		o.innerHTML = num;
		o3.innerHTML = money;
		
		//alert(JSON.stringify(tem));

	}
	
	function tj(){
		if(money==0){
			alert('Please order to proceed!');
			return 0;
		}
		var a = document.getElementById("form");
		a.action = "./checkout.php?id=<?php echo $id; ?>&num=<?php echo $num; ?>&table=<?php echo $table; ?>&money="+ String(money);
		var b = document.getElementById("data");
		b.value = JSON.stringify(tem);
		a.submit();
	}
	
</script>var