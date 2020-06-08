<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//require_once 'autoload.php';
require_once __DIR__ .('/src/FacebookLogin.php');
$config = include('config.php');
if (!session_id()) {
    session_start();
}
if(isset($_GET['code'])){
    $code =  $_GET['code'];
    $facebook = new \SNL\FacebookLogin($config);
    $accessToken = $facebook->getAccesstoken($code);
    echo $accessToken;
}
