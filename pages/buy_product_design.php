<?php
		require_once("../common_files/database/database.php");


if(empty($_COOKIE['_aid_']))
{
	header("Location:../pages/login.php");
	exit;
}
	require_once("../php/user_info.php");


			$db = new database();
			$db = $db->db();
			$product_id = base64_decode($_GET['id']);
			$query = $db->prepare("SELECT * FROM products WHERE id=? AND status='stock'");
			$query->bind_param('i',$product_id);
			$query->execute();
			$response = $query->get_result();
			if($response->num_rows !=0)
			{
				$data = $response->fetch_assoc();
				$title = $data['title'];
				$language = $data['language'];
				$price = $data['price'];
				$thumb = $data['thumb'];
				$seller_id = $data['seller_id'];
				$date = $data['upload_date'];
				$date = date_create($date);
				$date = $date->format('d-m-Y');
				$city = $data['city'];
				$page = $data['page'];
				$type = $data['type'];
				$description = $data['description'];
				if($type =="pbook")
				{
					$type = "Hard Copy";
				}
				else if($type =="ebook")
				{
					$type = "E Book";
				}
				$cart ="";
				$cart_info = $db->prepare("SELECT * FROM cart WHERE user_id=? AND product_id=?");
				$cart_info->bind_param('ii',$user_id,$product_id);
				$cart_info->execute();
				$cart_response = $cart_info->get_result();
				if($cart_response->num_rows !=0)
				{
					$cart = "fa fa-heart";
				}
				else
				{
					$cart = "fa fa-heart-o";
				}
				$query = $db->prepare("SELECT fullname,photo FROM users_info WHERE user_id=?");
				$query->bind_param('i',$seller_id);
				$query->execute();
				$response = $query->get_result();
				if($response)
				{
					$data = $response->fetch_assoc();
					$fullname = $data['fullname'];
					$saller_pic = $data['photo'];
				}
			}
			else
			{
				header("Location:../index.php");
				exit;
			}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../images/favicon.svg" type="image/svg" sizes="16x16">
		<title>Welcome To Smart Learning Point</title>
		<link rel="stylesheet" href="../common_files/css/bootstrap.min.css">
		<link rel="stylesheet" href="../common_files/css/animate.min.css">
		<link rel="stylesheet" href="../common_files/css/fontawesome.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="../common_files/js/jquery.js"></script>
		<script src="../common_files/js/popper.js"></script>
		<script src="../common_files/js/bootstrap.min.js"></script>
		<style type="text/css">
			*:focus{
				box-shadow: none !important;
			}
		</style>
	</head>
	<body>
		<?php
		require_once("../assist/nav.php");
		?>
		<div class="container pt-3">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item" ><a href="../index.php">Home</a></li>
				<li class="breadcrumb-item">Book</li>
				<li class="breadcrumb-item active"><?php echo $title;?></li>
			</ol>
			<div class="row my-4 mb-4">
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12 border p-3 d-flex justify-content-center">
							<img src="../images/products/<?php echo $thumb;?>" class="main-pic" width="330">
						</div>
					</div>
					
				</div>
				
				<div class="col-md-1 my-3"></div>
				<div class="col-md-6 mb-3">
					<div class="label">
						<p class="font-weight-bold text-secondary"> <i class="fa fa-tag"></i> <?php echo $type;?></p>
					</div>
					<div class="title mb-4">
						<p class="text-secondary m-0 mb-1 book-title text-uppercase" style="font-size: 25px;"><?php echo $title;?></p>
						<div class="m-0 text-secondary">
							<img src="../images/profile/<?php echo $saller_pic;?>" width="80" height="80" style="border-radius: 50%;border: 3px solid #fff" class="shadow-sm">  
							<span class="username text-secondary text-capitalize ml-2" style="font-size: 20px;"><?php echo $fullname?>  (Saller)</span></div>
					</div>
					<div class="discription mt-2">
						<?php echo $description;?>
					</div>
					<div class="features mt-4">
						<hr>
						<div class="row">
							<div class="col-6">
								<p class="page m-0">Page : </p>
							</div>
							<div class="col-6">
								<p class="page-count m-0"><?php echo $page;?></p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<p class="page m-0">Language : </p>
							</div>
							<div class="col-6">
								<p class="language m-0 text-capitalize"><?php echo $language;?></p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<p class="page m-0">City : </p>
							</div>
							<div class="col-6">
								<p class="city m-0 text-capitalize"><?php echo $city;?></p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<p class="page m-0">Price : </p>
							</div>
							<div class="col-6">
								<p class="price-count m-0"><?php echo "<i class='fa fa-rupee'></i> ".$price;?></p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<p class="page m-0">Uploaded Date : </p>
							</div>
							<div class="col-6">
								<p class="date m-0"><?php echo $date;?></p>
							</div>
						</div>
					</div>
					<div class="action mt-4">
						<br>
						<button class="btn chat-btn px-5 text-light font-weight-bold" style="background: #00D07E;font-size: 20px;" ><i class="fa fa-comments" style="font-size: 30px;"></i>&nbsp;&nbsp;&nbsp;CHAT</button>
						<button class="btn ml-2 text-secondary add-cart mt-2" product-id=
						"<?php echo base64_encode($product_id);?>" style="font-size: 20px;">
						<i class="<?php echo $cart;?> cart-icon" style="color: #00D07E;font-size:25px;"></i>&nbsp;Add to cart</button>
					</div>
				</div>
			</div>
			<p class="text-secondary" style="font-size: 20px;">More items you might like also</p>
			<div class="row">
				
				<div class="col-md-3 border d-flex justify-content-center mb-3">
					<img src="http://localhost/bookstore/shop/products/h513-min-500x600.jpg"></div>
				<div class="col-md-3 border d-flex justify-content-center mb-3">
					<img src="http://localhost/bookstore/shop/products/h513-min-500x600.jpg">
				</div>
				<div class="col-md-3 border d-flex justify-content-center mb-3">
					<img src="http://localhost/bookstore/shop/products/h513-min-500x600.jpg">
				</div>
				<div class="col-md-3 border d-flex justify-content-center mb-3">
					<img src="http://localhost/bookstore/shop/products/h513-min-500x600.jpg">
				</div>
			</div>
		</div>
		<div class="modal mt-5" id="chat-box" >
			<div class="modal-dialog">
				<div class="modal-content ">
					<div class="modal-body">
						<i class="fa fa-close close fa-lg m-0" data-dismiss="modal"></i>
						<div class="d-flex justify-content-between px-5 mt-3 pt-3">
						<div>
						<img src="../images/profile/<?php echo $pic;?>" style="width: 50px;height: 50px;border: 2px solid #fff;border-radius: 50%">
						</div>
						<div>
							 <i class="fa fa-long-arrow-right animate__animated animate__fadeOutRight animate__infinite	infinite mt-2" style="color: #00D07E;font-size: 40px;"></i>
						</div>
						<div>
						<img src="../images/profile/<?php echo $saller_pic;?>" style="width: 50px;height: 50px;border: 2px solid #fff;border-radius: 50%">
						</div>
						</div>
						<h4 class="text-secondary text-center mt-5">Write a massage to saller</h4>
						<form class="chat-form mt-4">
							<div class="form-group mb-3">
								<input type="text" name="massage" class="form-control massage" placeholder="write your massage here">
							</div>
							<div class="form-group mb-3 d-none">
								<input type="text" name="resever" class="form-control" value="<?php echo base64_encode($seller_id);?>">
							</div>
							<div class="form-group mb-3 d-none">
								<input type="text" name="product" class="form-control" value="<?php echo base64_encode($product_id);?>">
							</div>
							<div class="form-group mb-3 d-none">
								<input type="text" name="resever_name" class="form-control" value="<?php echo base64_encode($fullname);?>">
							</div>
							<div class="form-group mt-3">
								<button class="btn w-100 text-white mt-3 send-msg-btn" type="submit" style="background: #00D07E">SEND MASSAGE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		require_once("../assist/footer.php");
		?>
		<script>
			$(document).ready(function(){
				$(".add-cart").click(function(){
					var product_id = $(this).attr("product-id");
					$.ajax({
						type : "POST",
						url : "../php/add_to_cart.php",
						data : {
							id : product_id
						},
						success : function(response)
						{
							if(response.trim() == "success")
							{
								$(".cart-icon").removeClass("fa fa-heart-o");
								$(".cart-icon").addClass("fa fa-heart");
							}
							else
							{
								alert(response);
							}
						}
					});
				});

				$(".chat-btn").click(function(){
					$("#chat-box").modal('show');
				});
			});

			// massage code

			$(document).ready(function(){
				$(".chat-form").submit(function(e){
					e.preventDefault();
					var msg = $(".massage").val();
					$.ajax({
						type : "POST",
						url : "../php/first_chat.php",
						data : new FormData(this),
						processData : false,
						contentType : false,
						cache : false,
						success : function(response)
						{
							if(response.trim() == "success")
							{
								window.location = "chat_main.php";
							}
							else
							{
								$("#chat-box").modal('hide');
							}
						}
					});
					});
			});
		</script>
	</body>
</html>