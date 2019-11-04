<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 03/11/19
 * Time: 18:57
 */

namespace Matican;


use Matican\Core\Perform;

class MessageManager
{
    public static function send($messageObject)
    {
        return Perform::sync($messageObject, "send", "message");
    }
}