<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/6/19
 * Time: 下午7:56
 */
class Timeoff{
    function addTimeOff(){
        $number = $_POST['username'];
        $date = $_POST['date'];
        $course = json_decode('"'.$_POST['course'].'"');
        $type = json_decode('"'.$_POST['type'].'"');
        $timeoff = json_decode('"'.$_POST['timeoff'].'"');

        $db = new DB();

        mysql_query("SET names UTF8");

        $sql = "insert into timeoff (number, date, course, type, text) values ('{$number}', '{$date}', '{$course}', '{$type}', '{$timeoff}');";
        $sql2 = "update course set timeoff = 1 where number = {$number} and course = '{$course}' and date = '{$date}';";
        $result = $db->insert($sql);
        $result2 = $db->update($sql2);

        if($result > 0 && $result2 > 0){
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