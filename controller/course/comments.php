<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/6/19
 * Time: 下午7:44
 */
require_once '../../model/db_conn.php';

class Comments{
    function updateComments(){
        $number = $_POST['username'];
        $course = json_decode('"'.$_POST['course'].'"');
        $date = $_POST['date'];
        $comments = json_decode('"'.$_POST['comments'].'"');

        $db = new DB();

        mysql_query("SET names UTF8");

        $sql = "update course set comments = '{$comments}' where number = {$number} and course = '{$course}' and date = '{$date}';";



        $result = $db->update($sql);

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