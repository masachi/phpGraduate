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
$conn = mysqli_connect($mysql_server, $mysql_username, $mysql_password, $mysql_database, $mysql_port);;

class DB
{
    function connectDatabase()
    {
        global $conn, $mysql_database;

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
