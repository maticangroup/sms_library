<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 31/10/19
 * Time: 16:57
 */

namespace Matican\Core;


class URLs
{
    public static function get($entity, $action)
    {
        if ($entity == 'contact' && $action == 'add') {
            return "https://api.sms.ir/users/v1/Contacts/AddContacts";
        }
        if ($entity == 'contactGroup' && $action == 'addAndUpdate') {
            return "https://api.sms.ir/users/v1/Contacts/AddOrUpdateContactGroup";
        }
        if ($entity == 'contactGroup' && $action == 'delete') {
            return "https://api.sms.ir/users/v1/Contacts/DeleteContactGroup";
        }
        if ($entity == 'draftMessage' && $action == 'addAndUpdate') {
            return "https://api.sms.ir/users/v1/DraftMessage/AddOrUpdateDraftMessage";
        }
        if ($entity == 'message' && $action == 'send') {
            return "https://api.sms.ir/users/v1/Message/SendByMobileNumbers";
        }
    }

    public static function token()
    {
        return "https://api.sms.ir/users/v1/Token/GetToken";
    }
}