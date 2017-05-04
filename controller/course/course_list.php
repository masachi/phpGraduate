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
                'week' => $row[4],
                'course' => $row[5],
                'teacher' => $row[6],
                'info' => $row[7]
            );
            $i++;
        }

        return $result;
    }
}