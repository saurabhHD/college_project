<?php
require_once("common_files/database/database.php");


if(!empty($_COOKIE['_aid_']))
{
	require_once("php/user_info.php");
	if($user_status == "pending")
	{
		header("Location:pages/activate_account.php");
		exit;
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.svg" type="image/svg" sizes="16x16">
	<title>Welcome To Smart Learning Point</title>
	<link rel="stylesheet" href="common_files/css/bootstrap.min.css">
	<link rel="stylesheet" href="common_files/css/animate.css">
	<link rel="stylesheet" href="common_files/css/fontawesome.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="common_files/js/jquery.js"></script>
	<script src="common_files/js/popper.js"></script>
	<script src="common_files/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			position: relative;
		}
		*:focus{
			box-shadow: none !important;

		}
		.product:hover{
			cursor: pointer;
		}
		.pro-btn:hover{
			background: #00D07E !important;
			color: #fff;
		}
		.pro-btn{
				border: 2px solid #00D07E;
				color: #00D07E;
		}
		.image-box:hover{
			opacity: 0.5;
		}
		.content{
			/*-webkit-box-shadow: -2px 4px 68px 1px rgba(0,208,126,0.46);
			-moz-box-shadow: -2px 4px 68px 1px rgba(0,208,126,0.46);*/
			box-shadow: -2px 4px 68px 1px #E6EDF5;
		}
		.main-box{
			margin-bottom: 30px;
		}
		.content:hover{
			box-shadow: -2px 4px 68px 1px #ccc !important;
		}
		.sell-mobile{
			position: fixed;
			left: 30%;
			right: 30%;
			bottom: 10px;
			z-index: 1000;
		}
		.sell-modile-btn{
			background: #00D07E;
			color: #fff;
			width: 100%;
			font-weight: bold;
			border-radius: 18px;
			box-shadow: 2px 3px 3px #00D07E;


		}
		.sell-modile-btn:hover{
			color: #fff;
		}

	</style>
</head>
<body>

<?php

require_once("assist/nav.php");

?>		
<?php require_once("assist/slider.php");?>
<div class="container">
<div class="row result mt-4 px-3">
	
</div>
</div>


<!-- start Massage Dailogbox-->
<div class="modal fade" id="alertmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header alert alert-danger text-center">
				Alert ! <i class="fa fa-close fa-times-circle close text-dark" data-dismiss="modal" style="font-size: 20px;"></i>
			</div>
			<div class="modal-body alert-box alert alert-warning text-center text-capitalize">
				
			</div>
		</div>
	</div>
</div>
<!-- end Massage Dailogbox-->
<!--Sell btn for mobile-->

<div class="sell-mobile d-block d-lg-none">
	<button class="btn sell-modile-btn"><a href="pages/sell.php" class="text-decoration-none sell-modile-btn"><i class="fa fa-camera"></i>   SELL</a></button>
</div>

<!--/sell btn for mobile-->
<?php
require_once("assist/footer.php");

?>
<script>

$(document).ready(function(){
	$.ajax({
		type : "POST",
		url : "php/load_product.php",
		success: function(response){
			var all_data = response.trim();
			all_data = JSON.parse(all_data);
			var i;
			for(i=0;i<all_data.length;i++)
			{
				$(".result").append(all_data[i]);
			}

			after_load();
		}
	});


});

function after_load()
{
	$(".pro-btn").each(function(){
				$(this).click(function(){
					var product_id = $(this).attr("product-id");
					window.location = "pages/buy_product_design.php?id="+product_id;
				});
			});
}
</script>
</body> 
</html>

