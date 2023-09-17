<?php


$db = new mysqli("localhost","root","");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$db->select_db("udb6211_2");

$date=date("d.m.Y");
$time=date("H:i");

date_default_timezone_set('Europe/Moscow');
$date_now_go=new DateTime(date('Y-m-d H:i:s'));

$res_html = $db->query("SELECT * FROM config_site");
$myr_html = $res_html->fetch_assoc();

$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];

if(filter_var($client, FILTER_VALIDATE_IP)) $ip_user = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip_user = $forward;
else $ip_user = $remote;

if (empty($_SESSION['talon'])){
    if (empty($_COOKIE['_talon_klient'])){
        $result = $db->query("SELECT counter FROM posetiteli");
        $x = $result->fetch_assoc();

        $_SESSION['talon'] = $x["counter"]+1;
        $db->query("UPDATE posetiteli SET counter = counter + 1");

        setcookie("_talon_klient", $_SESSION['talon'], time()+59999999);
    }else{
        $_SESSION['talon'] = $_COOKIE['_talon_klient'];
    }
}
?>
