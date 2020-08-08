<?php
require_once("../common_files/database/database.php");
require_once("user_info.php");

class main{
	private $db;
	private $massage;
	private $sender_name;
	private $sender_id;
	private $resever_id;
	private $product;
	private $query;
	function __construct($db,$user_id,$fullname){
		$this->db = $db;
		$this->massage = $_POST['massage'];
		$this->sender_id = $user_id;
		$this->sender_name = $fullname;
		$this->resever_id = base64_decode($_POST['resever']);
		$this->product = base64_decode($_POST['product']);
		$this->store();
	}

	function store(){
		$this->query = $this->db->prepare("INSERT INTO chat(sender_id,sender_name,resever_id,product_id)VALUES(?,?,?,?)");
		$this->query->bind_param('isii',$this->sender_id,$this->sender_name,$this->resever_id,$this->product);
		
		if($this->query->execute())
		{
			$this->massage_id = $this->db->insert_id;
			$this->query = "CREATE TABLE IF NOT EXISTS massage(
			id INT(11) NOT NULL AUTO_INCREMENT,
			sender_id INT(11),
			resever_id INT(11),
			massage MEDIUMTEXT,
			status VARCHAR(10) DEFAULT 'unread',
			send_date DATETIME DEFAULT CURRENT_TIMESTAMP,
			reseve_date DATETIME,
			massage_id INT(11),
			PRIMARY KEY(id)
			)";
			
			$this->response = $this->db->query($this->query);
			if($this->response)
			{
				$this->query = $this->db->prepare("INSERT INTO massage(sender_id,resever_id,massage,massage_id)VALUES(?,?,?,?)");
				$this->query->bind_param('iisi',$this->sender_id,$this->resever_id,$this->massage,$this->massage_id);
				if($this->query->execute())
				{
					echo "success";
				}
				else
				{
					echo "faild";;
				}
			}
			else
			{
				echo "faild";
			}
		}
		else
		{
			echo "faild";
		}
	}
}

new main($db,$user_id,$fullname);
?>