<?php
/**
 * Created by PhpStorm.
 * User: singll
 * Date: 7/29/2018
 * Time: 9:47 AM
 */
$dsn = 'mysql:host=localhost;dbname=security';
$user = 'root';
$pass = '123456';
try {
    $dbh = new PDO($dsn, $user, $pass);
}catch(PDOException $e) {
    echo 'Connection failed: ',$e->getMessage();
    die();
}