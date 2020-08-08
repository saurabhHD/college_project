<?php

class main{
	private $db;
	private $username;
	private $password;
	private $query;
	private $response;
	private $data;
	private $user_id;
	function __construct()
	{
		require_once("../common_files/database/database.php");
		$this->db = new database();
		$this->db = $this->db->db();
		$this->username = $_POST['log-email'];
		$this->username = htmlspecialchars($this->username, ENT_QUOTES);
		$this->username = mysqli_real_escape_string($this->db,$this->username);
		$this->password = md5($_POST['log-password']);
		$this->query = $this->db->prepare("SELECT * FROM users WHERE username=?");
		$this->query->bind_param('s',$this->username);
		$this->query->execute();
		$this->response = $this->query->get_result();
		if($this->response->num_rows !=0)
		{
			$this->query = $this->db->prepare("SELECT * FROM users WHERE username=? AND password=?");
			$this->query->bind_param('ss',$this->username,$this->password);
			$this->query->execute();
			$this->response = $this->query->get_result();
			if($this->response->num_rows !=0)
			{
				$this->data = $this->response->fetch_assoc();
				$this->user_id = $this->data['id'];

				$this->query = $this->db->prepare("SELECT * FROM users_auth WHERE user_id=?");
				$this->query->bind_param('i',$this->user_id);
				$this->query->execute();
				$this->response = $this->query->get_result();
				if($this->response->num_rows !=0)
				{
					$this->data = $this->response->fetch_assoc();
					$this->auth_id = base64_encode($this->data['auth_id']);
					$this->auth_pass = base64_encode($this->data['auth_password']);
					$this->status = $this->data['status'];
					$this->otp = $this->data['otp'];
					if($this->status == "active")
					{
						$this->time = time()+(60*60*24*365);
						setcookie('_aid_',$this->auth_id,$this->time,'/');
						setcookie('_ap_',$this->auth_pass,$this->time,'/');
						echo "success";
					}
					else
					{
						$this->time = time()+(60*60*24*365);
						setcookie('_aid_',$this->auth_id,$this->time,'/');
						setcookie('_ap_',$this->auth_pass,$this->time,'/');
						echo "pending";
					}
				}
				else
				{
					echo "something went wrong";
				}
			}
			else
			{
				echo "wrong password";
			}
		}
		else
		{
			echo "wrong emial";
		}
	}
}



new main();

?>