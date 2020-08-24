<?php
require_once("../common_files/database/database.php");
require_once("user_info.php");

class main{
	private $db;
	private $massage;
	private $sender_name;
	private $resever_name;
	private $sender_id;
	private $resever_id;
	private $product;
	private $query;
	private $massage_id;
	private $response;
	private $product_design;
	function __construct($db,$user_id,$fullname){
		$this->db = $db;
		$this->massage = $_POST['massage'];
		$this->sender_id = $user_id;
		$this->sender_name = $fullname;
		$this->resever_name = base64_decode($_POST['resever_name']);
		$this->resever_id = base64_decode($_POST['resever']);
		$this->product = base64_decode($_POST['product']);
		
		if($this->sender_id != $this->resever_id)
		{
			$this->query = "SELECT * FROM chat WHERE sender_id='$this->sender_id' AND resever_id='$this->resever_id'";
			$this->response = $this->db->query($this->query);
			if($this->response->num_rows !=0)
			{
				$this->data = $this->response->fetch_assoc();
				$this->massage_id = $this->data['id'];
				$this->insert();
			}
			else
			{
				$this->query = "SELECT * FROM chat WHERE sender_id='$this->resever_id' AND resever_id='$this->sender_id'";
				$this->response = $this->db->query($this->query);
				if($this->response->num_rows !=0)
				{
					$this->data = $this->response->fetch_assoc();
					$this->massage_id = $this->data['id'];
					$this->insert();
				}
				else
				{
					$this->store();
				}
			}
		}
		else
		{
			echo "faild";
		}
		
	}

	function store(){
		$this->query = $this->db->prepare("INSERT INTO chat(sender_id,sender_name,resever_id,product_id,resever_name)VALUES(?,?,?,?,?)");
		$this->query->bind_param('isiis',$this->sender_id,$this->sender_name,$this->resever_id,$this->product,$this->resever_name);
		
		if($this->query->execute())
		{
			$this->massage_id = $this->db->insert_id;
			$this->insert();
		}
		else
		{
			echo "faild";
		}
	}

	function insert()
	{
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
				$this->query  = "SELECT * FROM products WHERE id='$this->product'";
				$this->response = $this->db->query($this->query);
				if($this->data = $this->response->fetch_assoc())
				{
					$this->p_title = $this->data['title'];
					$this->p_price = $this->data['price'];
					$this->p_thumb = $this->data['thumb'];
					$this->product_design = '<div class="col-md-12 text-center">
								<div class="main-box d-flex justify-content-center">
									<div class="content" style="border-radius: 10px">
										<div class="image-box">
											<img src="../images/products/'.$this->p_thumb.'" width="100%"  style="border-radius: 10px 10px 0px 0px">
										</div>
										<div class="text-box">
											<p class="text-center mt-3 text-secondary text-capitalize">'.$this->p_title.'</p>
											<p class="text-center text-secondary"><i class="fa fa-rupee"></i>'.$this->p_price.'</p>
											
										</div>
									</div>
								</div>
								</div>';

								$this->query = $this->db->prepare("INSERT INTO massage(sender_id,resever_id,massage,massage_id)VALUES(?,?,?,?)");
								$this->query->bind_param('iisi',$this->sender_id,$this->resever_id,$this->product_design,$this->massage_id);
								if($this->query->execute())
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
									echo "faild";;
								}

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



				