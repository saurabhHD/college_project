<?php

class create_table{
	private $db;
	private $query;
	private $response;
	function __construct($db)
	{
		$this->db = $db;
		$this->query = "CREATE TABLE users(
		id INT(11) NOT NULL AUTO_INCREMENT,
		username VARCHAR(100),
		password VARCHAR(150),
		PRIMARY KEY(id)
		)";
		$this->response  = $this->db->query($this->query);
		if($this->response)
		{
			$this->query = "CREATE TABLE users_auth(
			auth_id VARCHAR(100),
			auth_password VARCHAR(150),
			otp VARCHAR(100),
			status VARCHAR(10) DEFAULT 'pending',
			user_id INT(11),
			PRIMARY KEY(user_id)
			)";
			$this->response  = $this->db->query($this->query);
			if($this->response)
			{
				$this->query = "CREATE TABLE users_info(
				email VARCHAR(100),
				mobile VARCHAR(15),
				fullname VARCHAR(100),
				gender VARCHAR(6),
				photo VARCHAR(100) DEFAULT 'demo.jpg',
				course VARCHAR(150),
				college VARCHAR(100),
				board VARCHAR(150),
				city VARCHAR(100),
				dob DATE,
				address MEDIUMTEXT,
				reg_date DATETIME DEFAULT CURRENT_TIMESTAMP,
				user_id VARCHAR(11),
				PRIMARY KEY(user_id)
				)";
				$this->response  = $this->db->query($this->query);
				if($this->response)
				{
					$this->query = "CREATE TABLE products(
					id INT(11) NOT NULL AUTO_INCREMENT,
					type VARCHAR(20),
					title VARCHAR(250),
					language VARCHAR(20),
					price FLOAT(20),
					city VARCHAR(150),
					board VARCHAR(200),
					course VARCHAR(200),
					thumb VARCHAR(250),
					upload_date DATE DEFAULT CURRENT_DATE,
					status VARCHAR(10) DEFAULT 'stock',
					seller_id INT(11),
					pdf VARCHAR(250),
					page INT(11),
					description MEDIUMTEXT,
					PRIMARY KEY(id)
					)";
					$this->response = $this->db->query($this->query);
					if($this->response)
					{
						$this->query = "CREATE TABLE cart(
						id INT(11) NOT NULL AUTO_INCREMENT,
						user_id INT(11),
						product_id INT(11),
						PRIMARY KEY(id)
						)";
						$this->response = $this->db->query($this->query);
						if($this->response)
						{
							return true;
						}
					}
				}
			}
		}

	}
}


?>