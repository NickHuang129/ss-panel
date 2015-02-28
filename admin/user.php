<?php
//引入配置文件
require_once 'user_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $site_name;?></title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';
$tomb = 1024*1024;
$togb = $tomb*1024;

//排序
if(isset($_GET['desc'])&&($_GET['desc']==1)){
    $desc = 1;
}else{
    $desc = 0;
}
if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = false;
}
function echo_order_header_link($order__,$order,$desc){
    ?><a href="user.php?order=<?php echo $order__;?>&desc=<?php if($order!=$order__){echo "1";}else{echo ($desc+1)%2;}?>">
    <i class="fa <?php if($order==$order__):?>active <?php endif;
    if($order==$order__&&$desc==1):?>fa-arrow-down<?php else:?>fa-arrow-up<?php endif;?>"></i></a>
    <?php
}
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户列表
            <small>User List</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>用户名<?php echo_order_header_link("user_name",$order,$desc);?></th>
                                    <th>设置流量<?php echo_order_header_link("transfer_enable",$order,$desc);?></th>
                                    <th>剩余流量<?php echo_order_header_link("remain",$order,$desc);?></th>
                                    <th>上传流量<?php echo_order_header_link("u",$order,$desc);?></th>
                                    <th>下载流量<?php echo_order_header_link("d",$order,$desc);?></th>
                                    <th>最后签到<?php echo_order_header_link("last_check_in_time",$order,$desc);?></th>
                                    <th>最后使用<?php echo_order_header_link("t",$order,$desc);?></th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                if($order){
                                    if($order=="remain"){
                                        $order="(transfer_enable-u-d)";
                                    }
                                    $sql = "SELECT * FROM `user` ORDER BY ".$order;
                                    if ($desc == 1){
                                        $sql.=" desc";
                                    }
                                }else{
                                    $sql = "SELECT * FROM `user` ORDER BY uid ";
                                }
                                $query =  $dbc->query($sql);
                                while ( $rs = $query->fetch_array()){ ?>
                                    <tr>
                                        <td><a href="user_info.php?uid=<?php echo $rs['uid']; ?>" title="<?php echo $rs['email']; ?>"><?php echo $rs['user_name']; ?></a></td>
                                        <td><?php echo round($rs['transfer_enable']/$togb,2); ?>G</td>
                                        <td><?php echo round(($rs['transfer_enable']-$rs['u']-$rs['d'])/$togb,2); ?>G</td>
                                        <td><?php echo round($rs['u']/$tomb,2); ?>M</td>
                                        <td><?php echo round($rs['d']/$tomb,2); ?>M</td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['last_check_in_time']); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['t']); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="user_edit.php?uid=<?php echo $rs['uid']; ?>">编辑</a>
                                            <a class="btn btn-warning btn-sm" onclick="return confirm('你确定要禁用 <?php echo $rs['user_name']; ?> 吗？');" href="#<?php echo $rs['uid']; ?>">禁用</a>
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('你确定要删除 <?php echo $rs['user_name']; ?> 吗？');" href="user_del.php?uid=<?php echo $rs['uid']; ?>">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
