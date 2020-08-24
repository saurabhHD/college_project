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
			.product:hover{
			cursor: pointer;
		}
		</style>
	</head>
	<body>
		<?php
		require_once("../assist/nav.php");
		?>
		<div class="container">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item" ><a href="../index.php">Home</a></li>
				<li class="breadcrumb-item active">My Cart</li>
			</ol>
			<div class="row result-box">
			<?php
				
				$db = new database();
				$db = $db->db();
				$query = $db->prepare("SELECT product_id FROM cart WHERE user_id=?");
				$query->bind_param('i', $user_id);
				$query->execute();
				$response = $query->get_result();
				if($response && $response->num_rows !=0)
				{
					while($data = $response->fetch_assoc()) 
					{
						$product_id = $data['product_id'];
						$pro_query = $db->prepare("SELECT * FROM products WHERE id=?");
						$pro_query->bind_param('i', $product_id);
						$pro_query->execute();
						$pro_response = $pro_query->get_result();
						if($pro_response->num_rows !=0)
						{
							$pro_data = $pro_response->fetch_assoc();
							$title = $pro_data['title'];
							$language = $pro_data['language'];
							$price = $pro_data['price'];
							$thumb = $pro_data['thumb'];
							$product_id = $pro_data['id'];
							$date = $pro_data['upload_date'];
							$city = $pro_data['city'];
							$status = $pro_data['status'];
							if($status!='stock')
							{
								$status = "This product not avlable";
							}
							else
							{
								$status = "";
							}
							$product = '
								<div class="col-md-3 mb-4 px-3">
									<div class="shadow-lg" style="border: 8px solid rgb(255, 255, 255);">
										<img src="../images/products/'.$thumb.'" class="position-relative w-100 product" product_id="'.base64_encode($product_id).'" alt="'.$title.'">
										<p class="text-capitalize ml-2 m-0 font-weight-bold text-secondary" style="font-size: 17px;">'.$title.'</p>
										<p class="ml-2 m-0 text-secondary" style="font-size: 20px;"><i class="fa fa-rupee"></i> '.$price.'/-</p>
										<p class="text-uppercase m-0 font-weight-bold text-center rounded-lg text-white p-1 position-absolute" style="font-size: 15px; background: rgb(0, 208, 126); top: 15px; left: 35px;">'.$language.'</p>
										
										<p class="text-capitalize ml-2 m-0 text-secondary" style="font-size: 17px;">City : '.$city.'</p>

										<i class="fa fa-trash position-absolute btn delete-cart-btn text-secondary" product_id="'.base64_encode($product_id).'" style="font-size: 35px; bottom: 15px; right: 35px;">
											
										</i>
										<p class="text-danger">'.$status.'</p>
									</div>
								</div>
								';

								echo  $product;


						}

						
					}
				}
				else
				{
					echo " <h2 class='text-center ml-5'>Your Cart Is Empty</h2>";
				}

			?>
			</div>
		</div>
		<?php
		require_once("../assist/footer.php");
		?>
		<script>
			test();
			delete_cart();
			function test(){
					$(".product").each(function(){
						$(this).click(function(){
							var product_id = $(this).attr("product_id");
							window.location = "../pages/buy_product_design.php?id="+product_id;
						});
					});
				}
				function delete_cart(){
					$(".delete-cart-btn").each(function(){
						$(this).click(function(){
							var cart_btn = this;
							var product_id = $(this).attr("product_id");

							// ajax request to add item in cart table

							$.ajax({
								type : "POST",
								url : "../php/delete_cart.php",
								data : {
									id : product_id.trim()
								},
								success : function(response){
									if(response.trim() == "success")
									{
										var div = cart_btn.parentElement.parentElement;
										$(div).remove();
									}
									else
									{
										$(".alert-box").html(response.trim());
										$('#alertmodal').modal('show');
									}
								}
							});


						});
					});
				}
		</script>
	</body>
</html>