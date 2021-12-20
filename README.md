## 首页

![在这里插入图片描述](https://img-blog.csdnimg.cn/20210308104129395.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L2phbmtpbjY=,size_16,color_FFFFFF,t_70)
## 详情页

![在这里插入图片描述](https://img-blog.csdnimg.cn/20210308104210889.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L2phbmtpbjY=,size_16,color_FFFFFF,t_70)
## 管理员页面

![在这里插入图片描述](https://img-blog.csdnimg.cn/20210308104348844.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L2phbmtpbjY=,size_16,color_FFFFFF,t_70)


## 发布作品


![在这里插入图片描述](https://img-blog.csdnimg.cn/20210308104424524.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L2phbmtpbjY=,size_16,color_FFFFFF,t_70)

## 项目结构
```

C:.
│  admin.php
│  admin_index.php
│  admin_user_list.php
│  delete.php
│  detail.php
│  do_edit.php
│  edit.php
│  index.php
│  login.php
│  login_out.php
│  msg.php
│  publish.php
│  register.php



```


## admin.php
```php

<br />
<font size='1'><table class='xdebug-error xe-warning' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Warning: mysqli_fetch_assoc() expects parameter 1 to be mysqli_result, boolean given in D:\wamp64\www\mall\admin_user_list.php on line <i>55</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0000</td><td bgcolor='#eeeeec' align='right'>253088</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='D:\wamp64\www\mall\admin_user_list.php' bgcolor='#eeeeec'>...\admin_user_list.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0040</td><td bgcolor='#eeeeec' align='right'>300760</td><td bgcolor='#eeeeec'><a href='http://www.php.net/function.mysqli-fetch-assoc' target='_new'>mysqli_fetch_assoc</a>
(  )</td><td title='D:\wamp64\www\mall\admin_user_list.php' bgcolor='#eeeeec'>...\admin_user_list.php<b>:</b>55</td></tr>
</table></font>


```

## admin_index.php

```php
<?php
include_once './lib/function.php';
session_start();


if (!isset($_SESSION['user'])) {
    msg(2,'请登录','login.php');
}

$user=$_SESSION['user'];





$link = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');

$sql="select count(id) as people from `im_user` ";


$obj=mysqli_query($link,$sql);


$result=mysqli_fetch_assoc($obj);

$people=$result['people'];

unset($sql,$obj);

$sql="select count(id) as goods from `im_goods` ";


$obj=mysqli_query($link,$sql);





?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link  type="text/css" rel="stylesheet"  href="./assets/css/style.css"/>
<link  type="text/css" rel="stylesheet"  href="./assets/css/index.css"/>


<link rel="stylesheet" type="text/css" href="./static/css/common.css"/>
<link rel="stylesheet" type="text/css" href="./static/css/index.css"/>
<script  src="js/jquery.min.js"></script>
<!-- 动态菜单JS -->
<script type="text/javascript"  src="./assets/js/menu.js"></script>
</head>

<body>
<div class="container">
 <div class="cont-top">
 

  <div class="cont-top-rg">
   <ul class="advanced-menu">
    
   
    <li class="default" style="position:relative;">
   
     <a  href="#" class="special">用户 :  <?php echo $user['username'] ?></a>
     <div class="drop-down-wrap" style="width:180px;left:15px;display: none;">
      <div class="drop-down">
       <span class="triangle-border"></span>
       <span class="triangle-bg"></span>

      </div>
     </div>
    </li>    
   </ul>
   
   
   
   
   
   <ul class="advanced-menu">
 
    <li>
     <a href="./index.php"><img  src="./assets/img/top-icon5.png"></a>
    </li>
   
   </ul>
  </div>
 </div>
 
 
 <div class="left-menu" style="height:949px;">
  <div class="menu-list">
   <ul>
	    <li class="menu-list-02">
    <a href="admin_index.php">
     <p class="fumenu">首页</p>
    </a>

    </li>
    
    <li class="menu-list-02">
    <a href="admin_user_list.php">
     <p class="fumenu">用户列表</p>
    
     </a>

    </li>
   </ul>
  </div>
 </div>
 
 
 <div class="right-menu">
  <div class="main-hd">
   <div class="page-teb" style="height:887px;">
    <div class="l-tab-links">
     <ul style="left:0;">
      <li class="l-select">
       <a href="#" style="padding:0 25px;">首页</a>
      </li>
     </ul>
    </div>
    <div class="l-tab-content" style="height:851px;">
     <div class="tab-content-item">
      <div class="home">
      <!--成交金额-->

        
         <div class="col-xs">
         <a  href="#" class="title-button bg-red">
          <div class="carousel">
           <div class="left-img bg-color-red">
            <i><img src="./assets/img/left-img2.png"></i>
            <p>商品</p>
           </div>
           <div class="right-info"><?php echo "$goods"?>件</div>
          </div>
         </a>
        </div>

        

        
         <div class="col-xs">
         <a  href="#" class="title-button bg-purple">
          <div class="carousel">
           <div class="left-img bg-color-purple">
            <i><img src="./assets/img/left-img5.png"></i>
            <p>用户</p>
           </div>
           <div class="right-info"><?php echo "$people";?>人</div>
          </div>
         </a>
        </div>
        

       

       
   
        
       
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
</body>
</html>

```
## admin_user_list.php

```php
<?php


include_once './lib/function.php';
session_start();


if (!isset($_SESSION['user'])) {
    msg(2,'请登录','login.php');
}

$user=$_SESSION['user'];


$link = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');


$sql="select count(id) as goods from `im_goods` ";


$obj=mysqli_query($link,$sql);


$result=mysqli_fetch_assoc($obj);

$goods=$result['goods'];



unset($sql,$obj);

$page=isset($_GET['page'])?intval ($_GET['page']):1;
$page=max($page,1);

$pageSize=4;

$offset=($page-1)*$pageSize;


$sql = "SELECT COUNT(`id`) as total from `im_user`";
$obj = mysqli_query($link,$sql);
$result = mysqli_fetch_assoc($obj);

$total = isset($result['total'])?$result['total']:0;


$sql = "SELECT `id`,`username`,`create_time` FROM `im_user` ORDER BY `id`  desc limit {$offset},{$pageSize} ";



$obj=mysqli_query($link,$sql);

$users=array();

while ($result=@mysqli_fetch_assoc($obj)) {
    $users[]=$result;
}


$pages = pages($total,$page,$pageSize,2);




?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link  type="text/css" rel="stylesheet"  href="./assets/css/style.css"/>
<link  type="text/css" rel="stylesheet"  href="./assets/css/index.css"/>

<link rel="stylesheet" type="text/css" href="./static/css/common.css"/>
<link rel="stylesheet" type="text/css" href="./static/css/index.css"/>
<script  src="js/jquery.min.js"></script>
<!-- 动态菜单JS -->
<script type="text/javascript"  src="./assets/js/menu.js"></script>
</head>

<body>
<div class="container">
 <div class="cont-top">
 

  <div class="cont-top-rg">
   <ul class="advanced-menu">
    
   
    <li class="default" style="position:relative;">
    
     <a  href="#" class="special">用户 :  <?php echo $user['username'] ?> </a>
     <div class="drop-down-wrap" style="width:180px;left:15px;display: none;">
      <div class="drop-down">
       <span class="triangle-border"></span>
       <span class="triangle-bg"></span>

      </div>
     </div>
    </li>    
   </ul>
   
   
   
   
   
   <ul class="advanced-menu">
 
    <li>
     <a href="./index.php"><img  src="./assets/img/top-icon5.png"></a>
    </li>
   
   </ul>
  </div>
 </div>
 
 
 <div class="left-menu" style="height:949px;">
  <div class="menu-list">
   <ul>
      <li class="menu-list-02">
    <a href="admin_index.php">
     <p class="fumenu">首页</p>
    </a>

    </li>
    
    <li class="menu-list-02">
    <a href="admin_user_list.php">
     <p class="fumenu">用户列表</p>
    
     </a>

    </li>
   </ul>
  </div>
 </div>
 
 
 <div class="right-menu">
  <div class="main-hd">
   <div class="page-teb" style="height:887px;">
    <div class="l-tab-links">
     <ul style="left:0;">
   
	   <li class="l-select">
       <a href="#">首页</a>
      </li>
       <li class="l-select">
       <a href="#">用户列表</a>
      </li>
     </ul>
    </div>
    <div class="l-tab-content" style="height:851px;">
     <div class="tab-content-item">
      <div class="home">
      <!--成交金额-->
<div class="yg-gl">
         <div class="yg-add">
          <button  class="ui-xz" data-method="offset" >新增</button>
          <button  class="ui-xz1" data-method="offset" >删除</button>
          <button  class="ui-xz2" data-method="offset" >编辑</button>
         </div>
         <div class="yg-tab">
          <div class="grid">
          <div class="layoutitem" style="width:100%;border:none;">
           <form method="post"> 
            <table class="gridbar" border="0" cellpadding="0" cellspacing="0">
            <thead>
             <tr>
           
              <th scope="col">ID</th>
              <th>名称</th>
              <th>注册账号的时间</th>
             </tr>
            
             <?php foreach($users as $v):?>
                 <tr>
                  <td><?php echo $v['id'] ?></td>
                  <td><?php echo $v['username'] ?></td>
                  <td><?php echo date('Y-m-d H:i:s', $v['create_time']); ?></td>
                 </tr>

             <?php endforeach;?>
             </thead>
            </table>
            </form>
           </div>

            <?php echo $pages?>

          <div class="pagin">
    	   <div class="message">共<i class="blue"><?php echo "$goods" ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $page?>&nbsp;</i>页</div>

          
          </div>
          </div>
         </div>
        </div>
        
  
       
      <!--员工管理   结束-->
       
   
        
       
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
</body>
</html>

```
##  delete.php

```php
<?php

include_once './lib/function.php';
if (!checkLogin()) {
	# code...
	msg(2,'请登录','login.php');
}

$link = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');

$goodsId=isset($_GET['id']) && is_numeric($_GET['id'])? intval($_GET['id']): '' ;

if (!$goodsId) {
	msg(2,'参数错误','index.php');
}


$sql= "DELETE FROM `im_goods` where `id` ={$goodsId} LIMIT 1";
if ($result=mysqli_query($link,$sql)) {
	msg(1,'操作成功','index.php');
}else{
	msg(2,'操作失败','index.php');

}


?>
```
## detail.php

```php
<?php
include_once './lib/function.php';

$goodsId = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '';

//如果id不存在 跳转到商品列表
if(!$goodsId)
{
    msg(2,'参数非法','index.php');
}

//根据商品id查询商品信息
$con = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');

$sql = "SELECT * FROM `im_goods` WHERE `id` = {$goodsId}";
$obj = mysqli_query($con,$sql);

//当根据id查询商品信息为空 跳转商品列表页
if(!$goods = mysqli_fetch_assoc($obj))
{
    msg(2,'画品不存在','index.php');
}

//根据用户id查询发布人
unset($sql,$obj);
$sql = "select * from `im_user` where `id`='{$goods['user_id']}'";
$obj = mysqli_query($con,$sql);
$user= mysqli_fetch_assoc($obj);


//更新浏览次数

unset($sql,$obj);

$sql = "update `im_goods` set `view`=`view`+1 where `id`={$goods['id']}";
mysqli_query($con,$sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M-GALLARY|<?php echo $goods['name']?></title>
    <link rel="stylesheet" type="text/css" href="./static/css/common.css" />
    <link rel="stylesheet" type="text/css" href="./static/css/detail.css" />
</head>
<body class="bgf8">
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <li><a href="#">登录</a></li>
            <li><a href="#">注册</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="section" style="margin-top:20px;">
        <div class="width1200">
            <div class="fl"><img src="<?php echo $goods['pic']?>" width="720px" height="432px"/></div>
            <div class="fl sec_intru_bg">
                <dl>
                    <dt><?php echo $goods['name']?></dt>
                    <dd>
                        <p>发布人：<span><?php echo $user['username']?></span></p>
                        <p>发布时间：<span><?php echo date('Y年m月d日',$goods['create_time'])?></span></p>
                        <p>修改时间：<span><?php echo date('Y年m月d日',$goods['update_time'])?></span></p>
                        <p>浏览次数：<span><?php echo $goods['view']?></span></p>
                    </dd>
                </dl>
                <ul>
                    <li>售价：<br/><span class="price"><?php echo $goods['price'] ?></span>元</li>
                    <li class="btn"><a href="javascript:;" class="btn btn-bg-red" style="margin-left:38px;">立即购买</a></li>
                    <li class="btn"><a href="javascript:;" class="btn btn-sm-white" style="margin-left:8px;">收藏</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="secion_words">
        <div class="width1200">
            <div class="secion_wordsCon">
                <?php echo $goods['content']?>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p><span>M-GALLARY</span>©2017 POWERED BY IMOOC.INC</p>
</div>
</div>
</body>
</html>


```
## do_edit.php
```php
<?php  

include_once './lib/function.php';
if (!checkLogin()) {
	# code...
	msg(2,'请登录','login.php');
}

if (!empty($_POST['name'])) {

	$link = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');

	if(!$goodsId=intval($_POST['id'])){
		msg(2,'参数非法','index.php');
	}



	$sql="SELECT * FROM `im_goods` WHERE `id` ={$goodsId}";

	$obj=mysqli_query($link,$sql);

	if (!$goods=mysqli_fetch_assoc($obj)) {
		msg(2,'不存在呢','index.php');
	}

    //画品名称
    $name = mysqli_real_escape_string ($link,trim($_POST['name']));
    
    //画品价格
    $price = intval($_POST['price']);
    //画品简介
    $des = mysqli_real_escape_string($link,trim($_POST['des']));
    //画品详情
    $content = mysqli_real_escape_string($link,trim($_POST['content']));

    // $goods['content'] = mysqli_real_escape_string($link,trim($goods['content']));

    // // var_dump($content);

    // // var_dump($goods['content']);
    // // exit;
    $nameLength = mb_strlen($name, 'utf-8');
    if($nameLength <= 0 || $nameLength > 30)
    {
        msg(2, '画品名应在1-30字符之内');
    }

    if($price <= 0 || $price > 999999999)
    {
        msg(2, '画品名称应小于999999999');
    }

    $desLength = mb_strlen($des, 'utf-8');
    if($desLength <= 0 || $desLength > 100)
    {
        msg(2, '画品简介应在1-100字符之内');
    }

    if(empty($content))
    {
        msg(2, '画品详情不能为空');
    }

    $update=array(

    		'name'=>$name,
    		'price'=>$price,
    		'des'=>$des,
    		'content'=>$content
    	);

    if ($_FILES['file']['size']>0) {

    	 $pic = imgUpload($_FILES['file']);
    	 $update['pic']=$pic;
    }


    foreach ($update as $k => $v) {
    	if ($goods[$k] == $v) {
    		unset($update[$k]);
    	}
    }


    if (empty($update)) {
    	# code...
    	msg(1,'操作成功','edit.php?id='.$goodsId);
    }

    $updateSql='';

    foreach ($update as $k => $v) {
    	$updateSql .="`{$k}` = '{$v}' ,";
    }

    unset($sql,$obj,$result);
    $updateSql=rtrim($updateSql,',');

    $sql=" UPDATE `im_goods` SET {$updateSql}  where `id` = {$goodsId}";
   
    
    if ($result=mysqli_query($link,$sql)) {
    	
    	//影响行数mysql_affected_rows();
    		msg(1,'操作成功','edit.php?id='.$goodsId);
    	
    }else{
    		msg(2,'操作失败','edit.php?id='.$goodsId);

    }


	
}else{
	msg(2,'路由非法','index.php');
}


?>
```
## edit.php
```php
<?php 

include_once './lib/function.php';
if (!checkLogin()) {
	# code...
	msg(2,'请登录','login.php');
}
$user = $_SESSION['user'];

$goodsId=isset($_GET['id']) && is_numeric($_GET['id'])? intval($_GET['id']): '' ;

if (!$goodsId) {
	msg(2,'参数错误','index.php');
}

$link = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');

$sql="SELECT * FROM `im_goods` WHERE `id` ={$goodsId}";

$obj=mysqli_query($link,$sql);




if (!$goods=mysqli_fetch_assoc($obj)) {
	msg(2,'不存在呢','index.php');
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M-GALLARY|编辑画品</title>
    <link type="text/css" rel="stylesheet" href="./static/css/common.css">
    <link type="text/css" rel="stylesheet" href="./static/css/add.css">
</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <li><span>管理员：<?php echo $user['username'] ?></span></li>
            <li><a href="#">退出</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="addwrap">
        <div class="addl fl">
            <header>编辑画品</header>
            <form name="publish-form" id="publish-form" action="do_edit.php" method="post"
                  enctype="multipart/form-data">
                <div class="additem">
                    <label id="for-name">画品名称</label><input type="text" name="name" id="name" placeholder="请输入画品名称" value="<?php echo $goods['name'] ?>">
                </div>
                <div class="additem">
                    <label id="for-price">价值</label><input type="text" name="price" id="price" placeholder="请输入画品价值" value="<?php echo $goods['price'] ?>" >
                </div>
                <div class="additem">
                    <!-- 使用accept html5属性 声明仅接受png gif jpeg格式的文件                -->
                    <label id="for-file">画品</label><input type="file" accept="image/png,image/gif,image/jpeg" id="file" name="file">
                </div>
                <div class="additem textwrap">
                    <label class="ptop" id="for-des">画品简介</label>
                    <textarea id="des" name="des" placeholder="请输入画品简介"><?php echo $goods['des'] ?></textarea>
                </div>
                <div class="additem textwrap">
                    <label class="ptop" id="for-content">画品详情</label>
                    <div style="margin-left: 120px" id="container">
                        <textarea id="content" name="content">
                        <?php echo $goods['content'] ?></textarea>
                    </div>

                </div>
                <div style="margin-top: 20px">
                <input type="hidden" name="id" value="<?php echo $goods['id'] ?>">
                    <button type="submit">发布</button>
                </div>

            </form>
        </div>
        <div class="addr fr">
            <img src="./static/image/index_banner.png">
        </div>
    </div>

</div>
<div class="footer">
    <p><span>M-GALLARY</span>©2017 POWERED BY IMOOC.INC</p>
</div>
</body>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script src="./static/js/layer/layer.js"></script>
<script src="./static/js/kindeditor/kindeditor-all-min.js"></script>
<script src="./static/js/kindeditor/lang/zh_CN.js"></script>
<script>
    var K = KindEditor;
    K.create('#content', {
        width      : '475px',
        height     : '400px',
        minWidth   : '30px',
        minHeight  : '50px',
        items      : [
            'undo', 'redo', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'clearhtml',
            'fontsize', 'forecolor', 'bold',
            'italic', 'underline', 'link', 'unlink', '|'
            , 'fullscreen'
        ],
        afterCreate: function () {
            this.sync();
        },
        afterChange: function () {
            //编辑器失去焦点时直接同步，可以取到值
            this.sync();
        }
    });
</script>

<script>
    $(function () {
        $('#publish-form').submit(function () {
            var name = $('#name').val(),
                price = $('#price').val(),
                file = $('#file').val(),
                des = $('#des').val(),
                content = $('#content').val();
            if (name.length <= 0 || name.length > 30) {
                layer.tips('画品名应在1-30字符之内', '#name', {time: 2000, tips: 2});
                $('#name').focus();
                return false;
            }
            //验证为正整数
            if (!/^[1-9]\d{0,8}$/.test(price)) {
                layer.tips('请输入最多9位正整数', '#price', {time: 2000, tips: 2});
                $('#price').focus();
                return false;
            }

            // if (file == '' || file.length <= 0) {
            //     layer.tips('请选择图片', '#file', {time: 2000, tips: 2});
            //     $('#file').focus();
            //     return false;

            // }

            if (des.length <= 0 || des.length >= 100) {
                layer.tips('画品简介应在1-100字符之内', '#content', {time: 2000, tips: 2});
                $('#des').focus();
                return false;
            }

            if (content.length <= 0) {
                layer.tips('请输入画品详情信息', '#container', {time: 2000, tips: 3});
                $('#content').focus();
                return false;
            }
            return true;

        })
    })
</script>

</html>

```
##  index.php
```php
<?php
include_once './lib/function.php';

if ($login=checkLogin()) {
  
    $user=$_SESSION['user'];
}

$page=isset($_GET['page'])?intval ($_GET['page']):1;
$page=max($page,1);
$pageSize=3;

$offset=($page-1)*$pageSize;

$link = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');


$sql = "SELECT COUNT(`id`) as total from `im_goods`";
$obj = mysqli_query($link,$sql);
$result = mysqli_fetch_assoc($obj);

$total = isset($result['total'])?$result['total']:0;


$sql = "SELECT `id`,`name`,`pic`,`des` FROM `im_goods` ORDER BY `id` asc,`view` desc limit {$offset},{$pageSize} ";


$obj=mysqli_query($link,$sql);

$goods=array();

while ($result=mysqli_fetch_assoc($obj)) {
    $goods[]=$result;
}

$pages = pages($total,$page,$pageSize,3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M-GALLARY|首页</title>
    <link rel="stylesheet" type="text/css" href="./static/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="./static/css/index.css"/>
</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <?php if($login): ?>
                <li><span>管理员：<?php echo $user['username'] ?></span></li>
                <li><a href="publish.php">发布</a></li>
                <li><a href="login_out.php">退出</a></li>
                <li><a href="admin_index.php">后台管理</a></li>
            <?php else: ?>
                <li><a href="login.php">登录</a></li>
                <li><a href="register.php">注册</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="banner">
        <img class="banner-img" src="./static/image/welcome.png" width="732px" height="372" alt="图片描述">
    </div>
    <div class="img-content">
        <ul>
            <?php foreach($goods as $v):?>
            <li>
                <img class="img-li-fix" src="<?php echo $v['pic']?>" alt="<?php echo $v['name']?>">
                <div class="info">
                    <a href="detail.php?id=<?php echo $v['id']?>"><h3 class="img_title"><?php echo $v['name']?></h3></a>
                    <p>
                        <?php echo $v['des']?>
                    </p>
                    <div class="btn">
                        <a href="edit.php?id=<?php echo $v['id']?>" class="edit">编辑</a>
                        <a href="delete.php?id=<?php echo $v['id']?>" class="del">删除</a>
                    </div>
                </div>
            </li>

            
            <?php endforeach;?>

        </ul>
    </div>
    <?php echo $pages?>
</div>

<div class="footer">
    <p><span>M-GALLARY</span>©2017 POWERED BY IMOOC.INC</p>
</div>
</body>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script>
    $(function () {
        $('.del').on('click',function () {
            if(confirm('确认删除该画品吗?'))
            {
               window.location = $(this).attr('href');
            }
            return false;
        })
    })
</script>


</html>

```
##  login.php
```php
<?php
    session_start();

    if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
        header('Location:index.php');
         exit;
    }

    include_once './lib/function.php';
    if (!empty($_POST['username'])) {

        $username=trim($_POST['username']);
        $password=trim($_POST['password']);
    

 //后台校验
    if(!$username){
        echo "用户名字不能为空";
        exit;
     }

    if (!$password) {
         
        echo "密码不能为空";
        exit;
     }  

     $con=mysqlInit('localhost','root','root','imooc_mall');

    if(!$con){
        echo mysql_error();
        exit;
    }

    $sql= "SELECT * FROM `im_user` where `username`='{$username}'";
        

    $obj=mysqli_query($con,$sql);
    $result=mysqli_fetch_assoc($obj);

    if(is_array($result)&&!empty($result)){
        if (createPassword($password)===$result['password']) {
            $_SESSION['user']=$result;
            header('Location:index.php');
            exit;
        }else{
            echo "密码用户名不匹配";
            exit;
        }
    }else{
        echo "用户不存在!";
        exit;
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M-GALLARY|用户登录</title>
    <link type="text/css" rel="stylesheet" href="./static/css/common.css">
    <link type="text/css" rel="stylesheet" href="./static/css/add.css">
    <link rel="stylesheet" type="text/css" href="./static/css/login.css">
</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <li><a href="login.php">登录</a></li>
            <li><a href="register.php">注册</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="center">
        <div class="center-login">
            <div class="login-banner">
                <a href="#"><img src="./static/image/login_banner.png" alt=""></a>
            </div>
            <div class="user-login">
                <div class="user-box">
                    <div class="user-title">
                        <p>用户登录</p>
                    </div>
                    <form class="login-table" name="login" id="login-form" action="login.php" method="post">
                        <div class="login-left">
                            <label class="username">用户名</label>
                            <input type="text" class="yhmiput" name="username" placeholder="Username" id="username">
                        </div>
                        <div class="login-right">
                            <label class="passwd">密码</label>
                            <input type="password" class="yhmiput" name="password" placeholder="Password" id="password">
                        </div>
                        <div class="login-btn">
                            <button type="submit">登录</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p><span>M-GALLARY</span> ©2017 POWERED BY IMOOC.INC</p>
</div>

</body>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script src="./static/js/layer/layer.js"></script>
<script>
    $(function () {
        $('#login-form').submit(function () {
            var username = $('#username').val(),
                password = $('#password').val();
            if (username == '' || username.length <= 0) {
                layer.tips('用户名不能为空', '#username', {time: 2000, tips: 2});
                $('#username').focus();
                return false;
            }

            if (password == '' || password.length <= 0) {
                layer.tips('密码不能为空', '#password', {time: 2000, tips: 2});
                $('#password').focus();
                return false;
            }


            return true;
        })

    })
</script>

</script>
</html>
```
##  login_out.php
```php
<?php
include_once './lib/function.php';
session_start();


unset($_SESSION['user']);
msg(1,'退出登录','index.php');
?>
```
##  msg.php
```php
<?php

//url type参数处理 1:操作成功 2:操作失败
$type = isset($_GET['type']) && in_array(intval($_GET['type']), array(1, 2)) ? intval($_GET['type']) : 1;

$title = $type == 1 ? '操作成功' : '操作失败';

$msg = isset($_GET['msg']) ? trim($_GET['msg']) : '操作成功';

$url = isset($_GET['url']) ? trim($_GET['url']) : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="./static/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="./static/css/done.css"/>
</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
</div>
<div class="content">
    <div class="center">
        <div class="image_center">
            <?php if($type == 1): ?>
                <span class="smile_face">:)</span>
            <?php else: ?>
                <span class="smile_face">:(</span>
            <?php endif; ?>

        </div>
        <div class="code">
            <?php echo $msg ?>
        </div>
        <div class="jump">
            页面在 <strong id="time" style="color: #009f95">3</strong> 秒 后跳转
        </div>
    </div>

</div>
<div class="footer">
    <p><span>M-GALLARY</span>©2017 POWERED BY IMOOC.INC</p>
</div>
</body>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script>
    $(function () {
        var time = 3;
        var url = "<?php echo $url?>" || null;//js读取php变量
        setInterval(function () {
            if (time > 1) {
                time--;
                console.log(time);
                $('#time').html(time);
            }
            else {
                $('#time').html(0);
                if (url) {
                    location.href = url;
                } else {
                    history.go(-1);
                }

            }
        }, 1000);

    })
</script>
</html>

```
##  publish.php
```php
<?php
session_start();

include_once './lib/function.php';

if (!isset($_SESSION['user'])) {
    msg(2,'请登录','login.php');
}

$user=$_SESSION['user'];

if (!empty($_POST['name'])) {

    $link = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');
    //画品名称
    $name = mysqli_real_escape_string ($link,trim($_POST['name']));
    
    //画品价格
    $price = intval($_POST['price']);
    //画品简介
    $des = mysqli_real_escape_string($link,trim($_POST['des']));
    //画品详情
    $content = mysqli_real_escape_string($link,trim($_POST['content']));

    $nameLength = mb_strlen($name, 'utf-8');
    if($nameLength <= 0 || $nameLength > 30)
    {
        msg(2, '画品名应在1-30字符之内');
    }

    if($price <= 0 || $price > 999999999)
    {
        msg(2, '画品名称应小于999999999');
    }

    $desLength = mb_strlen($des, 'utf-8');
    if($desLength <= 0 || $desLength > 100)
    {
        msg(2, '画品简介应在1-100字符之内');
    }

    if(empty($content))
    {
        msg(2, '画品详情不能为空');
    }

    $userId = $user['id'];

    $now =$_SERVER['REQUEST_TIME'];

     $pic = imgUpload($_FILES['file']);

    //建议大家做商品名称唯一性验证处理

    //入库处理
    $sql = "INSERT `im_goods`(`name`,`price`,`des`,`content`,`pic`,`user_id`,`create_time`,`update_time`,`view`) values('{$name}','{$price}','{$des}','{$content}','{$pic}','{$userId}','{$now}','{$now}',0)";

    if($obj = mysqli_query($link,$sql))
    {
        msg(1,'操作成功','index.php');
    }
    else
    {
      echo mysql_error();exit;
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M-GALLARY|发布画品</title>
    <link type="text/css" rel="stylesheet" href="./static/css/common.css">
    <link type="text/css" rel="stylesheet" href="./static/css/add.css">
</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <li><span>管理员:<?php echo $user['username'] ?></span></li>
            <li><a href="#">退出</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="addwrap">
        <div class="addl fl">
            <header>发布画品</header>
            <form name="publish-form" id="publish-form" action="publish.php" method="post"
                  enctype="multipart/form-data">
                <div class="additem">
                    <label id="for-name">画品名称</label><input type="text" name="name" id="name" placeholder="请输入画品名称">
                </div>
                <div class="additem">
                    <label id="for-price">价值</label><input type="text" name="price" id="price" placeholder="请输入画品价值">
                </div>
                <div class="additem">
                    <!-- 使用accept html5属性 声明仅接受png gif jpeg格式的文件                -->
                    <label id="for-file">画品</label><input type="file" accept="image/png,image/gif,image/jpeg" id="file"
                                                          name="file">
                </div>
                <div class="additem textwrap">
                    <label class="ptop" id="for-des">画品简介</label><textarea id="des" name="des"
                                                                           placeholder="请输入画品简介"></textarea>
                </div>
                <div class="additem textwrap">
                    <label class="ptop" id="for-content">画品详情</label>
                    <div style="margin-left: 120px" id="container">
                        <textarea id="content" name="content"></textarea>
                    </div>

                </div>
                <div style="margin-top: 20px">
                    <button type="submit">发布</button>
                </div>

            </form>
        </div>
        <div class="addr fr">
            <img src="./static/image/index_banner.png">
        </div>
    </div>

</div>
<div class="footer">
    <p><span>M-GALLARY</span>©2017 POWERED BY IMOOC.INC</p>
</div>
</body>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script src="./static/js/layer/layer.js"></script>
<script src="./static/js/kindeditor/kindeditor-all-min.js"></script>
<script src="./static/js/kindeditor/lang/zh_CN.js"></script>
<script>
    var K = KindEditor;
    K.create('#content', {
        width      : '475px',
        height     : '400px',
        minWidth   : '30px',
        minHeight  : '50px',
        items      : [
            'undo', 'redo', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'clearhtml',
            'fontsize', 'forecolor', 'bold',
            'italic', 'underline', 'link', 'unlink', '|'
            , 'fullscreen'
        ],
        afterCreate: function () {
            this.sync();
        },
        afterChange: function () {
            //编辑器失去焦点时直接同步，可以取到值
            this.sync();
        }
    });
</script>

<script>
    $(function () {
        $('#publish-form').submit(function () {
            var name = $('#name').val(),
                price = $('#price').val(),
                file = $('#file').val(),
                des = $('#des').val(),
                content = $('#content').val();
            if (name.length <= 0 || name.length > 30) {
                layer.tips('画品名应在1-30字符之内', '#name', {time: 2000, tips: 2});
                $('#name').focus();
                return false;
            }
            //验证为正整数
            if (!/^[1-9]\d{0,8}$/.test(price)) {
                layer.tips('请输入最多9位正整数', '#price', {time: 2000, tips: 2});
                $('#price').focus();
                return false;
            }

            if (file == '' || file.length <= 0) {
                layer.tips('请选择图片', '#file', {time: 2000, tips: 2});
                $('#file').focus();
                return false;

            }

            if (des.length <= 0 || des.length >= 100) {
                layer.tips('画品简介应在1-100字符之内', '#content', {time: 2000, tips: 2});
                $('#des').focus();
                return false;
            }

            if (content.length <= 0) {
                layer.tips('请输入画品详情信息', '#container', {time: 2000, tips: 3});
                $('#content').focus();
                return false;
            }
            return true;

        })
    })
</script>
</html>

```
##  register.php
```php
<?php
    
    include_once './lib/function.php';
    if (!empty($_POST['username'])) {
        //mysql_real_escape_string()进行 过滤 数据的提交
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);
        $repassword=trim($_POST['repassword']);
        //后台校验
        if(!$username){
            echo "用户名字不能为空";
            exit;
        }

        if (!$password) {
         
            echo "密码不能为空";
            exit;
        }

        if ($password!=$repassword) {
            echo "密码不一致";
            exit;
        }
        //数据库连接
       $link = mysqlInit('127.0.0.1', 'root', 'root', 'imooc_mall');

     
        

        //先判断用户是否存在
        
        $sql = "SELECT COUNT(  `id` ) as total FROM  `im_user` WHERE  `username` =  '{$username}'";
        $obj=mysqli_query($link,$sql);

        $result=mysqli_fetch_assoc($obj);

        if(isset($result['total'])&&$result['total']>0) {
           msg(2,'用户已经存在','register.php');
            exit;
        }

        $password=createPassword($password);

       

        unset($obj,$result,$sql);


        $time=$_SERVER['REQUEST_TIME'];
        $sql = "INSERT `im_user`(`username`,`password`,`create_time`) values('{$username}','{$password}','{$_SERVER['REQUEST_TIME']}')";
        $obj=mysqli_query($link,$sql);

        if ($obj) {
            $userId=mysqli_insert_id($link);
           msg(1,'注册成功请登录','login.php');
            exit;
        }else{
            echo mysql_error();
            exit;
        }




    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M-GALLARY|用户注册</title>
    <link type="text/css" rel="stylesheet" href="./static/css/common.css">
    <link type="text/css" rel="stylesheet" href="./static/css/add.css">
    <link rel="stylesheet" type="text/css" href="./static/css/login.css">
</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <li><a href="login.php">登录</a></li>
            <li><a href="register.php">注册</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="center">
        <div class="center-login">
            <div class="login-banner">
                <a href="#"><img src="./static/image/login_banner.png" alt=""></a>
            </div>
            <div class="user-login">
                <div class="user-box">
                    <div class="user-title">
                        <p>用户注册</p>
                    </div>
                    <form class="login-table" name="register" id="register-form" action="register.php" method="post">
                        <div class="login-left">
                            <label class="username">用户名</label>
                            <input type="text" class="yhmiput" name="username" placeholder="Username" id="username">
                        </div>
                        <div class="login-right">
                            <label class="passwd">密码</label>
                            <input type="password" class="yhmiput" name="password" placeholder="Password" id="password">
                        </div>
                        <div class="login-right">
                            <label class="passwd">确认</label>
                            <input type="password" class="yhmiput" name="repassword" placeholder="Repassword"
                                   id="repassword">
                        </div>
                        <div class="login-btn">
                            <button type="submit">注册</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p><span>M-GALLARY</span> ©2017 POWERED BY IMOOC.INC</p>
</div>

</body>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script src="./static/js/layer/layer.js"></script>
<script>
    $(function () {
        $('#register-form').submit(function () {
            var username = $('#username').val(),
                password = $('#password').val(),
                repassword = $('#repassword').val();
            if (username == '' || username.length <= 0) {
                layer.tips('用户名不能为空', '#username', {time: 2000, tips: 2});
                $('#username').focus();
                return false;
            }

            if (password == '' || password.length <= 0) {
                layer.tips('密码不能为空', '#password', {time: 2000, tips: 2});
                $('#password').focus();
                return false;
            }

            if (repassword == '' || repassword.length <= 0 || (password != repassword)) {
                layer.tips('两次密码输入不一致', '#repassword', {time: 2000, tips: 2});
                $('#repassword').focus();
                return false;
            }

            return true;
        })

    })
</script>
</html>



```


## code

https://github.com/hiszm/imooc_mall
这是我当时我在imooc得买的课程，然后跟着后面边学边做得项目案例，本科同学可以用来用做毕业设计。相关得源代码我已经放到文末尾得GitHub链接已经给出了。 如果网络无法访问GitHub 可以 关注公众号（孙中明） 回复 6003 获取代码

![](https://img-blog.csdnimg.cn/5f7544212bfc4891b05e95ec599e493c.png)
