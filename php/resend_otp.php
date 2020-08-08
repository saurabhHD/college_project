<?php
require_once("../common_files/database/database.php");
require_once("user_info.php");
require_once("send_otp.php");
new send_otp($otp,$auth_id,$email);

?>