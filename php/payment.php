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
	$pro_id = $_SESSION['product_id'];
	$amount = $_SESSION['amount'];
	$title = $_SESSION['title'];
	require("instamojo/instamojo.php");

	$api = new Instamojo\Instamojo('test_0507b2cbfdb4f06c0110f783653', 'test_41ec165e7d142fa30f9a38834a9', 'https://test.instamojo.com/api/1.1/');

	try {
    	$response = $api->paymentRequestCreate(array(
        "purpose" => $title." book",
        "amount" => $amount,
        "send_email" => true,
        "buyer_name" => $fullname,
        "email" => $email,
        "phone" => $mobile,
        "redirect_url" => "http://localhost/college_project/pages/payment_land.php"
	        ));
	   
	   $payment_url = $response['longurl'];
	   header("Location:$payment_url");
	}
	catch (Exception $e) {
	    print('Error: ' . $e->getMessage());
	}


?>
