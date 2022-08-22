<?php
date_default_timezone_set('Asia/Kuala_Lumpur'); 
class getDate {

	
	public function getGet($name){
		if(isset($_GET[$name])){
			return $_GET[$name];
		}else{
			return 0;
		}
	}
	public function getPost($name){
		if(isset($_POST[$name])){
			return $_POST[$name];
		}else{
			return 0;
		}
	}
}

class login {
	
	protected function getConfig($url){
		include $url;
		$config = $datebase;
		return $config;
	}
	
	protected function conn($config){
		$conn = new mysqli($config['host'],$config['user'],$config['pass'],$config['db'],$config['port']);
		if ($conn->connect_errno){
			return 0;
		}else{
			$conn->set_charset('utf8');
			return $conn;
		}
	}

	public function userLogin($user,$pass){
		$pas = md5($pass);
		$use = addslashes($user);
		$sql = "SELECT * FROM foodadmin WHERE user = '$use' AND pass = '$pas'";
		$config = $this->getConfig("config.php");
		$conn = $this->conn($config);
		$res = $conn -> query($sql);
		
		if(!$res){
			echo 1;
			return 0;
		}else{
			
			$row = $res -> fetch_row();
			
			if($row[1]==$user){
				return $row;
			}else{
				
				return 0;
			}
		}
		$conn ->close(); 
	}
}

class Datebase{
		
	protected function getConfig($url){
		include $url;
		$config = $datebase;
		return $config;
	}
	
	protected function conn($config){
		$conn = new mysqli($config['host'],$config['user'],$config['pass'],$config['db'],$config['port']);
		if ($conn->connect_errno){
			return 0;
		}else{
			$conn->set_charset('utf8');
			return $conn;
		}
	}
	
	
	public function querySql($sql,$url){
		$conn = $this->conn($this->getConfig($url));
		$res = $conn -> query($sql);
		if($res){
			return $res;
		}else{
			return 0;
		}
		$conn -> close();
	}

	
	public function useDate($res){
		$date = $res -> fetch_all(MYSQLI_ASSOC);
		return $date;
	}
	
}
?>