
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../images/favicon.svg" type="image/svg" sizes="16x16">
		<title>Welcome To Smart Learning Point</title>
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
	</style>
	</head>
	<body>
		<?php
		require_once("../common_files/database/database.php");
		require_once("../php/user_info.php");
		require_once("../assist/nav.php");
		$keyword = $_GET['search'];
		?>
		<div class="container my-4">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item" ><a href="../index.php">Home</a></li>
				<li class="breadcrumb-item">Search</li>
				<li class="breadcrumb-item active"><?php echo $keyword;?></li>
			</ol>
			<div class="row result">
				<!---design-->

				<?php
require_once("../common_files/database/database.php");
$db = new database();
$db = $db->db(); 

$keyword = htmlspecialchars($keyword, ENT_QUOTES);
$keyword = mysqli_real_escape_string($db, $keyword);
$keyword =  "%".$keyword."%";
$query = $db->prepare("SELECT * FROM products WHERE title LIKE ?");
$query->bind_param('s',$keyword);
$query->execute();
$response = $query->get_result();
if($response)
{
	if($response->num_rows !=0)
	{
		while ($data = $response->fetch_assoc()) 
		{
				$title = $data['title'];
				$language = $data['language'];
				$price = $data['price'];
				$thumb = $data['thumb'];
				$product_id = $data['id'];
				$date = $data['upload_date'];
				$city = $data['city'];

				$product = '
				<div class="col-md-3">
			<div class="main-box d-flex justify-content-center">
				<div class="content" style="border-radius: 15px">
					<div class="image-box">
						<img src="../images/products/'.$thumb.'" width="250" style="border-radius: 15px 15px 0px 0px">
					</div>
					<div class="text-box">
						<h4 class="text-center mt-3 text-secondary text-capitalize">'.$title.'</h4>
						<p class="text-center text-secondary"><i class="fa fa-rupee"></i> '.$price.'</p>
						<div class="text-center my-3">
						<button class="btn font-weight-bold pro-btn rounded-lg" product-id="'.base64_encode($product_id).'">Explore More</button>
						</div>
					</div>
				</div>
			</div>
		</div>
';

echo $product;
		}
	}
	else
	{
		echo "Product Not found";
	}
}


?>

				<!-- design-->
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
		</div>
		<?php
		require_once("../assist/footer.php");
		?>
		<script>
			$(document).ready(function(){
				$(".pro-btn").each(function(){
					$(this).click(function(){
						var product_id = $(this).attr("product-id");
						window.location = "../pages/buy_product_design.php?id="+product_id;
					});
				});
			});
		</script>
	</body>
</html>