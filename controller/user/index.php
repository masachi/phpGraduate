<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/25
 * Time: 下午5:21
 */

chdir(dirname(__FILE__));

require './profile.php';

chdir(dirname(__FILE__));

require './timeoff.php';

chdir(dirname(__FILE__));

require './device.php';

$timeoff = new Timeoff();
$profile = new Profile();
$device = new Device();

Class User{
    function index($request_params){
        $result = array(
            'code' => 404,
        );
        $method = explode('=', $request_params);
        switch ($method[1]){
            case "login":
                break;
            case "profile":
                global $profile;
                return $profile->getProfile();
                break;
            case "timeoff":
                global $timeoff;
                return $timeoff->addTimeOff();
                break;
            case "device":
                global $device;
                return $device->insertDevice();
                break;
            default:
                break;
        }

        return $result;
    }
}