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
		/* Styles for wrapping the search box */

		/* Bootstrap 4 text input with search icon */

		.has-search .form-control {
		    padding-left: 2.375rem;
		}

		.has-search .form-control-feedback {
		    position: absolute;
		    z-index: 2;
		    display: block;
		    width: 2.375rem;
		    height: 2.375rem;
		    line-height: 2.375rem;
		    text-align: center;
		    pointer-events: none;
		    color: #aaa;
		}
		.left-chat-thumb-pic{
			width: 50px;
			height: 50px;
			border-radius: 50%;
			
		}
		.last-massage{
			color: #ccc;
			margin-top: 0;
			font-size: 12px;
		}
		.unread-count-box{
			width: 20px;
			height: 20px;
			border-radius: 50%;
			background: red;
			color: #fff;
			font-weight: bold;
			position: relative;
		}
		.unread-count{
			position: absolute;
			left: 5px;
			top: -2px;
		}
		.active-thumb{
			border-left: 4px solid #00D07E;
		}
		.left{
			max-height: 500px;
			overflow-y: scroll;
		}
		.active-thumb-pic
		{
			width: 60px;
			height: 60px;
			border-radius: 50%;
		}
		</style>
	</head>
	<body>
		<?php
		require_once("../common_files/database/database.php");
		require_once("../php/user_info.php");
		require_once("../assist/nav.php");
		?>
		<div class="border container">
		<div class="border row">
			<div class="border col-12 top">
				<div class="row">
					<div class="col-4">
						<div class="form-group has-search m-0 my-2">
					    <span class="fa fa-search form-control-feedback"></span>
					    <input type="text" class="form-control border-0" placeholder="Search">
					  </div>
					</div>
					<div class="col-8"></div>
				</div>
			</div>
		</div>
		<div class="border row">
			<div class="border col-4 left">
				<div class="left-chat-thumb px-2 pt-2">
					<div class="row active-thumb shadow-sm pt-2 mb-3 rounded-lg">
						<div class="col-2">
							<img src="../images/profile/demo.jpg" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">Saurabh Kumar</h5>
								<p class="last-massage">Hi this is here your last massage...</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center">1 min</p>
							<div class="unread-count-box mt-2 mx-auto">
							<p class="unread-count">2</p>
							</div>
							
						</div>
					</div>
					<div class="row shadow-sm pt-2 mb-3 rounded-lg">
						<div class="col-2">
							<img src="../images/profile/demo.jpg" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">Saurabh Kumar</h5>
								<p class="last-massage">Hi this is here your last massage...</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center">1 min</p>
							<div class="unread-count-box mt-2 mx-auto">
							<p class="unread-count">2</p>
							</div>
							
						</div>
					</div>
					<div class="row shadow-sm pt-2 mb-3 rounded-lg">
						<div class="col-2">
							<img src="../images/profile/demo.jpg" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">Saurabh Kumar</h5>
								<p class="last-massage">Hi this is here your last massage...</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center">1 min</p>
							<div class="unread-count-box mt-2 mx-auto d-none">
							<p class="unread-count">2</p>
							</div>
							
						</div>
					</div>
					<div class="row shadow-sm pt-2 mb-3 rounded-lg">
						<div class="col-2">
							<img src="../images/profile/demo.jpg" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">Saurabh Kumar</h5>
								<p class="last-massage">Hi this is here your last massage...</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center">1 min</p>
							<div class="unread-count-box mt-2 mx-auto d-none">
							<p class="unread-count">2</p>
							</div>
							
						</div>
					</div>
					<div class="row shadow-sm pt-2 mb-3 rounded-lg">
						<div class="col-2">
							<img src="../images/profile/demo.jpg" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">Saurabh Kumar</h5>
								<p class="last-massage">Hi this is here your last massage...</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center">1 min</p>
							<div class="unread-count-box mt-2 mx-auto d-none">
							<p class="unread-count">2</p>
							</div>
							
						</div>
					</div>
					<div class="row shadow-sm pt-2 mb-3 rounded-lg">
						<div class="col-2">
							<img src="../images/profile/demo.jpg" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">Saurabh Kumar</h5>
								<p class="last-massage">Hi this is here your last massage...</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center">1 min</p>
							<div class="unread-count-box mt-2 mx-auto d-none">
							<p class="unread-count">2</p>
							</div>
							
						</div>
					</div>
					<div class="row shadow-sm pt-2 mb-3 rounded-lg">
						<div class="col-2">
							<img src="../images/profile/demo.jpg" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">Saurabh Kumar</h5>
								<p class="last-massage">Hi this is here your last massage...</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center">1 min</p>
							<div class="unread-count-box mt-2 mx-auto d-none">
							<p class="unread-count">2</p>
							</div>
							
						</div>
					</div>
					<div class="row shadow-sm pt-2 mb-3 rounded-lg">
						<div class="col-2">
							<img src="../images/profile/demo.jpg" class="left-chat-thumb-pic shadow-sm">
						</div>
						<div class="col-7">
							<div class="chat-name mt-2">
								<h5 class="text-secondary mb-0">Saurabh Kumar</h5>
								<p class="last-massage">Hi this is here your last massage...</p>
							</div>
						</div>
						<div class="col-3">
							<p class="time-ago text-secondary m-0 text-center">1 min</p>
							<div class="unread-count-box mt-2 mx-auto d-none">
							<p class="unread-count">2</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="border col-8 right">
				<div class="border row">
					<div class="border col-12 p-3">
						<div class="row">
							<div class="col-1">
								<img src="../images/profile/demo.jpg" class="active-thumb-pic">
							</div>
							<div class="col-8">
								<div class="name-active ml-2">
									<h5 class="name-active-text text-secondary mt-2 mb-0">Rohit Kumar</h5>
									<p class="active-status m-0 text-secondary">Online</p>
								</div>
							</div>
							<div class="col-3"></div>
						</div>
					</div>
				</div>
				<div class="border row">
					<div class="border col-12">right-center</div>
				</div><div class="border row">
					<div class="border col-12">right-bottom</div>
				</div>
			</div>
		</div>
		</div>
		<?php
		require_once("../assist/footer.php");
		?>
		<script>
		</script>
	</body>
</html>