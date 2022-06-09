<?php

class database{
	private $db;
	function db(){
		$this->db = new mysqli("sql.freedb.tech","freedb_saurabh","!8tC?MG@sNPm6xG","freedb_college_project");

		if(!$this->db->connect_error)
		{
			return $this->db;
		}
	}
}


?>
