<?php
/**
 * Created by PhpStorm.
 * User: singll
 * Date: 7/29/2018
 * Time: 3:58 PM
 */
include 'conn.php'; // 包含数据库连接文件

$id = empty($_GET['id'])?null:$_GET['id']; // 接收get参数id，如果不存在则设置为null

//如果id为null则跳转回登陆页
if ($id == null) {
    header("Location: login.html");
    exit;
}

$sql = "select * from info where uid=".$id; //关键语句，依然是拼接导致的漏洞。此语句是根据id查询用户信息
$stmt = $dbh->query($sql); // 执行上句的sql语句
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); //将结果由对象转换为数组，便于使用

$sql2 = "select * from user where id=".$id; //同上，这句是查询用户名
$stmt2 = $dbh->query($sql2);
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="card_class card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-header"><?=$result2[0]['name'];?></div>
        <div class="card-body">
            <h5 class="card-title"><?=$result[0]['phone'];?></h5>
            <p class="card-text"><?=$result[0]['address']?></p>
        </div>
    </div>
</div> <!-- /container -->
<script src="static/js/jquery-3.3.1.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
</body>
</html>
