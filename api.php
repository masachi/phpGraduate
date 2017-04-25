<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午3:43
 */
require './controller/user/index.php';
require './controller/score/index.php';
require './controller/course/index.php';
require './controller/notification/index.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $path = $_SERVER['PATH_INFO'];
    $request_arr = explode('/', $path);
    switch ($request_arr[1]) {
        case "course":
            break;
        case "user":
            $user = new User();
            echo json_encode($user->index($request_arr[2]));
            break;
        case "score":
            break;
        case "notification":
            break;
        default:
            break;
    }
}
else{
    echo json_encode($result = array(
        'code' => 405,
        'message' => 'Method Not Allowed',
    ));
}