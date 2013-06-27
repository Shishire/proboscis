<?php

namespace Shishire\Proboscis\ResponseObject;

use \Buzz\Message\Response;

class PartialRepo extends PartialResponseObject
{
    protected $attributes;

    public function __construct($repoHash)
    {
        $this->attributes = $repoHash;
        $this->userId = $this->getOwner()->getLogin();
        $this->repoName = $this->getName();
    }
    public function getName()
    {
        return $this->getAttribute('name');
    }

    public function getOwner()
    {
        return new PartialUser($this->getAttribute('owner'));
    }

    public function getAttribute($attribute)
    {
        if(isset($this->attributes[$attribute]))
            return $this->attributes[$attribute];
        else
            return null;
    }

    public function getFullRepo()
    {
        return new Repo($this->userId, $this->repoName);
    }
}
