<?php

namespace Shishire\Proboscis\ResponseObject;

use \Buzz\Message\Response;

class Repo extends ResponseObject
{
    protected $attributes;

    public function __construct($userId, $repoName)
    {
        $this->userId = $userId;
        $this->repoName = $repoName;
    }
    public function getName()
    {
        return $this->getAttribute('name');
    }

    public function getAttribute($attribute)
    {
        $this->lazyLoad();
        if(isset($this->attributes[$attribute]))
            return $this->attributes[$attribute];
        else
            return null;
    }

    protected function getRequestUrl()
    {
        return sprintf('https://api.github.com/repos/%s/%s', $this->userId, $this->repoName);
    }
    protected function unpackResponse(Response $response)
    {
        $this->attributes = json_decode($response->getContent(), true);
    }
}
