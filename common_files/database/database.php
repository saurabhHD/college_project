<?php

class database{
	private $db;
	function db(){
		$this->db = new mysqli("localhost","root","","bookstore");

		if(!$this->db->connect_error)
		{
			return $this->db;
		}
	}
}


?>