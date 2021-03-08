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
