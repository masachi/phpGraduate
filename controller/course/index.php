<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午5:26
 */

chdir(dirname(__FILE__));

require './course_list.php';

chdir(dirname(__FILE__));

require './course_info.php';

$course_list = new CourseList();

$course_info = new CourseInfo();

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
            case "course_info":
                global $course_info;
                return $course_info->getCourseInfo();
                break;
            default:
                break;
        }

        return $result;
    }
}