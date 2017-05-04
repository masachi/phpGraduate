<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午5:26
 */

chdir(dirname(__FILE__));

require './course_list.php';

$course_list = new CourseList();

class Course
{
    function index($request_params)
    {
        $result = array(
            'code' => 404,
        );
        $method = explode('=', $request_params);
        switch ($method[1]) {
            case "course_list":
                global $course_list;
                return $course_list->getCourseList();
                break;
            default:
                break;
        }

        return $result;
    }
}