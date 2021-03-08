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