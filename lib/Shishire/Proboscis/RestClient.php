<?php

namespace Shishire\Proboscis;

use \Shishire\Proboscis\ResponseObject\User;

class RestClient
{
    public function getUser($username)
    {
        return new User($username);
    }
}
