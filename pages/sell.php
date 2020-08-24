<?php
if(empty($_COOKIE['_aid_']))
{
	header("Location:login.php");
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
		</style>
	</head>
	<body>
		<?php
		require_once("../assist/nav.php");
		?>
		<div class="container my-4">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item" ><a href="../index.php">Home</a></li>
				<li class="breadcrumb-item active">Sell Book</li>
			</ol>
			<div class="row">
				<div class="col-md-12 shadow-sm p-3">
					<h2 align="center" class="text-secondray">SELL BOOK FORM</h2>
					<hr>
					<div class="form-group">
							<select  name="type" class="custom-select type" required>
								<option value="">Select Book type</option>
								<option value="ebook">Ebook (pdf)</option>
								<option value="pbook">Physical book (hard copy)</option>
							</select>
							<div class="invalid-feedback">
								Please select  book type physical book (paper book) or ebook (pdf)
							</div>
						</div>
					<form class="ebook-form was-validated d-none">
						
						<div class="form-group">
							<label for="#title">Title Of Book</label>
							<input type="text" name="title" class="form-control" id="title" required>
							<div class="invalid-feedback">
								Please enter your book title or name of book
							</div>
						</div>
						
						<div class="form-group">
							<label for="#price">Price <i class="fa fa-rupee"></i></label>
							<input type="number" name="price" class="form-control" id="price" required>
							<div class="invalid-feedback">
								Please enter amount witch you want to sell this book
							</div>
						</div>
						<div class="form-group">
							<select  name="language" class="custom-select" required>
								<option value="">Select Language</option>
								<option value="hindi">Hindi</option>
								<option value="english">English</option>
								<option value="other">Other</option>
							</select>
							<div class="invalid-feedback">
								Please select the language of book like hindi, english
							</div>
						</div>
						<div class="form-group">
							<label for="#pages">Pages</label>
							<input type="number" name="page" class="form-control" id="pages" required>
							<div class="invalid-feedback">
								Please enter number of pages of book 
							</div>
						</div>

						 <div class="custom-file">
						    <input type="file" class="custom-file-input" accept="image/*" name ="thumb" id="thumb" required>
						    <label class="custom-file-label" for="thumb">Choose front picture</label>
						    <div class="invalid-feedback">Upload here front or main picture of book</div>
						 </div>
						<div class="custom-file pdf-box mt-3">
						    <input type="file" class="custom-file-input pdf" accept="application/pdf" name ="pdf" id="pdf" required>
						    <label class="custom-file-label" for="pdf">Upload pdf</label>
						    <div class="invalid-feedback">Upload here your book (pdf)</div>
						 </div>
						 <div class="form-group">
						 	<label for="description">Description</label>
						 	<textarea class="form-control description" name="description" id="description" required rows="3"></textarea>
						 	<div class="invalid-feedback">Write somthing about this book</div>
						 </div>
						 <div class="form-group mt-3">
						 <button class="btn py-2 px-4 w-50 submit-btn" style="background: #00D07E;color: #fff;font-weight: bold;">SUBMIT</button>
						</div>
					</form>
					<form class="pbook-form was-validated d-none">
						
						<div class="form-group">
							<label for="#title">Title Of Book</label>
							<input type="text" name="title" class="form-control" id="title" required>
							<div class="invalid-feedback">
								Please enter your book title or name of book
							</div>
						</div>
						
						<div class="form-group">
							<label for="#price">Price <i class="fa fa-rupee"></i></label>
							<input type="number" name="price" class="form-control" id="price" required>
							<div class="invalid-feedback">
								Please enter amount witch you want to sell this book
							</div>
						</div>
						<div class="form-group">
							<select  name="language" class="custom-select" required>
								<option value="">Select Language</option>
								<option value="hindi">Hindi</option>
								<option value="english">English</option>
								<option value="other">Other</option>
							</select>
							<div class="invalid-feedback">
								Please select the language of book like hindi, english
							</div>
						</div>
						<div class="form-group">
							<label for="#pages">Pages</label>
							<input type="number" name="page" class="form-control" id="pages" required>
							<div class="invalid-feedback">
								Please enter number of pages of book 
							</div>
						</div>

						 <div class="custom-file">
						    <input type="file" class="custom-file-input" accept="image/*" name ="thumb" id="thumb" required>
						    <label class="custom-file-label" for="thumb">Choose front picture</label>
						    <div class="invalid-feedback">Upload here front or main picture of book</div>
						 </div>
						 <div class="form-group">
						 	<label for="description">Description</label>
						 	<textarea class="form-control description" name="description" id="description" required rows="3"></textarea>
						 	<div class="invalid-feedback">Write somthing about this book</div>
						 </div>
						 <div class="form-group mt-3">
						 <button class="btn py-2 px-4 w-50 submit-btn" style="background: #00D07E;color: #fff;font-weight: bold;">SUBMIT</button>
						</div>
					</form>
				</div>
			</div>
			<!--Alert box code-->
			<div class="modal alert-box">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<div class="massage">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
							
		</div>
		<?php
			require_once("../assist/footer.php");
		?>
	<script>
		$(document).ready(function(){
			$(".type").on("input",function(){
				if(this.value == "ebook")
				{
					$(".ebook-form").removeClass("d-none");
					$(".pbook-form").addClass("d-none");
						$(".ebook-form").submit(function(e){
						e.preventDefault();
						$.ajax({
							type : "POST",
							url : "../php/sell_ebook.php",
							data : new FormData(this),
							processData : false,
							contentType : false,
							cache : false,
							beforeSend : function()
							{
								$(".submit-btn").html("Processing...");
								$(".submit-btn").attr("disabled","disabled");
							},
							success : function(response)
							{
								$(".submit-btn").html("SUBMIT");
								$(".submit-btn").removeAttr("disabled");
								$(".ebook-form").trigger('reset');
								if(response.trim() == "success")
								{
									$(".massage").html('<i class="fa fa-close fa-times-circle close text-dark" data-dismiss="modal" style="font-size: 20px;"></i><p class="text-center"><span class="fa fa-stack fa-xl " style="margin-top: -5px;font-size: 50px;"><i class="fa fa-certificate fa-stack-2x fa-spin" style="color: #00D07E"></i>							    <i class="fa fa-check fa-stack-1x fa-inverse"></i>								</span>							</p>							<p class="text-center text-secondry">Thank You For Submit Your Book</p>');
									$(".alert-box").modal('show');
								}
								else
								{
									$(".massage").html('<i class="fa fa-close fa-times-circle close text-dark" data-dismiss="modal" style="font-size: 20px;"></i><p class="text-center"><span class="fa fa-stack fa-xl " style="margin-top: -5px;font-size: 50px;"><i class="fa fa-certificate fa-stack-2x fa-spin" style="color: red"></i>							    <i class="fa fa-close fa-stack-1x fa-inverse"></i>								</span>							</p>							<p class="text-center text-capitalize text-secondry">'+response.trim()+'</p>');
									$(".alert-box").modal('show');
								}
							}
						});
					});
				}
				else if(this.value == "pbook")
				{
					$(".pbook-form").removeClass("d-none");
					$(".ebook-form").addClass("d-none");
						$(".pbook-form").submit(function(e){
						e.preventDefault();
						$.ajax({
							type : "POST",
							url : "../php/sell_pbook.php",
							data : new FormData(this),
							processData : false,
							contentType : false,
							cache : false,
							beforeSend : function()
							{
								$(".submit-btn").html("Processing...");
								$(".submit-btn").attr("disabled","disabled");
							},
							success : function(response)
							{
								$(".pbook-form").trigger('reset');
								$(".submit-btn").html("SUBMIT");
								$(".submit-btn").removeAttr("disabled");
								if(response.trim() == "success")
								{
									$(".ebook-form").trigger('reset');
									$(".massage").html('<i class="fa fa-close fa-times-circle close text-dark" data-dismiss="modal" style="font-size: 20px;"></i><p class="text-center"><span class="fa fa-stack fa-xl " style="margin-top: -5px;font-size: 50px;"><i class="fa fa-certificate fa-stack-2x fa-spin" style="color: #00D07E"></i>							    <i class="fa fa-check fa-stack-1x fa-inverse"></i>								</span>							</p>							<p class="text-center text-secondry">Thank You For Submit Your Book</p>');
									$(".alert-box").modal('show');
								}
								else
								{
									$(".massage").html('<i class="fa fa-close fa-times-circle close text-dark" data-dismiss="modal" style="font-size: 20px;"></i><p class="text-center"><span class="fa fa-stack fa-xl " style="margin-top: -5px;font-size: 50px;"><i class="fa fa-certificate fa-stack-2x fa-spin" style="color: red"></i>							    <i class="fa fa-close fa-stack-1x fa-inverse"></i>								</span>							</p>							<p class="text-center text-capitalize text-secondry">'+response.trim()+'</p>');
									$(".alert-box").modal('show');
								}
							}
						});
					});
				}
			});
		});
	</script>
	</body>
</html>