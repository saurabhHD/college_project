<?php
require_once("../common_files/database/database.php");
require_once("user_info.php");

$product_id = base64_decode($_POST['product_id']);
$rp_query = "UPDATE products SET status='delete' WHERE id='$product_id' AND seller_id='$user_id'";
$rp_response = $db->query($rp_query);
if($rp_response)
{
	echo "success";
}
else
{
	echo "faild";
}

?>