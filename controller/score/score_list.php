<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/5/4
 * Time: 下午4:23
 */

require_once '../../model/db_conn.php';

class ScoreList{
    function getScoreList(){
        $number = $_POST['username'];

        $result = array(
            'code' => 200,
            'message' => 'success',
            'data' => [],
        );

        $sql = "select * from score where number = {$number}";

        $db = new DB();

        $data = $db->select($sql);

        $i = 0;

        while($row = mysql_fetch_row($data)){
            $result['data'][$i] = array(
               'course' => $row[2],
                'grade' => $row[3],
                'score' => $row[4]
            );
            $i++;
        }

        return $result;
    }
}