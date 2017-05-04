<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午5:26
 */

chdir(dirname(__FILE__));

require './notification_list.php';

$notification_list = new NotificationList();

class Notification{
    function index($request_params){
        $result = array(
            'code' => 404
        );

        $method = explode('=', $request_params);
        switch ($method[1]) {
            case "notification_list":
                global $notification_list;
                return $notification_list->getNotificationList();
                break;
            default:
                break;
        }

        return $result;
    }
}