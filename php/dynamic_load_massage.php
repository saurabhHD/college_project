<?php
require_once("../common_files/database/database.php");
require_once("user_info.php");
$all_data = [];
$sender_id = base64_decode($_POST['sender_id']);
$massage_id = base64_decode($_POST['massage_id']);
$chat_id = base64_decode($_POST['chat_id']);
$query = "SELECT * FROM massage WHERE massage_id='$massage_id' ORDER BY id ASC";
$response = $db->query($query);
if($response)
{

	while($data = $response->fetch_assoc())
	{
		$massage = $data['massage'];
		$msg_sender_id = $data['sender_id'];
		$msg_resever_id = $data['resever_id'];
		$date = $data['send_date'];
		$date = date_create($date);
		$time = $date->format('h:i A');
		$date = $date->format('d-m-Y');
		$massage_num = $data['id'];
		if($massage_num > $chat_id)
		{

			if($user_id == $msg_sender_id)
			{
				$box = '<div class="me p-2 shadow-sm alert alert-success raju float-right w-75 mb-3 border-0" id="'.base64_encode($massage_num).'">
							<div class="float-left">
								<small class="text-left alert-success rounded-0">
								'.$massage.'
								</small>
							</div>
							<div class="float-right ml-2">
								<small>'.$time.'</small>
							</div>
						</div>';
						array_push($all_data, $box);
			}
			else
			{
				$box = '<div class="other p-3 shadow-sm float-left w-75 mb-3 raju" id="'.base64_encode($massage_num).'">
							<div class="float-left">
								<small class="text-left  text-secondary rounded-0">
								'.$massage.'
								</small>
							</div>
							<div class="float-right ml-2 text-secondary">
								<small>'.$time.'</small>
							</div>
						</div>';
					array_push($all_data, $box);
			}
		}	
	}
		echo json_encode($all_data);
		$query = "UPDATE massage SET status='read' WHERE resever_id='$user_id'";
		$db->query($query);
}

?>