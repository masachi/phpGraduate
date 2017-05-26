<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/5/26
 * Time: 下午1:47
 */
require_once '../../model/db_conn.php';

class DateList{
    function getAllDate(){
        $number = $_POST['username'];

        $result = array(
            'code' => 200,
            'message' => 'success',
            'data' => []
        );

        $sql = "select date from exam where number = {$number}";

        $db = new DB();

        $data = $db->select($sql);

        while($row = mysql_fetch_row($data)){
            array_push($result['data'], $row[0]);
        }

        return $result;
    }
}