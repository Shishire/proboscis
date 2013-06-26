<?php

namespace Shishire\Proboscis\ResponseObject;

class User extends ResponseObject
{
    public function __construct($userId)
    {
        $this->userId = $userId;
    }
    public function getName()
    {
        return $this->getAttribute('name');
    }

    public function getAttribute($attribute)
    {
        $this->lazyLoad();
        return $this->attributes[$attribute];
    }
    
    protected function getRequestUrl()
    {
        return sprintf('https://api.github.com/users/%s', $this->userId);
    }
    protected function unpackResponse($response)
    {
        $this->attributes = json_decode($response, true);
    }
}
