<?php
define("URL_PATH", 'http://myblog.com');
define("APP_PATH", dirname(__FILE__));
define("ADM_PATH",APP_PATH.'/admin');
define("ADM_URL_PATH",'http://myblog.com/admin');

include (APP_PATH.'/config.php');

include (APP_PATH.'/lib/db.class.php');
$db = new db('127.0.0.1', 'root', '', 'blog');

include (APP_PATH.'/lib/Input.php');
$input = new Input();