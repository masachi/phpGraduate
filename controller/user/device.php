<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/6/20
 * Time: 上午11:59
 */
require_once '../../model/db_conn.php';

class Device{
    function insertDevice(){
        $number = $_POST['username'];
        $deviceToken = $_POST['token'];

        $db = new DB();

        $sql = "select * from device where number = {$number};";

        $data = $db->select($sql);

        //echo mysql_num_rows($data);

        if(mysql_num_rows($data) > 0){
            $sql1 = "update device set token = '{$deviceToken}' where number = {$number};";
        }
        else{
            $sql1 = "insert into device (number, token) values ({$number}, '{$deviceToken}')";
        }

        $result = $db->update($sql1);

        if($result > 0){
            $result = array(
                'code' => 200,
                'message' => 'success',
                'data' => [],
            );
        }
        else{
            $result = array(
                'code' => 500,
                'message' => 'fail',
                'data' => [],
            );
        }

        return $result;
    }
}