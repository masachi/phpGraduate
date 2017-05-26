<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午3:43
 */
chdir(dirname(__FILE__));
require './controller/user/index.php';
chdir(dirname(__FILE__));
require './controller/score/index.php';
chdir(dirname(__FILE__));
require './controller/course/index.php';
chdir(dirname(__FILE__));
require './controller/notification/index.php';
chdir(dirname(__FILE__));
require './controller/calendar/index.php';
chdir(dirname(__FILE__));
require_once './model/db_conn.php';

$db = new DB();

$db->connectDatabase();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $path = $_SERVER['QUERY_STRING'];
    $request_arr = explode('&', $path);
    $method_arr = explode('=', $request_arr[0]);
    switch ($method_arr[1]) {
        case "course":
            $course = new Course();
            echo urldecode (json_encode($course->index($request_arr[1])));
            break;
        case "user":
            $user = new User();
            echo urldecode (json_encode($user->index($request_arr[1])));
            break;
        case "score":
            $score = new Score();
            echo urldecode (json_encode($score->index($request_arr[1])));
            break;
        case "notification":
            $notification = new Notification();
            echo urldecode (json_encode($notification->index($request_arr[1])));
            break;
        case "calendar":
            $calendar = new Calendar();
            echo urldecode (json_encode($calendar->index($request_arr[1])));
            break;
        default:
            echo json_encode(array(
                'code' => 404
            ));
            break;
    }
}
else{
    echo json_encode($result = array(
        'code' => 405,
        'message' => 'Method Not Allowed',
    ));
}