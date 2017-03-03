<?php

include('../start.php');
include(ADM_PATH . '/start_admin.php');

$filepath = APP_PATH . '/public/files/';

$file1 = $_FILES['file1'];

$arr = explode(".", $file1['name']);
$ext = end($arr);
$microtime = str_replace('.', "", microtime(true));
$filename = $microtime.".".$ext;

if ($file1['error'] > 0){
    exit("上传失败");
}

$is = move_uploaded_file($file1['tmp_name'],$filepath . $filename);
var_dump($is);