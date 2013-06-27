<?php

namespace Shishire\Proboscis\ResponseObject;

use \Buzz\Message\Response;

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
    public function getLogin()
    {
        return $this->getAttribute('login');
    }
    public function getId()
    {
        return $this->getAttribute('id');
    }
    public function getType()
    {
        return $this->getAttribute('type');
    }
    public function getAvatarUrl()
    {
        return $this->getAttribute('avatar_url');
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
        return sprintf('https://api.github.com/users/%s', $this->userId);
    }
    protected function unpackResponse(Response $response)
    {
        $this->attributes = json_decode($response->getContent(), true);
    }

    public function getRepo($repoName)
    {
        return new Repo($this->getLogin(), $repoName);
    }

    public function getRepos()
    {
        return new UserRepos($this->getLogin());
    }
}
