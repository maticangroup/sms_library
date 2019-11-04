<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 03/11/19
 * Time: 12:25
 */

namespace Matican\Models;


class Message
{
    /**
     * @var $message string
     */
    private $message;
    /**
     * @var $mobileNumber string
     */
    private $mobileNumber;

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * @param string $mobileNumber
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }


    public function __toString()
    {
        $message = [
            "Message" => $this->getMessage(),
            "MobileNumbers" => [$this->getMobileNumber()],
            "CanContinueInCaseOfError" => true
        ];
        $json_Message = json_encode($message);
//        print_r($json_Message);
//        die;
        return $json_Message;
    }


}