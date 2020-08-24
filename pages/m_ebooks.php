<?php


if(empty($_COOKIE['_aid_']))
{
	header("Location:../pages/login.php");
	exit;
}


?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../images/favicon.svg" type="image/svg" sizes="16x16">
		<title>Cat</title>
		<link rel="stylesheet" href="../common_files/css/bootstrap.min.css">
		<link rel="stylesheet" href="../common_files/css/animate.css">
		<link rel="stylesheet" href="../common_files/css/fontawesome.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="../common_files/js/jquery.js"></script>
		<script src="../common_files/js/popper.js"></script>
		<script src="../common_files/js/bootstrap.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<style type="text/css">
		*:focus{
			box-shadow: none !important;

		}
		.product:hover{
			cursor: pointer;
		}
		.remove-btn:hover{
			background: #00D07E !important;
			color: #fff;
		}
		.remove-btn{
				border: 2px solid #00D07E;
				color: #00D07E;
		}
		.my-btn:hover{
			background: #00D07E !important;
			color: #fff;
		}
		.my-btn{
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
		</style>
	</head>
	<body>
		<?php
		require_once("../common_files/database/database.php");
		require_once("../php/user_info.php");
		if($user_status == "pending")
		{
			header("Location:activate_account.php");
			exit;
		}
		require_once("../assist/nav.php");
		?>
		<div class="container">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item" ><a href="../index.php">Home</a></li>
				<li class="breadcrumb-item active">Manage Ebooks</li>
			</ol>
			<div class="row">
				<?php
				 $query = "SELECT * FROM purchase WHERE buyer_id='$user_id' AND payment_status='Credit'";
				 if($response = $db->query($query))
				 {
				 	while($data = $response->fetch_assoc())
				 	{
				 		$pro_id = $data['product_id'];
				 		$mybook_query = "SELECT * FROM products WHERE id='$pro_id' AND status='stock'";
							$mybook_response = $db->query($mybook_query);
							if($mybook_response)
							{
									$mybook_data = $mybook_response->fetch_assoc();
									$book_title = $mybook_data['title'];
									$book_price = $mybook_data['price'];
									$book_thumb = $mybook_data['thumb'];
									$pdf = $mybook_data['pdf'];
									echo '<div class="col-md-3">
									<div class="main-box d-flex justify-content-center">
										<div class="content" style="border-radius: 15px">
											<div class="image-box">
												<img src="../images/products/'.$book_thumb.'" width="250" style="border-radius: 15px 15px 0px 0px">
											</div>
											<div class="text-box">
												<h4 class="text-center mt-3 text-secondary text-capitalize">'.$book_title.'</h4>
												<p class="text-center text-secondary"><i class="fa fa-rupee"></i> '.$book_price.'</p>
												<div class="text-center my-3">
												<a href="../ebook/'.$pdf.'">
												<button class="btn font-weight-bold remove-btn rounded-lg" product-id="'.base64_encode($mybook_data['id']).'">Download</button></a>
												</div>
											</div>
										</div>
									</div>
								</div>';
								

							}
				 	}
				 }
				?>
				
			</div>
			<div class="modal" id="remove-product-alert">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body alert alert-danger mb-0">
							<div>
								<p>Are you sure you want to delete this book from our website</p>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn yes-btn btn-danger w-25">Yes</button>
							<button class="btn no-btn w-25" style="background: #00D07E;color:#fff;">No</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		require_once("../assist/footer.php");
		?>
	</body>
</html>