<?php

class main{
	private $product_id;
	function __construct()
	{
		require_once("../common_files/database/database.php");
		require_once("user_info.php");
		$this->product_id = base64_decode($_POST['id']);
		new add($this->product_id,$db,$user_id);
	}
}


class add{
	private $db;
	private $product_id;
	private $query;
	private $user_id;
	function __construct($id,$db,$user_id)
	{

		$this->db = $db;
		$this->product_id = $id;
		$this->user_id = $user_id;
		$this->query = $this->db->prepare("SELECT * FROM cart WHERE user_id=? AND product_id=?");
		$this->query->bind_param('ii',$this->user_id,$this->product_id);
		$this->query->execute();
		$this->query = $this->query->get_result();
		if($this->query->num_rows !=0)
		{
			echo "This Product already in your cart";
		}
		else
		{
			$this->query = $this->db->prepare("INSERT INTO cart(user_id, product_id)VALUES(?,?)");
			$this->query->bind_param('ii',$this->user_id,$this->product_id);
			$this->query->execute();
			if($this->query->affected_rows != 0)
			{
				echo "success";
			}
			else
			{
				echo "Faild";
			}
		}

	}
}

new main();

?>