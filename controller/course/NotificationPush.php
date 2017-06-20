<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/6/20
 * Time: 下午12:50
 */
require('pushy.php');
require_once '../../model/db_conn.php';

class NotificationPush{
    function push(){
        $number = $_POST['username'];
//        $message = $_POST['message'];

        // Payload data you want to send to devices
        $data = array('message' => 'test');

        $db = new DB();

        $sql = "select * from device where number = {$number};";

        $data = $db->select($sql);

        $token = '';

        while($row = mysql_fetch_row($data)){
            $token = $row[2];
        }

// The recipient device tokens
        $deviceTokens = array($token);

// Optional push notification options (such as iOS notification fields)
//        $options = array(
//            'notification' => array(
//                'badge' => 1,
//                'sound' => 'ping.aiff',
//                'body'  => "Hello World \xE2\x9C\x8C"
//            )
//        );

        $options = array();

// Send it with Pushy
        PushyAPI::sendPushNotification($data, $deviceTokens, $options);
    }
}