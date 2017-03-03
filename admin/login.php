<?php
include('../start.php');

define("NOT_LOGIN", 1);

session_start();
if ($input->get('do') == 'checkuser') {
    $auname = $input->post('username');
    $passwd = md5($input->post('password'));
    
    $sql = "select * from adminuser where auname='{$auname}' and password='{$passwd}'";
    $row = $db->get($sql);
    if (!$row){
        header('location:'.ADM_URL_PATH.'/login.php');
        exit('账号或密码错误');
    }else {
        $_SESSION['auid'] = $row['auid'];
        header('location:'.ADM_URL_PATH.'/index.php');
    }
}

if($input->get('do')=='out'){
    $_SESSION['auid'] = 0;
    header('location:'.ADM_URL_PATH.'/login.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>管理员登录</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css" type="text/css">
        
        
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://myblog.com/public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container" style="margin-top:200px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">管理员登录</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="<?php echo ADM_URL_PATH;?>/login.php?do=checkuser" method="post">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="请输入账号名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name='password' id="password" placeholder="请输入密码">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">登录</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer text-right text-muted">DKang 版权所有</div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
    </body>
</html>
