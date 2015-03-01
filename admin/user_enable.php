<?php
//引入配置文件
require_once 'user_check.php';
include_once 'lib/header.inc.php';
$uid = $_GET['uid'];
$n = new user($uid);
$query = $n->enable();
echo ' <script>alert("操作成功!")</script> ';
echo " <script>window.location='user.php';</script> " ;
