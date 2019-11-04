<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 31/10/19
 * Time: 17:12
 */

namespace Matican\Core;


class Perform
{
    private static function execute($postData, $url, $token)
    {
//        echo $postData;
//        die("here");
//        $postString = json_encode($postData);
        $postString = $postData;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'x-sms-ir-secure-token: ' . $token));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, $postString);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public static function sync($object, $action, $entity)
    {
//        echo (string)$object;
//        die("here");
        $token = Token::get();
        if ($token != false) {
            $url = URLs::get($entity, $action);
            $objectToBeSent = Perform::execute((string)$object, $url, $token);
            $jsonObject = json_decode($objectToBeSent);
            if (is_object($jsonObject)) {
                $result = $jsonObject;
            } else {
                $result = 'Error Getting Object.';
            }
        } else {
            $result = 'Error Getting Token Key.';
        }
        return $result;
    }
}