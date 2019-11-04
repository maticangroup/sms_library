<?php
/**
 * Created by PhpStorm.
 * User: hossein
 * Date: 03/11/19
 * Time: 11:23
 */

namespace Matican\Models;


class ContactGroup
{
    /**
     * @var $groupId integer
     */
    private $groupId;
    /**
     * @var $groupName string
     */
    private $groupName;
    /**
     * @var $color string
     */
    private $color;


    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return string
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @param string $groupName
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    public function __toString()
    {
        $body = [
            'GroupId' => ($this->getGroupId()) ?
                $this->getGroupId() : 0,
            'GroupName' => $this->getGroupName(),
            'Color' => $this->getColor()
        ];
        $jsonBody = json_encode($body);

        return $jsonBody;
    }
}