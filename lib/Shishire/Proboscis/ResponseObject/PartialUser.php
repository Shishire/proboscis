<?php

namespace Shishire\Proboscis\ResponseObject;

class PartialUser extends PartialResponseObject
{
    protected $attributes;

    public function __construct($userHash)
    {
        $this->attributes = $userHash;
        $this->userId = $this->getLogin();
    }
    public function getLogin()
    {
        return $this->getAttribute('login');
    }

    public function getAttribute($attribute)
    {
        if(isset($this->attributes[$attribute]))
            return $this->attributes[$attribute];
        else
            return null;
    }

    public function getFullUser()
    {
        return new User($this->userId);
    }
}
