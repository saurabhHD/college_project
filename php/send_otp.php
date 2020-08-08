<?php
	
	class send_otp{
		private $otp;
		private $email;
		private $auth_id;
		private $massage;
		private $headers;
		function __construct($otp,$auth_id,$email)
		{
			$this->otp = $otp;
			$this->auth_id = $auth_id;
			$this->email = $email;
						$this->headers = "From: saurabh@gmail.com" . "\r\n";
						$this->headers .= "MIME-Version: 1.0" . "\r\n";
						$this->headers .="Content-type:text/html;charset=UTF-8" . "\r\n";
						$this->massage = '<div style="background:#ddd;padding: 30px;">
						<div style="box-shadow: 3px 2px 5px #ccc;background: #fff;padding: 20px;">
							<div align="center" style="margin-bottom: 60px"><img src="https://skgadgets.in/wp-content/uploads/2020/07/two.png" width="150"></div>
							<div style="color: #6C757D;font-family: sans-serif;text-align: justify;" align="center">Please confirm that you want to use this as your SPL account email address. Once its done you will be able to selling and purchaseing book on SPL !</div>
							<div align="center">
							<button style="background: #00D07E;border: #00D07E;width: 100%;height: 40px;margin-top: 60px;box-shadow: 2px 5px 3px #ccc" ><a href="http://localhost/college_project/pages/activator.php?token='.$this->auth_id.'&otp='.$this->otp.'" style="color: #fff;font-weight: bold;font-family: sans-serif;font-size: 17px;text-decoration: none">Verify my email</a></button>
							</div>
							<div style="color: #6C757D;font-family: sans-serif;text-align: center;margin-top: 60px;" align="center">Or paste this link into your browser:<br>
							<a style="color: #00D07E">http://localhost/college_project/pages/activator.php?token='.$this->auth_id.'&otp='.$this->otp.'</a>
							</div>
						</div>
					</div>';
				
				if(mail($this->email, "SPL VERIFICATION", $this->massage,$this->headers))
				{
					echo "success";
				}
				else
				{
					echo "faild to send mail";
				}
			}

		}
	
?>