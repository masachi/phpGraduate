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
        switch ($request_params){
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