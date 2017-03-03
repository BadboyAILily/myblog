<?php
session_start();
$session_auid = $input->session('auid');

$user = $db->get("select * from adminuser where auid='{$session_auid}'");
 
if (($session_auid < 1 || !is_array($user)) && defined("NOT_LOGIN") == false){
    header('location:'.ADM_URL_PATH.'/login.php');
    exit;
}

