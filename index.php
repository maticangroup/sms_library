<?php
require __DIR__ . '/vendor/autoload.php';

//$contactGroup = new \Matican\Models\ContactGroup();
//$contactGroup->setColor("#30419b");
//$contactGroup->setGroupName("گروه عضو شده متقاضی پرداخت اقساطی");
//
//print_r(\Matican\ContactManager::addContactGroup($contactGroup));
//
//die("sss");


//$contact = new \Matican\Models\Contact();
//$contact->setGroupId(61096);
//$contact->setFirstName("Ehsan");
//$contact->setLastName("Rezvanian");
//$contact->setEmojiId(1);
//$contact->setMobile("09128844756");


//print_r(\Matican\ContactManager::add($contact));
//die("sss");
$message = new \Matican\Models\Message();
$message->setMessage("سلام قربانی عزیز این یک تست اس ام اس می باشد.");
$message->setMobileNumber("09120342273");

print_r(\Matican\MessageManager::send($message));