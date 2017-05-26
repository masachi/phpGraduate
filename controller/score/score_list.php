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

        $sql = "select * from score where number = {$number} order by id desc";

        $db = new DB();

        $data = $db->select($sql);

        $i = 0;

        while($row = mysql_fetch_row($data)){
            $result['data'][$i] = array(
                'id' => urlencode($row[0]),
                'year' => urlencode ($row[2]),
                'term' => urlencode ($row[3]),
                'course' => urlencode ($row[4]),
                'score' => urlencode ($row[5]),
                'type' => urlencode ($row[6]),
                'flag' => urlencode ($row[7])
            );
            $i++;
        }

        return $result;
    }
}