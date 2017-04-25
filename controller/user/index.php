<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午5:21
 */
Class User{
    function index($request_params){
        $result = array(
            'code' => 200,
        );
        switch ($request_params){
            case "login":
                break;
            case "profile":
                break;
        }

        return $result;
    }
}