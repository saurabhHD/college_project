<?php

require_once("vendor/autoload.php");


$google = new Google_client();

$google->setClientId('920266684134-1kh52acgdd8vli6iis2eqg68fie2l0bg.apps.googleusercontent.com');
$google->setClientSecret('vrw5192ZwQX4MeHAtyiThadE');
$google->setRedirectUri('../php/profile.php');

$google->addScope('https://www.googleapis.com/auth/user.addresses.read');
session_start();

?>