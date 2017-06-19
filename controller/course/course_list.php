<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/5/2
 * Time: 下午2:23
 */

require_once '../../model/db_conn.php';

class CourseList{
    function getCourseList(){
        $number = $_POST['username'];
        $date = $_POST['date'];

        $result = array(
            'code' => 200,
            'message' => 'success',
            'data' => [],
        );

        $db = new DB();

        $sql = "select * from course where number = {$number} AND date = '{$date}'";

        $data = $db->select($sql);

        $i = 0;

        while($row = mysql_fetch_row($data)){

            $result['data'][$i] = array(
                'id' => urlencode($row[0]),
                'number' => urlencode ($row[1]),
                'date' => urlencode ($row[2]),
                'num' => urlencode ($row[3]),
                'course' => urlencode ($row[6]),
                'teacher' => urlencode ($row[7]),
                'location' => urlencode ($row[8]),
                'comments' => urlencode ($row[9])
            );
            $i++;
        }

        return $result;
    }
}