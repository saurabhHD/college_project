<?php
require_once("../common_files/database/database.php");
require_once("user_info.php");
date_default_timezone_set("Asia/Calcutta");
$resever_id = base64_decode($_POST['resever_id']);
$massage = $_POST['massage'];
$massage_id = base64_decode($_POST['massage_id']);
$query = "INSERT INTO massage(sender_id,resever_id,massage,massage_id)VALUES('$user_id','$resever_id','$massage','$massage_id')";
if($db->query($query))
{
	echo '<div class="me p-2 shadow-sm alert alert-success float-right w-75 mb-3 border-0">
						<div class="float-left">
							<small class="text-left alert-success rounded-0">
							'.$massage.'
							</small>
						</div>
						<div class="float-right ml-2">
							<small>'.date('h:i A').'</small>
						</div>
					</div>';
}
else
{
	echo "faild";
}
?>