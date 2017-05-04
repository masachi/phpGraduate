<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/5/4
 * Time: 下午5:14
 */

chdir(dirname(__FILE__));

require './exam_list.php';

class Calendar{
    function index($request_params){
        $exam_list = new ExamList();
        return $exam_list->getExamDate();
    }
}