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