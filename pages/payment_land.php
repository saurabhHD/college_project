<?php
if(empty($_COOKIE['_aid_']))
{
	header("Location:../pages/login.php");
	exit;
}

require_once("../common_files/database/database.php");
require_once("../php/user_info.php");

		if($user_status == "pending")
		{
			header("Location:activate_account.php");
			exit;
		}
session_start();
$payment_id = $_GET['payment_id'];
$payment_status = $_GET['payment_status'];
$payment_request_id = $_GET['payment_request_id'];
$pro_id = $_SESSION['product_id'];
$amount = $_SESSION['amount'];

if($payment_status == "Credit")
{
	$query = "CREATE TABLE IF NOT EXISTS purchase(
		id INT(11) NOT NULL AUTO_INCREMENT,
		product_id INT(11),
		purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
		price INT(11),
		payment_status VARCHAR(10),
		payment_id VARCHAR(100),
		buyer_id INT(11),
		PRIMARY KEY(id)
		)";
		if($db->query($query))
		{
			$query = "INSERT INTO purchase(product_id,price,payment_status,payment_id,buyer_id)VALUES('$pro_id','$amount','$payment_status','$payment_id','$user_id')";
			if($db->query($query))
			{
				session_destroy();
				header("Location:m_ebooks.php");
			}
		}
}


?>