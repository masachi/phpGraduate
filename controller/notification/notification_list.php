<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/5/4
 * Time: 下午4:05
 */

require_once '../../model/db_conn.php';

class NotificationList{
    function getNotificationList(){

        $sql = "select * from notification ORDER BY id DESC LIMIT 10";

        $result = array (
            'code' => 200,
            'message' => 'success',
            'data' => [],
        );

        $db = new DB();

        $data = $db->select($sql);

        $i = 0;
        while($row = mysql_fetch_row($data)){
            $result['data'][$i] = array(
                'title' => $row[1],
                'url' => $row[2],
                'date' => $row[3]
            );
        }

        return $result;
    }
}