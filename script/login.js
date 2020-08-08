//signup  code start

	$(document).ready(function(){
		$(".signup-form").submit(function(e)
		{
			e.preventDefault();
			$.ajax({
				type : "POST",
				url : "../php/signup.php",
				data : new FormData(this),
				contentType : false,
				processData : false,
				cache : false,
				beforeSend : function()
				{
					$(".signup-btn").html("Processing...");
					$(".signup-btn").attr("disabled","disabled");
				},
				success : function(response)
				{
					$(".signup-btn").html("SIGNUP NOW");
					$(".signup-btn").removeAttr("disabled");
					if(response.trim() == "success" || response.trim() == "faild to send mail")
					{
						window.location = "../pages/activate_account.php";
					}
					else
					{
						console.log(response);
					}

				}

			});
		});



	// start login code

		$(".login-form").submit(function(e)
		{
			e.preventDefault();
			$.ajax({
				type : "POST",
				url : "../php/login.php",
				data : new FormData(this),
				contentType : false,
				processData : false,
				cache : false,
				beforeSend : function()
				{
					$(".login-btn").html("Processing...");
					$(".login-btn").attr("disabled","disabled");
				},
				success : function(response)
				{
					$(".login-btn").html("LOGIN NOW");
					$(".login-btn").removeAttr("disabled");
					if(response.trim() == "success")
					{
						window.location = "../index.php";
					}
					else if(response.trim() == "pending")
					{
						window.location = "../pages/activate_account.php";
					}
					else
					{
						alert("Opp's something went wrong");
					}
				}

			});
		});
	});