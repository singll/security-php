<?php
/**
 * Created by PhpStorm.
 * User: singll
 * Date: 7/29/2018
 * Time: 12:02 PM
 */
include 'conn.php';
header("Content-type:text/html;charset=utf-8"); //设置php编码，如果不设置中文会乱码显示
$name = empty($_POST['name'])?null:$_POST['name']; //用post方式接收name参数，如果不存在则初始化为null
$passwd = empty($_POST['passwd'])?null:$_POST['passwd']; //用post方式接收passwd参数，如果不存在则初始化为null


//如果用户名或密码中有null，则跳转回注册页面
if ($name == null || $passwd == null) {
    header("Location: register.html");
    exit;
}

$sql = "insert into  user(name,passwd) value ('".$name ."' ,'".md5($passwd)."')";  // 注册用的sql语句，将用户名密码插入数据库
$stmt = $dbh->query($sql); // 执行上句的sql语句
if ($stmt != null) {
    echo "注册成功";
} else {
    echo "注册失败";
}
echo "<meta http-equiv=\"refresh\" content=\"3;url=register.html\">";// 3秒之后跳转回注册界面