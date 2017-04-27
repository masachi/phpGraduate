<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/26
 * Time: 下午1:18
 */
$mysql_server = 'localhost';
$mysql_port = '3306';
$mysql_username = 'root';
$mysql_password = 'sizhaizhenexin';
$mysql_database = 'graduate';

class DB
{
    function connectDatabase()
    {
        global $mysql_server, $mysql_port, $mysql_username, $mysql_password, $mysql_database;

        $conn = mysqli_connect($mysql_server, $mysql_username, $mysql_password, $mysql_database, $mysql_port);
        mysqli_select_db($conn, $mysql_database);
        mysqli_autocommit($conn, true);
    }

    function select($sql)
    {
        global $conn;
        $result = mysqli_query($conn, $sql);

        return $result;
    }
}
