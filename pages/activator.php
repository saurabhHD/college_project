
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../images/favicon.svg" type="image/svg" sizes="16x16">
		<title>My Cart</title>
		<link rel="stylesheet" href="../common_files/css/bootstrap.min.css">
		<link rel="stylesheet" href="../common_files/css/animate.css">
		<link rel="stylesheet" href="../common_files/css/fontawesome.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		 <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
		   rel="stylesheet"/>
		<script src="../common_files/js/jquery.js"></script>
		<script src="../common_files/js/popper.js"></script>
		<script src="../common_files/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
		require_once("../common_files/database/database.php");
		require_once("../php/user_info.php");
		require_once("../assist/nav.php");
		
		?>
		<div class="container my-4">
			<div class="col-md-12 bg-white shadow-lg py-3 px-4 d-flex flex-column" align="center">
				<?php
					$massage;
					$auth_id = $_GET['token'];
					$otp = $_GET['otp'];

					

					$db = new database();
					$db = $db->db();
					$auth_id = htmlspecialchars($auth_id,ENT_QUOTES);
					$auth_id = mysqli_real_escape_string($db, $auth_id);
					$check = $db->prepare("SELECT * FROM users_auth WHERE auth_id=? AND otp=?");
					$check->bind_param('ss',$auth_id,$otp);
					$check->execute();
					$response = $check->get_result();
					if($response->num_rows !=0)
					{
						$data = $response->fetch_assoc();
						$status = $data['status'];
						if($status =="pending")
						{
							$query = "UPDATE users_auth SET status='active' WHERE auth_id='$auth_id' AND otp='$otp'";
							$response = $db->query($query);
							if($response)
							{
								$massage = "success";

							}
							else
							{
								$massage = "verification faild";
							}
						}
						else
						{
							$massage = "already verifyed";

						}
					}
					else
					{
						$massage =  "faild";
					}

					?>
				<?php

				if($massage =="success")
				{
					echo '<h2 style="color: #00D07E">Thank You For Verifying Your Email &nbsp;</h2>
						<i class="fa fa-check-circle mt-1" style="color : #00D07E;font-size: 150px;"></i>
						<br>
						<div>
						<h3 class="text-secondary font-weight-bold">Now Your Account is activated</h3>
						</div>';

						
				}
				else if($massage =="already verifyed")
				{
					echo '<h2 style="color: #00D07E">Your Email Already Verifyed &nbsp;</h2>
						<i class="fa fa-check-circle mt-1 animate__rubberBand" style="color : #00D07E;font-size: 150px;"></i>
						<br>
						<div>
						<h3 class="text-secondary font-weight-bold">Your Account Already activated</h3>
						</div>';

				}
				else if($massage =="faild" || $massage == "verification faild")
				{
					echo '<h2 style="color: red">Something Went Wrong &nbsp;</h2>
						<i class="fa fa-times-circle mt-1" style="color : red;font-size: 150px;"></i>
						<br>
						<div>
						<h3 class="text-secondary font-weight-bold">Please Verify Your Email</h3>
						</div>';
				}

				?>
			<p class="text-secondary text-center">Redirecting...</p>
			</div>
		</div>
		<?php
		
		require_once("../assist/footer.php");
		?>
		<script>
			window.onload = function (){
				setInterval(function(){ window.location = "../index.php"; }, 3000);
			}
		</script>
	</body>
</html>


