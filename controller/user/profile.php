<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/26
 * Time: 下午1:23
 */

require '../../model/db_conn.php';
class Profile{
    private $conn;

    function __construct()
    {
        $this->conn = connectDatabase();
    }

    function getProfile(){
        $number = $_POST['username'];
    }
}