<?php

	require_once("../common_files/database/database.php");
	require_once("../php/user_info.php");
						$time = time()-(60*60*24*365);
						setcookie('_aid_',$auth_id,$time,'/');
						setcookie('_ap_',$auth_pass,$time,'/');
						header('Location: ../index.php');
						exit;

?>