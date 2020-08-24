<?php
	$url = $_POST['url'];
	$h = curl_init();
	curl_setopt($h, CURLOPT_URL, 'https://sctomp3.net/download-track/?url='.$url);
	curl_setopt($h,CURLOPT_SSL_VERIFYPEER,false);
	curl_exec($h);
?>