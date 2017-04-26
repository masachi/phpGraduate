<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/26
 * Time: 下午1:18
 */
function connectDatabase()
{
    $mysql_server = 'localhost';
    $mysql_port = '3306';
    $mysql_username = 'root';
    $mysql_password = '233';
    $mysql_database = 'graduate';

    $conn = mysqli_connect($mysql_server, $mysql_username, $mysql_password, $mysql_database, $mysql_port);

    return $conn;
}

function select($conn, $sql)
{

}
