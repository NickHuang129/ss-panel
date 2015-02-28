<?php
//引入配置文件
require_once 'user_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $admin_title;?></title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            我的信息
            <small>管理员</small>
        </h1>
    </section>
    
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
