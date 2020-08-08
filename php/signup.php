<?php

class main{
	private $db;
	private $fullname;
	private $username;
	private $password;
	private $term;
	private $city;
	private $table_status;
	private $query;
	function __construct()
	{
		require_once("../common_files/database/database.php");
		$this->db = new database();
		$this->db = $this->db->db();
		$this->fullname = trim($_POST['fullname']);
		$this->fullname = htmlspecialchars($this->fullname,ENT_QUOTES);
		$this->fullname = mysqli_real_escape_string($this->db,$this->fullname);
		$this->username = trim($_POST['email']);
		$this->username = htmlspecialchars($this->username,ENT_QUOTES);
		$this->username = mysqli_real_escape_string($this->db,$this->username);
		$this->city = trim($_POST['city']);
		$this->city = htmlspecialchars($this->city,ENT_QUOTES);
		$this->city = mysqli_real_escape_string($this->db,$this->city);
		$this->password = md5($_POST['password']);
		$this->term = trim($_POST['term']);

		$this->table_status = new check_table($this->db);
		if($this->table_status)
		{
			new check_user($this->db,$this->username,$this->password,$this->fullname,$this->city);
			
		}
		else
		{
			echo "faild";
		}
		
	}
}


class check_table{
		private $db;
		private $query;
		private $response;
		function __construct($db)
		{
			$this->db = $db;
			$this->query = "SELECT * FROM users";
			$this->response = $this->db->query($this->query);
			if($this->response)
			{
				return true;
			}
			else
			{
				require_once("create_table.php");
				$this->response = new create_table($this->db);
				return $this->response;
			}

		}
}




class check_user{
	private $db;
	private $username;
	private $query;
	private $response;
	private $password;
	private $fullname;
	private $city;
	function __construct($db,$username,$password,$fullname,$city)
	{
		$this->db = $db;
		$this->fullname = $fullname;
		$this->username = $username;
		$this->password = $password;
		$this->city = $city;
		$this->query = $this->db->prepare("SELECT * FROM users WHERE username=?");
		$this->query->bind_param('s',$this->username);
		$this->query->execute();
		$this->response = $this->query->get_result();
		if($this->response->num_rows ==0)
		{
			new store_data($this->db,$this->username,$this->password,$this->fullname,$this->city);
		}
		else
		{
			echo "user already registerd";
		}
	}
}

class store_data{
	private $db;
	private $username;
	private $password;
	private $city;
	private $user_id;
	private $fullname;
	private $auth_id;
	private $otp;
	private $pass;
 function __construct($db,$username,$password,$fullname,$city)
 {
 	$this->db = $db;
 	$this->fullname = $fullname;
 	$this->username = $username;
 	$this->password  = $password;
 	$this->city = $city;
	$this->query = $this->db->prepare("INSERT INTO users(username,password)VALUES(?,?)");
	$this->query->bind_param('ss',$this->username,$this->password);
	$this->query->execute();
	if($this->query)
	{
		$this->user_id = $this->db->insert_id;
		$this->query = $this->db->prepare("INSERT INTO users_info(email,user_id,fullname,city,address)VALUES(?,?,?,?,?)");
		$this->query->bind_param('sisss',$this->username,$this->user_id,$this->fullname,$this->city,$this->city);
		$this->query->execute();
		if($this->query)
		{
			$this->auth_id = md5($this->username);
			$this->otp = rand(974933,2003);
			$this->otp = md5($this->otp);
			$this->pass = rand(439393,4994);
			$this->pass = md5($this->pass);
			$this->query = $this->db->prepare("INSERT INTO users_auth(auth_id,auth_password,otp,user_id)VALUES(?,?,?,?)");
			$this->query->bind_param('sssi',$this->auth_id,$this->pass,$this->otp,$this->user_id);
			$this->query->execute();
			if($this->query)
			{
				$this->time = time()+(60*60*24*365);
				if(setcookie('_aid_',base64_encode($this->auth_id),$this->time,'/') != false)
				{
					if(setcookie('_ap_',base64_encode($this->pass),$this->time,'/') != false)
					{
						sleep(2);
						new sendotp($this->auth_id,$this->otp,$this->username);
					}
				}
				
			}
			
		}
	}
			
 }

}


class sendotp
{
	private $otp;
	private $email;
	private $auth_id;
	function __construct($auth_id,$otp,$email)
	{
 		$this->auth_id = $auth_id;
 		$this->email = $email;
 		$this->otp = $otp;
 		require_once("send_otp.php");
		new send_otp($this->otp,$this->auth_id,$this->email);
	}
}

new main();

?>