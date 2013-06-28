<?php

namespace Shishire\Proboscis;

use \Shishire\Proboscis\ResponseObject\User;

class ApiClient
{
    public function getUser($username)
    {
        return new User($username);
    }
    
    public function setAccessToken($token)
    {
        RestClient::setAccessToken($token);
    }
}