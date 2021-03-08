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