<?php

class main{
	private $db;
	private $query;
	private $response;
	private $data;
	private $all_data = [];
	function __construct(){
		require_once("../common_files/database/database.php");
		$this->db = new database();
		$this->db = $this->db->db();
		$this->query = "SELECT * FROM products WHERE status='stock' ORDER BY rand()";
		$this->response = $this->db->query($this->query);
		while ($this->data = $this->response->fetch_assoc()) 
		{
			$this->massage = '<div class="col-md-3">
			<div class="main-box d-flex justify-content-center">
				<div class="content" style="border-radius: 15px">
					<div class="image-box">
						<img src="images/products/'.$this->data['thumb'].'" width="250" style="border-radius: 15px 15px 0px 0px">
					</div>
					<div class="text-box">
						<h4 class="text-center mt-3 text-secondary text-capitalize">'.$this->data['title'].'</h4>
						<p class="text-center text-secondary"><i class="fa fa-rupee"></i> '.$this->data['price'].'</p>
						<div class="text-center my-3">
						<button class="btn font-weight-bold pro-btn rounded-lg" product-id="'.base64_encode($this->data['id']).'">Explore More</button>
						</div>
					</div>
				</div>
			</div>
		</div>';
			array_push($this->all_data, $this->massage);
		}
		echo json_encode($this->all_data);

	}
}

new main();


?>