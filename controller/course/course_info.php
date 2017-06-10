<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/6/9
 * Time: 下午10:15
 */

require_once '../../model/db_conn.php';


class CourseInfo{
    function getCourseInfo(){
        $number = $_POST['username'];
        $course = json_decode('"'.$_POST['course'].'"');

        $result = array(
            'code' => 200,
            'message' => 'success',
            'data' => [],
        );

        $db = new DB();

        mysql_query("SET names UTF8");

        $sql = "select * from course_info where number = {$number} AND course = '{$course}'";

        $data = $db->select($sql);

        $i = 0;

        while($row = mysql_fetch_row($data)){

            $result['data'][$i] = array(
                'id' => urlencode($row[0]),
                'number' => urlencode ($row[1]),
                'course' => urlencode ($row[2]),
                'weight' => urlencode ($row[3]),
                'week' => urlencode ($row[4]),
                'info' => urlencode ($row[5])
            );
            $i++;
        }

        return $result;
    }
}