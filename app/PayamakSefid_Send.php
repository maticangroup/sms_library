<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 31/10/19
 * Time: 16:15
 */

namespace Matican;


class PayamakSefid_Send
{
    /**    * Send Url.    *    * @return string Indicates the Url */
    protected function SendUrl()
    {
        return "https://api.sms.ir/users/v1/Message/Send";
    }

    /**    * gets Api Token Url.    *    * @return string Indicates the Url */
    protected function getApiTokenUrl()
    {
        return "https://api.sms.ir/users/v1/Token/GetToken";
    }

    /**    * gets config parameters for sending request.    *    * @param string $APIKey API Key    * @param string $SecretKey Secret Key    * @return void */
    public function __construct($APIKey, $SecretKey)
    {
        $this->APIKey = $APIKey;
        $this->SecretKey = $SecretKey;
    }

    /**    * Send.    *    * @param string $SendData Send Data    * @return string Indicates the Send result */
    public function Send($SendData)
    {
        $token = $this->GetToken($this->APIKey, $this->SecretKey);
        if ($token != false) {
            $url = $this->SendUrl();
            $Send = $this->execute($SendData, $url, $token);
            $object = json_decode($Send);
            if (is_object($object)) {
                $result = $object;
            } else {
                $result = 'Error Getting Object.';
            }
        } else {
            $result = 'Error Getting Token Key.';
        }
        return $result;
    }

    /**    * gets token key for all web service requests.    *    * @return string Indicates the token key */
    private function GetToken()
    {
        $postData = array('UserApiKey' => $this->APIKey, 'SecretKey' => $this->SecretKey);
        $postString = json_encode($postData);
        $ch = curl_init($this->getApiTokenUrl());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, count($postString));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result);
        if (is_object($response)) {
            if ($response->IsSuccessful == true) {
                @$resp = $response->TokenKey;
            } else {
                $resp = false;
            }
        }
        return $resp;
    }

    /**    * executes the main method.    *    * @param string $url url    * @param string $token token string    * @return string Indicates the curl execute result */
    private function execute($postData, $url, $token)
    {
        $postString = json_encode($postData);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'x-sms-ir-secure-token: ' . $token));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, count($postString));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}