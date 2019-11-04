<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 03/11/19
 * Time: 10:33
 */

namespace Matican\Models;


class Contact
{
    private $prefix;
    private $firstName;
    private $lastName;
    private $mobile;
    private $emojiId;
    private $groupId;

    /**
     * @return mixed
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param mixed $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getEmojiId()
    {
        return $this->emojiId;
    }

    /**
     * @param int $emojiId
     */
    public function setEmojiId($emojiId)
    {
        $this->emojiId = $emojiId;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param integer $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    public function __toString()
    {
        $body = [
            'contactsDetails' => [
                [
                    'Prefix' => $this->getPrefix(),
                    'FirstName' => $this->getFirstName(),
                    'LastName' => $this->getLastName(),
                    'Mobile' => $this->getMobile(),
                    'EmojiId' => $this->getEmojiId()
                ]
            ],
            'GroupId' => $this->getGroupId()
        ];
        $jsonBody = json_encode($body);

        return $jsonBody;
    }

}