<?php

class database{
	private $db;
	function db(){
		$this->db = new mysqli("156.67.222.85","u149648176_test","Test@123","u149648176_test");

		if(!$this->db->connect_error)
		{
			return $this->db;
		}
	}
}


?>