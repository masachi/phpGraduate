<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午5:21
 */

chdir(dirname(__FILE__));

require './profile.php';

$profile = new Profile();

Class User{
    function index($request_params){
        $result = array(
            'code' => 200,
        );
        $method = explode('=', $request_params);
        switch ($method[2]){
            case "login":
                break;
            case "profile":
                global $profile;
                return $profile->getProfile();
                break;
        }

        return $result;
    }
}