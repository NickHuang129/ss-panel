<meta charset="UTF-8">
<?php
//引入配置文件
require_once 'user_check.php';
//include_once 'lib/header.inc.php';
$id = $_GET['id'];
$sql ="SELECT * FROM `ss_node` WHERE `id` = '$id'  ";
$query =  $dbc->query($sql);
$rs = $query->fetch_array();
if (!$rs){
    die("不存在这个结点");
}
$server =  $rs['node_server'];
$method = $rs['node_method'];
$pass = $oo->get_pass();
$port = $oo->get_port();


$ssurl =  $method.":".$pass."@".$server.":".$port;
$ssqr = "ss://".base64_encode($ssurl);
?>
<p>ss://<?php echo $ssurl;?></p>
<p><?php echo $ssqr;?></p>
<div id="qrcode">
</div>
<script src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.qrcode.min.js" type="text/javascript"></script>
<script>
	jQuery(function(){
		jQuery('#qrcode').qrcode("<?php echo $ssqr;?>");
	})
</script>




