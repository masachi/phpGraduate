<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/26
 * Time: 下午1:23
 */

require_once '../../model/db_conn.php';

class Profile{

    function getProfile(){
        $number = $_POST['username'];

        $sql = 'select * from profile where number = ' . $number;
        $db = new DB();

        $data = $db->select($sql);

        while($row = mysqli_fetch_row($data)){
            $result = $row;
        }

        return $result;
    }
}