<?php

class main{
	private $product_id;
	function __construct()
	{
		require_once("../common_files/database/database.php");
		require_once("user_info.php");
		$this->product_id = base64_decode($_POST['id']);
		new remove($this->product_id,$db,$user_id);
	}
}


class remove{
	private $db;
	private $product_id;
	private $user_id;
	private $query;
	function __construct($id,$db,$user_id)
	{
		
		$this->db = $db;
		$this->product_id = $id;
		$this->user_id = $user_id;
		$this->query = $this->db->prepare("DELETE FROM cart WHERE user_id=? AND product_id=?");
		$this->query->bind_param('ii',$this->user_id,$this->product_id);
		$this->query->execute();
		
		if($this->query)
		{
			
			echo "success";
		}
		else
		{
				
			echo "This Product already deleted";
		}

	}
}

new main();

?>