<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午5:26
 */
chdir(dirname(__FILE__));

require './score_list.php';

$score_list = new ScoreList();
class Score{
    function index($request_params){
        $result = array(
            'code' => 404,
        );
        $method = explode('=', $request_params);
        switch ($method[1]) {
            case "score_list":
                global $score_list;
                return $score_list->getScoreList();
                break;
            default:
                break;
        }

        return $result;
    }
}