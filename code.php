<?php
require_once 'lib/config.php';
include_once 'header.php';
$c = new Ss\User\InviteCode();
?>
<body>
<style type>
.donate-ol li{
	margin-bottom: 6px;
}
</style>
<div class="container">
    <?php include_once 'nav.php';?>

    <div class="jumbotron">
        <p class="lead"> 邀请码实时刷新</p>
        <p>如遇到无邀请码请找已经注册的用户获取。</p>
    </div>
    <p>
    
            你还可以通过以下方式获取邀请码：<br>
       <ol class="donate-ol">
          <li>
            加入交流群（419827451），免费获取　 <a style="position: relative" target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=cc60f63d2988aa23d09b0a0da9b44d7afe8d6807696be615e1f201ae66ab4dc6"><span style="position: absolute;display:inline-block;height:22px;width:90px;background-image:url(http://pub.idqqimg.com/wpa/images/group.png)"></span></a>
       </li>
       <li>
        捐助1元，立刻获得 <a href="donate_list.php">点我查看</a>
       </li>
       </ol>     
    </p>
    
    <div class="row marketing">
        <h2 class="sub-header">邀请码</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>###</th>
                    <th>邀请码</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $datas = $c->get_code_array(0,21);
                $a = 0;
                foreach($datas as $data ){
                ?>
                <tr>
                    <td><?php echo $a;$a++; ?></td>
                     <td><?php echo $data['code'];?></td>
                    <td>可用</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div><?php
            include_once 'footer.php';
            include_once 'ana.php';?>

</div> <!-- /container -->
</body>
</html>
