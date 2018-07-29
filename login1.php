<?php
/**
 * Created by PhpStorm.
 * User: singll
 * Date: 7/29/2018
 * Time: 10:57 AM
 */
include 'conn.php'; //包含数据库连接文件
header("Content-type:text/html;charset=utf-8"); //设置php编码，如果不设置中文会乱码显示
$name = empty($_POST['name'])?null:$_POST['name']; //用post方式接收name参数，如果不存在则初始化为null
$passwd = empty($_POST['passwd'])?null:$_POST['passwd']; //用post方式接收passwd参数，如果不存在则初始化为null


//如果用户名或密码中有null，则跳转回登陆页面
if ($name == null || $passwd == null) {
    header("Location: login.html");
    exit;
}

$sql = "select * from user where name='".$name ."' and passwd='".md5($passwd)."'"; //重点在这里，这句是将sql语句拼接，语句的作用是从数据库里查找提交的用户名密码是否存在
$stmt = $dbh->query($sql); // 执行上句的sql语句
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); //将结果由对象转换为数组，便于使用
//判断是否登陆成功，成功则显示，失败跳转回登陆界面
if ($result != null) {
    echo "登陆成功".$result[0]['name']; //显示出登陆用户名
} else {

    echo "登陆失败，正在跳转";

    echo "<meta http-equiv=\"refresh\" content=\"5;url=login.html\">";// 5秒之后跳转回登陆界面
}
