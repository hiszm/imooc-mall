<?php
include_once './lib/function.php';
session_start();


unset($_SESSION['user']);
msg(1,'退出登录','index.php');
?>