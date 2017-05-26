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

        $sql = "select * from exam where number = {$number} and date = '{$date}'";

        $db = new DB();

        $data = $db->select($sql);

        $i = 0;

        while($row = mysql_fetch_row($data)){
            $result['data'][$i] = array(
                'id' => urlencode($row[0]),
                'date' => urlencode ($row[2]),
                'course' => urlencode ($row[3]),
                'time' => urlencode ($row[4]),
                'location' => urlencode ($row[5]),
                'type' => urlencode ($row[6])
            );
            $i++;
        }

        return $result;
    }
}