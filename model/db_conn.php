<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/26
 * Time: 下午1:18
 */
//$mysql_server = 'localhost';
$mysql_server = '153.125.238.237:31341';
//$mysql_port = '3306';
$mysql_port = '31341';
$mysql_username = 'root';
$mysql_password = 'sizhaizhenexin';
$mysql_database = 'graduate';
$conn = mysql_connect($mysql_server, $mysql_username, $mysql_password);


class DB
{
    function connectDatabase()
    {
        global $conn, $mysql_database;

        mysql_select_db($mysql_database);
    }

    function select($sql)
    {
        global $conn;
        $result = mysql_query($sql);

        echo json_encode(array(
            'result' => $result,
        ));

        return $result;
    }
}
