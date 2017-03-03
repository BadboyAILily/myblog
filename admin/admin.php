<?php
include('../start.php');
include(ADM_PATH.'/start_admin.php');

switch ($input->get('do')){
    case "delete":
        $auid = (int)$input->get('auid');
        if ($auid<1){
            exit('没有正确传auid的参数');
        }
        if ($auid == $user['auid']){
            exit('不能删除自己');
        }
        $db->query("delete from adminuser where auid='{$auid}'");
        header('location:'.ADM_URL_PATH.'/admin.php');
        break;
}
//读取adminuser的数据
$users = $db->gets("select * from adminuser");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>管理员管理</title>
        <?php include (ADM_PATH.'/inc/header.inc.php');?>
    </head>
    <body>
        <?php include (ADM_PATH.'/inc/nav.inc.php');?>
        <div class="container" >
            <div class="page-header">
                <h1>管理员管理 
                    <small class="pull-right">
                        <a class="btn btn-primary" href="<?php echo ADM_URL_PATH.'/admin_add.php';?>"> <span class="glyphicon glyphicon-plus"></span> 添加</a>
                    </small>
                </h1>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>auid</th>
                            <th>auname</th>
                            <th>管理功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $item):?>
                        <tr>
                            <td><?php echo $item['auid'];?></td>
                            <td><?php echo $item['auname'];?></td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="<?php echo ADM_URL_PATH;?>/admin_add.php?auid=<?php echo $item['auid'];?>">编辑</a>
                                <?php if ($user['auid'] != $item['auid']): ?> 
                                <a 
                                    href="<?php echo ADM_URL_PATH;?>/admin.php?do=delete&auid=<?php echo $item['auid'];?>" 
                                    class="btn btn-danger btn-xs">
                                    删除
                                </a>
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

