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
$complete = 0;
if($email != "")
{
	$complete +=10;
}
if($mobile !="")
{
	$complete +=10;
}
if($fullname != "")
{
	$complete +=10;
}
if($gender !="")
{
	$complete +=10;
}if($city != "")
{
	$complete +=10;
}
if($college !="")
{
	$complete +=10;
}if($pic != "")
{
	$complete +=10;
}
if($dob !="")
{
	$complete +=10;
}if($course != "")
{
	$complete +=10;
}
if($board !="")
{
	$complete +=10;
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
		<div class="container my-4 p-4">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item" ><a href="../index.php">Home</a></li>
				<li class="breadcrumb-item active">Profile</li>
			</ol>
			<div class="row mb-3">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-4" align="right">
					<button class="btn text-light edit-btn" style="background: #00D07E"><i class="fa fa-edit"></i> Edit Profile</button>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-3" align="center">
					<img src="../images/profile/<?php echo $pic;?>" width="250"><br>
					<hr>
				</div>
				
				<div class="col-md-8">
					<h3 class=" text-secondary mb-3 text-capitalize"><?php echo $fullname;?></h3>
					<h5 class="text-secondary mb-3 text-capitalize"><i class="fa fa-map-marker"></i> <?php echo $city;?></h5>
					<p class="m-0">RATEINGS</p>
					<h4 class="text-secondary mb-4">4.5/5 &nbsp;
						<i class="fa fa-star" style="color: #00D07E;"></i>
						<i class="fa fa-star" style="color: #00D07E;"></i>
						<i class="fa fa-star" style="color: #00D07E;"></i>
						<i class="fa fa-star" style="color: #00D07E;"></i>
						<i class="fa fa-star-o" style="color: #00D07E;"></i>
					</h4>
					
					<p class="m-1">PROFILE COMPLETE</p>
					<div class="progress w-50">
						<div class="progress-bar" style="background: #00D07E;width:<?php echo $complete;?>%"><?php echo $complete;?>%</div>
					</div>
					<br>
					<h5 class="text-secondary"><i class="fa fa-user"></i> About</h5>
					<hr>
					<p class="text-secondary">CONTACT INFORMATION</p>
					<div class="row">
						<div class="col-4 text-secondary">Phone :</div>
						<div class="col-4 text-secondary"><?php echo $mobile;?></div>
						<div class="col-4"></div>
					</div>
					<div class="row mt-3">
						<div class="col-4 text-secondary">Email :</div>
						<div class="col-4 text-secondary"><?php echo $email;?></div>
						<div class="col-4">
							<span class="fa fa-stack fa-sm" style="margin-top: -5px;">
						    <i class="fa fa-certificate fa-stack-2x " style="color: #00D07E"></i>
						    <i class="fa fa-check fa-stack-1x fa-inverse"></i>
						</span>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-4 text-secondary">Address :</div>
						<div class="col-4 text-secondary text-capitalize"><?php echo $address;?></div>
						<div class="col-4"></div>
					</div>
					<hr>
					<p class="text-secondary">BASIC INFORMATION</p>
					<div class="row">
						<div class="col-4 text-secondary">Gender :</div>
						<div class="col-4 text-secondary text-capitalize"><?php echo $gender;?></div>
						<div class="col-4"></div>
					</div>
					<div class="row mt-3">
						<div class="col-4 text-secondary">Birthday :</div>
						<div class="col-4 text-secondary"><?php echo $dob;?></div>
						<div class="col-4"></div>
					</div>
					<div class="row mt-3">
						<div class="col-4 text-secondary">Registration Date :</div>
						<div class="col-4 text-secondary"><?php echo $reg_date?></div>
						<div class="col-4"></div>
					</div>
					<hr>
					<p class="text-secondary">COLLEGE INFORMATION</p>
					<div class="row">
						<div class="col-4 text-secondary">College :</div>
						<div class="col-4 text-secondary text-capitalize"><?php echo $college;?></div>
						<div class="col-4"></div>
					</div>
					<div class="row mt-3">
						<div class="col-4 text-secondary">Board :</div>
						<div class="col-4 text-secondary text-capitalize"><?php echo $board;?></div>
						<div class="col-4"></div>
					</div>
					<div class="row mt-3">
						<div class="col-4 text-secondary">Course :</div>
						<div class="col-4 text-secondary text-capitalize"><?php echo $course;?></div>
						<div class="col-4"></div>
					</div>
				</div>
			</div>
		</div>
		<!--Edit form-->
		<div class="modal fade" id="edit-form">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="text-secondary">Please Update Your Profile</h3>
						<i class="fa fa-times-circle close fa-lg" data-dismiss="modal"></i>
					</div>
					<div class="modal-body">
						<form class="edit-form was-validated">
							<div class="form-row">
								<div class="col-6">
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="gender" value="male" id="male"  required <?php if($gender =="male")
										{
											echo "checked";
										}?>>
										<label class="custom-control-label" for="male">Male</label>
									</div>
								</div>
								<div class="col-6">
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="gender" value="female" id="female" required>
										<label class="custom-control-label" for="female" <?php if($gender =="female")
										{
											echo "checked";
										}?>>Female</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="fullname">Fullname</label>
								<input type="text" name="fullname" class="form-control" id="fullname" placeholder="saurabh kumar" value="<?php echo $fullname;?>" required>
								<div class="invalid-feedback">Please enter your fullname</div>
							</div>
							<div class="form-group">
								<label for="mobile">Mobile</label>
								<input type="number" name="mobile" class="form-control" id="mobile"  value="<?php echo $mobile;?>" required>
								<div class="invalid-feedback">Please enter your city name</div>
							</div>
							<div class="form-group">
								<label for="city">City</label>
								<input type="text" name="city" class="form-control" id="city" placeholder="bijnor" value="<?php echo $city;?>" required>
								<div class="invalid-feedback">Please enter your city name</div>
							</div>
							<div class="form-group">
								<label for="Address">Address</label>
								<textarea name="address" class="form-control" id="address" rows="3" required><?php echo trim($city);?>
								</textarea>
								<div class="invalid-feedback">Please enter your complete address</div>
							</div>
							<div class="form-group">
								<label for="city">Birth Day</label>
								<input type="date" name="dob" class="form-control" id="dob" value="<?php echo $dob;?>" required>
								<div class="invalid-feedback">Please chose your date of birth</div>
							</div>
							<div class="form-group">
								<label for="college">College Name</label>
								<input type="text" name="college" class="form-control" id="college" placeholder="gov polytechnic mawana" value="<?php echo $college;?>" required>
								<div class="invalid-feedback">Please enter your college name</div>
							</div>
							<div class="form-group">
								<label for="board">Board Name</label>
								<input type="text" name="board" class="form-control" id="board" placeholder="bteup" value="<?php echo $board;?>" required>
								<div class="invalid-feedback">Please enter your university or board name</div>
							</div>
							<div class="form-group">
								<label for="course">Course</label>
								<input type="text" name="course" class="form-control" id="city" placeholder="diploma in cse" value="<?php echo $course;?>" required>
								<div class="invalid-feedback">Please enter your course name</div>
							</div>
							<div class="custom-file">
								<input  type="file" class="custom-file-input" name="pic" accept="image/*" id="pic" >
								<label class="custom-file-label">Choose your profile pic</label>
								<div class="invalid-feedback">We accept only jpeg,jpg,png,gif format of image</div>

							</div>
							<div class="form-group mt-4">
								<button class="btn text-light update-btn" type="submit" style="background: #00D07E;">UPDATE NOW</button>
								<button class="btn float-right" type="button" data-dismiss="modal" style="border:1px solid #00D07E;color: #00D07E;"><i class="fa fa-close"></i> CLOSE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--end edit form-->
		<?php
			require_once("../assist/footer.php");
		?>
		<script>
			$(document).ready(function(){
				$(".edit-btn").click(function(){
					$("#edit-form").modal("show");
					$(".edit-form").on("submit", function(e){
						e.preventDefault();
						$.ajax({
							type : "POST",
							url : "../php/update_user_info.php",
							data : new FormData(this),
							processData : false,
							contentType : false,
							cache : false,
							beforeSend : function()
							{
								$(".update-btn").html("<i class='fa fa-spinner fa-spin'></i> Processing...");
								$(".update-btn").attr("disabled","disabled");
							},
							success : function(response)
							{
								$(".update-btn").removeAttr("disabled");
								$(".update-btn").html("UPDATE NOW");
								alert(response);
							}
						});
					});
				});


			});
		</script>
	</body>
</html>