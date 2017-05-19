<?php
/**
 * Created by PhpStorm.
 * User: Masachi
 * Date: 2017/4/26
 * Time: 下午1:23
 */

require_once '../../model/db_conn.php';

class Profile
{

    function getProfile()
    {
        $number = $_POST['username'];

        $result = array(
            'code' => 200,
            'message' => 'success',
            'data' => [],
        );

        $sql = "select * from profile where number = {$number}";
        $db = new DB();

        $data = $db->select($sql);

        $i = 0;

        while ($row = mysql_fetch_row($data)) {
            $result['data'][$i] = array(
                'number' => urlencode ($row[1]),
                'name' => urlencode ($row[2]),
                'avatar' => urlencode ($row[3]),
                'academy' => urlencode ($row[4]),
                'faculty' => urlencode ($row[5]),
                'class' => urlencode ($row[6])
            );
            $i++;
        }

        return $result;
    }
}