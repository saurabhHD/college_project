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
			width: 70px;
			height: 70px;
			border-radius: 50%;
		}
		.massage-box-active
		{
			max-height: 480px;
			min-height: 300px;
			overflow-y: scroll;
		}
		</style>
	</head>
	<body>
		<?php
		require_once("../common_files/database/database.php");
		require_once("../php/user_info.php");
		require_once("../assist/nav.php");
		?>
		<div class=" container">
		<div class=" row">
			<div class="col-12 top">
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
		<div class="row">
			<div class=" col-4 left">
				<div class="left-chat-thumb px-2 pt-2">
					<!--Start dynamic chat thumbnail-->
					<?php
					require_once("../php/chat_thumbnail.php");
					?>
					<!--End dynamic chat thumbnail-->
				</div>
			</div>
			<div class=" col-8 right d-none">
				<div class=" row">
					<div class=" col-12 p-2 shadow-sm">
						<div class="row">
							<div class="col-1 back-btn d-none">
								<button class="btn back-btn mt-3">
									<i class="fa fa-arrow-left fa-lg text-secondary text-left"></i>
								</button>
							</div>
							<div class="col-1 active-chat-pic-box">
							</div>
							<div class="col-6 active-chat-text-box">
								<div class="name-active ml-3">
									<h6 class="name-active-text text-secondary m-0 mt-3 p-0"></h6>
									<small class="active-status m-0 text-secondary">Online</small>
								</div>
							</div>
							<div class="col-4">
								<div class="row pt-3">
									<div class="col-3">
										<button class="btn add-to-friend d-none">
										<i class="fa fa-user-plus add-to-friend-icon" style="font-size: 20px;color: #ccc;"></i>
										</button>
									</div>
									<div class="col-3">
										<button class="btn add-to-favrate d-none">
										<i class="fa fa-star-o add-to-favrate-icon" style="font-size: 20px;color: #ccc;"></i>
										</button>
									</div>
									<div class="col-4">
										<button class="btn user-info d-none">
										<i class="fa fa-info-circle user-info-icon" style="font-size: 22px;color: #ccc;"></i>
										</button>
									</div>
									<div class="col-2 ml-auto">
										<button class="btn more-option float-right">
										<i class="fa fa-ellipsis-v more-option-icon" style="font-size: 20px;color: #ccc;"></i>
										</button>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class=" row massage-box-active ">
					<div class=" col-12 p-2 massage-box ">
							
					</div>
				</div><div class=" row">
					<div class=" col-12">
						<form class="mt-3 massage-form">
							<div class="input-group">
								<input type="text" name="massage" class="form-control border-0 massage-input" placeholder="Write your massage...">
								<div class="input-group-append">
									<button class="btn mx-2 send-msg-btn" type="submit" style="background: #00D07E;width: 50px; height: 50px;border-radius: 50%;">
										<i class="fa fa-send text-center mr-1" style="color: #fff;"></i>
									</button>
								</div>
							</div>
						</form>
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
				$(".chat-thumb").each(function(){
					$(this).click(function(){
						$(".right").removeClass('d-none');
						$(".chat-thumb").removeClass('active-thumb');
						$(this).addClass('active-thumb');
						var active = this;
						var sender_id = $(this).attr('sender');
						var sender_pic = $(this).attr('sender-pic');
						var sender_name = $(this).attr('name');
						var massage_id = $(this).attr('massage');
						$(".active-chat-pic-box").html('<img src="../images/profile/'+sender_pic+'" class="active-thumb-pic">');
						$(".name-active-text").html(sender_name);
						$(".more-option").attr("sender",sender_id);
						$.ajax({
							type : "POST",
							url : "../php/open_chat.php",
							data : {
								sender_id : sender_id,
								massage_id : massage_id
							},
							success : function(response)
							{
								$(".massage-box").html("");
								var all_data = response.trim();
								all_data = JSON.parse(all_data);
								var i;
								for(i=0;i<=all_data.length;i++)
								{
									$(".massage-box").append(all_data[i]);
								}
								$(".massage-box-active").scrollTop(10000000);
								
							}
						});
						//send massage

								$(".massage-form").submit(function(e)
									{
										e.preventDefault();
										var msg = $(".massage-input").val();
										if(msg !="")
										{
											$.ajax({
												type : "POST",
												url : "../php/send_massage.php",
												data : {
													massage : msg,
													resever_id : sender_id,
													massage_id : massage_id
												},
												beforeSend : function(){
													$(".send-msg-btn").attr("disabled","disabled");
												},
												success : function(response)
												{
													$(".send-msg-btn").removeAttr("disabled");
													if(response.trim() != "faild")
													{
														$(".massage-box").append(response);
														$(".massage-form").trigger('reset');
														$(".massage-box-active").scrollTop(10000000);
													}
												}
											});
										}
										else
										{
											alert("Write your massage..");
										}
									});

								// dynamic massage 

								setInterval(function(){
									$.ajax({
							type : "POST",
							url : "../php/open_chat.php",
							data : {
								sender_id : sender_id,
								massage_id : massage_id
							},
							success : function(response)
							{
								$(".massage-box").html("");
								var all_data = response.trim();
								all_data = JSON.parse(all_data);
								var i;
								for(i=0;i<=all_data.length;i++)
								{
									$(".massage-box").append(all_data[i]);
								}
								
								
							}
						});
								},500);
					});


				});
			});

			function ohh() {$(document).ready(function(){
				var width = $(window).width();
				if(width <= 668)
				{
					$(".left").removeClass("col-4");
					$(".left").addClass("col-12");
					$(".chat-thumb").each(function(){
						$(this).click(function(){
							$(".left").addClass("d-none");
							$(".right").removeClass("col-8");
							$(".right").addClass("col-12");
							$(".back-btn").removeClass("d-none");
							$(".top").addClass("d-none");
							$(".active-chat-pic-box").removeClass("col-1");
							$(".active-chat-pic-box").addClass("col-2");
							$(".active-chat-text-box").removeClass("col-6");
							$(".active-chat-text-box").addClass("col-5");
							$(".back-btn").click(function(){
								$(".left").removeClass("d-none");
								$(".right").addClass("d-none");
							});
						});
					});
				}
				else
				{
					$(".left").removeClass("col-12");
					$(".left").addClass("col-4");
					$(".chat-thumb").each(function(){
						$(this).click(function(){
							$(".left").removeClass("d-none");
							$(".right").removeClass("col-12");
							$(".right").addClass("col-8");							
							$(".back-btn").addClass("d-none");
							$(".top").removeClass("d-none");
							$(".active-chat-pic-box").removeClass("col-2");
							$(".active-chat-pic-box").addClass("col-1");
							$(".active-chat-text-box").removeClass("col-5");
							$(".active-chat-text-box").addClass("col-6");		
							$(".back-btn").click(function(){
								$(".left").addClass("d-none");
								$(".right").removeClass("d-none");
							});
						});
					});
				}
			});}
			ohh();
			$(window).resize(function(){
				ohh();
			});
		</script>
	</body>
</html>