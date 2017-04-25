<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午3:02
 */

$name = $_POST["username"];
$password = $_POST["password"];
$arr = array(
    'username' => $name,
    'password' => $password,
);
echo json_encode($arr);
