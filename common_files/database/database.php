<?php

class database{
	private $db;
	function db(){
		$this->db = new mysqli("college-project-do-user-11603524-0.b.db.ondigitalocean.com","25060","doadmin","AVNS_5HpL1Y6y4kgUgKdjbtW","defaultdb");

		if(!$this->db->connect_error)
		{
			return $this->db;
		}
	}
}


?>