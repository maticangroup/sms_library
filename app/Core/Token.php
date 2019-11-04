<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 31/10/19
 * Time: 17:01
 */

namespace Matican\Core;


use Matican\Config;

class Token
{
    public static function get()
    {
        $postData = array(
            'UserApiKey' => Config::$apiKey,
            'SecretKey' => Config::$secretKey
        );
        $postString = json_encode($postData);
        $ch = curl_init(URLs::token());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, count(json_decode($postString, true)));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result);
        if (is_object($response)) {
            if ($response->IsSuccessful == true) {
                @$response = $response->TokenKey;
            } else {
                $response = false;
            }
        }
        return $response;
    }
}