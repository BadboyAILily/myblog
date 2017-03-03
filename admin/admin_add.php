<?php
include('../start.php');
include(ADM_PATH.'/start_admin.php');

$auid = (int)$input->get('auid');
$item = array(
    'auid' => 0,
    'auname' => '',
    'passwd' => '',
);
if ($auid > 0){
    $item = $db->get("select * from adminuser where auid ='{$auid}'");
    if (!$item ){
        exit("没有找到对应用户");
    }
}

if ($input->get('do') == 'save') {
    
    $auid = $input->post('auid');
    
    $auname = trim($input->post('username'));
    $passwd = trim($input->post('password'));
    if (empty($auname)){
        echo '账号不能为空';
        exit;
    }
    if ($auid < 1){
        if (empty($passwd)){
            echo '密码不能为空';
            exit;
        }
        $usercheck = $db->get("select * from adminuser where auname='{$auname}'");
        if (is_array($usercheck)){
            exit('账号已经存在');
        }
    
    }
    if ($auid < 1){
        $passwd = md5($passwd);
        $db->query("insert into adminuser (auname,password) values('{$auname}','{$passwd}')");
    }else {
        
        if (empty($passwd)){
            $db->query("update adminuser set auname='{$auname}' where auid ='{$auid}'");
        }else {
            $passwd = md5($passwd);
            $db->query("update adminuser set auname='{$auname}',password='{$passwd}' where auid ='{$auid}'");
        }
        
    }
    
    header('location:'.ADM_URL_PATH.'/admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>添加管理员</title>
        <?php include (ADM_PATH.'/inc/header.inc.php');?>
    </head>
    <body>
        <?php include (ADM_PATH.'/inc/nav.inc.php');?>
        <div class="container" >
            <div class="page-header">
                <h1>添加管理员 
                    <small class="pull-right">
                        <a class="btn btn-primary" href="<?php echo ADM_URL_PATH.'/admin.php';?>"> 
                            <span class="glyphicon glyphicon-chevron-left"></span> 返回
                        </a>
                    </small>
                </h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" role="form" action="<?php echo ADM_URL_PATH;?>/admin_add.php?do=save" method="post">
                    <input type="hidden" name="auid" value="<?php echo $auid;?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">用户</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" placeholder="请输入账号名称" value="<?php echo $item['auname'];?>">
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
                            <button type="submit" class="btn btn-default">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

