<?php


$get_massage_info = "SELECT * FROM chat WHERE resever_id='$user_id' OR sender_id='$user_id'";
$massage_response = $db->query($get_massage_info);
if($massage_response)
{
	while($massage_data = $massage_response->fetch_assoc())
	{
		$sender_name = $massage_data['sender_name'];
		$sender_id = $massage_data['sender_id'];
		if($sender_id == $user_id)
		{
			$sender_name = $massage_data['resever_name'];
			$sender_id = $massage_data['resever_id'];
			$massage_id = $massage_data['id'];
			$query = "SELECT * FROM users_info WHERE user_id='$sender_id'";
			$response  = $db->query($query);
			if($response)
			{
			$data = $response->fetch_assoc();
			$sender_pic = $data['photo'];
			$query = "SELECT COUNT(id) AS total FROM massage WHERE resever_id='$user_id' AND sender_id='$sender_id' AND status='unread'";
			$response = $db->query($query);
			if($response)
			{
				$data = $response->fetch_assoc();
				$unread_massage_count =  $data['total'];

				if($unread_massage_count >0)
				{
					$unread_massage_count = '<div class="unread-count-box mt-2 mx-auto">
							<p class="unread-count">'.$unread_massage_count.'</p>
							</div>';
				}
				else
				{
					$unread_massage_count = "";
				}

				$query = "SELECT massage FROM massage WHERE resever_id='$user_id' AND sender_id='$sender_id' ORDER BY id DESC LIMIT 1";
				if($response = $db->query($query))
				{

					$last_massage = $response->fetch_assoc();
					$last_massage = $last_massage['massage'];
					echo '<div class="row chat-thumb shadow-sm pt-2 mb-3 rounded-lg" sender="'.base64_encode($sender_id).'" sender-pic="'.$sender_pic.'" name="'.$sender_name.'" massage="'.base64_encode($massage_id).'">
						<div class="col-2">
							<img src="../images/profile/'.$sender_pic.'" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">'.$sender_name.'</h5>
								<p class="last-massage">'.$last_massage.'</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center d-none">1 min</p>
							'.$unread_massage_count.'
							
						</div>
					</div>';
				}
				

			}

			
		}
		}
		else
		{
		$massage_id = $massage_data['id'];
		$query = "SELECT * FROM users_info WHERE user_id='$sender_id'";
		$response  = $db->query($query);
		if($response)
		{
			$data = $response->fetch_assoc();
			$sender_pic = $data['photo'];
			$query = "SELECT COUNT(id) AS total FROM massage WHERE resever_id='$user_id' AND sender_id='$sender_id' AND status='unread'";
			$response = $db->query($query);
			if($response)
			{
				$data = $response->fetch_assoc();
				$unread_massage_count =  $data['total'];

				if($unread_massage_count >0)
				{
					$unread_massage_count = '<div class="unread-count-box mt-2 mx-auto">
							<p class="unread-count">'.$unread_massage_count.'</p>
							</div>';
				}
				else
				{
					$unread_massage_count = "";
				}

				$query = "SELECT massage FROM massage WHERE resever_id='$user_id' AND sender_id='$sender_id' ORDER BY id DESC LIMIT 1";
				if($response = $db->query($query))
				{

					$last_massage = $response->fetch_assoc();
					$last_massage = $last_massage['massage'];
					echo '<div class="row chat-thumb shadow-sm pt-2 mb-3 rounded-lg" sender="'.base64_encode($sender_id).'" sender-pic="'.$sender_pic.'" name="'.$sender_name.'" massage="'.base64_encode($massage_id).'">
						<div class="col-2">
							<img src="../images/profile/'.$sender_pic.'" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">'.$sender_name.'</h5>
								<p class="last-massage">'.$last_massage.'</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center d-none">1 min</p>
							'.$unread_massage_count.'
							
						</div>
					</div>';
				}
				

			}

			
		}
	}
	}
}



?>