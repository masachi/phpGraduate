<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/5/4
 * Time: 下午5:14
 */

chdir(dirname(__FILE__));

require './exam_list.php';

$exam_list = new ExamList();

chdir(dirname(__FILE__));

require './date_list.php';

$date_list = new DateList();


class Calendar{
    function index($request_params){
        $result = array(
            'code' => 404,
        );
        $method = explode('=', $request_params);
        switch ($method[1]) {
            case "exam_list":
                global $exam_list;
                return $exam_list->getExamDate();
                break;
            case "date_list":
                global $date_list;
                return $date_list->getAllDate();
            default:
                break;
        }

        return $result;
    }
}