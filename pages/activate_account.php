<?php
if(empty($_COOKIE['_aid_']))
{
	header("Location:../pages/login.php");
	exit;
}
require_once("../common_files/database/database.php");
require_once("../php/user_info.php");
if($user_status == "active")
	{
		header("Location:../");
	}
?>
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
		<script src="../common_files/js/jquery.js"></script>
		<script src="../common_files/js/popper.js"></script>
		<script src="../common_files/js/bootstrap.min.js"></script>
		<style type="text/css">
			*:focus{
				box-shadow: none !important;
			}
			.resend-btn:hover{
				background: #00D07E;
				color: white !important;
			}
		</style>
	</head>
	<body>
		<?php
		require_once("../assist/nav.php");
		?>
		<div class="container my-4 shadow-lg py-4" align="center">
			<h2 class="text-capitalize" style="color: #00D07E"><i>Thank you for signup with us</i></h2>
			<p class="text-danger">Please Verify Your Email Check Your <b>Inbox</b> or <b>Spam Folder</b></p>
			<label for="email">Your email address is</label>
			<p class="text-secondary font-weight-bold" id="email"><?php echo $email;?></p>
			<button class="btn resend-btn" style="border : 1px solid #00D07E;color : #00D07E"><i class="fa fa-send"></i> RESEND EMAIL</button>
		</div>
		<?php
		require_once("../assist/footer.php");
		?>

		<script>
			$(document).ready(function(){
				$(".resend-btn").click(function(){
					$.ajax({
					type : "POST",
					url : "../php/resend_otp.php",
					beforeSend : function()
					{
						$(".resend-btn").attr("disabled","desabled");
						$(".resend-btn").html("Processing...");
					},
					success : function(response)
					{
						$(".resend-btn").html('<i class="fa fa-send"></i> RESEND EMAIL');
						$(".resend-btn").removeAttr("disabled");
						alert(response);
					}
				});
				});
			});
		</script>
	</body>
</html>