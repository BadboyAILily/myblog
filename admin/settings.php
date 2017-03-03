<?php
include('../start.php');
include(ADM_PATH.'/start_admin.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>基本设置</title>
        <?php include (ADM_PATH.'/inc/header.inc.php');?>
        
        <link rel="stylesheet" type="text/css" href="<?php echo URL_PATH;?>/public/simditor/styles/simditor.css" />
        <script type="text/javascript" src="<?php echo URL_PATH;?>/public/simditor/scripts/module.js"></script>
        <script type="text/javascript" src="<?php echo URL_PATH;?>/public/simditor/scripts/hotkeys.js"></script>
        <script type="text/javascript" src="<?php echo URL_PATH;?>/public/simditor/scripts/uploader.js"></script>
        <script type="text/javascript" src="<?php echo URL_PATH;?>/public/simditor/scripts/simditor.js"></script>
        
    </head>
    <body>
        <?php include (ADM_PATH.'/inc/nav.inc.php');?>
        <div class="container" >
            <div class="page-header">
                <h1>基本设置 
                    <small class="">
                        设置网站功能开关
                    </small>
                </h1>
            </div>
            <div class="col-md-12">
                <form class="form-horizontal" role="form" action="<?php echo ADM_URL_PATH;?>/settings.php?do=save" method="post">
                    <div class="form-group">
                        <label for="title"class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="请输入配置" value="<?php echo $item['title'];?>">
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