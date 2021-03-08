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
