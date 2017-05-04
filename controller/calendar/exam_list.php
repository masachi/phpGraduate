<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/5/4
 * Time: 下午5:54
 */

require_once '../../model/db_conn.php';

class ExamList{
    function getExamDate(){
        $number = $_POST['username'];
        $date = $_POST['date'];

        $result = array(
            'code' => 200,
            'message' => 'success',
            'data' => []
        );

        $sql = "select * from exam where number = {$number} AND date = '{$date}'";

        $db = new DB();

        $data = $db->select($sql);

        $i = 0;

        while($row = mysql_fetch_row($data)){
            $result['data'][$i] = array(
                'course' => $row[3],
                'time' => $row[4]
            );
            $i++;
        }

        return $result;
    }
}