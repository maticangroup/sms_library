<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 31/10/19
 * Time: 16:48
 */

namespace Matican;


use Matican\Core\Perform;
use Matican\Core\Token;
use Matican\Core\URLs;
use Matican\Models\ContactGroup;

class ContactManager
{

    /**
     * @param $contactObject \Matican\Models\Contact
     * @return mixed|string
     */
    public static function add($contactObject)
    {
        return Perform::sync($contactObject, 'add', 'contact');
    }

    public static function addContactGroup($contactGroupObject)
    {
        return Perform::sync($contactGroupObject, 'addAndUpdate', 'contactGroup');
    }

    /**
     * @param $contactGroupObject ContactGroup
     * @return mixed|string
     */
    public static function deleteContactGroup($contactGroupObject)
    {
        $messageBody = [
            'GroupIds' => [
                $contactGroupObject->getGroupId()
            ]];
        return Perform::sync(json_encode($messageBody), 'delete', 'contactGroup');
    }

    public function remove()
    {

    }

    public function search()
    {

    }


}