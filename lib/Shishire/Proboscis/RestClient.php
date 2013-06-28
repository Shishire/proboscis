<?php

namespace Shishire\Proboscis;

use \Buzz\Client\Curl as CurlClient;
use \Buzz\Message\Request;
use \Buzz\Message\Response;

static class RestClient
{
    protected static $accessToken;
    
    public static function setAccessToken($token)
    {
        static::$accessToken = $token;
    }
    
    public static function buzzClientFactory()
    {
        $client = new CurlClient();
        $client->setOption(CURLOPT_USERAGENT, 'Shishire/Proboscis - PHP Wrapper for Github API');
        return $client;
    }
    
    public static function buzzRequestFactory()
    {
        $request = new Request();
        $request->addHeader(sprintf('Authorization: token %s', static::$accessToken));
        return $request;
    }
    
    public static function buzzResponseFactory()
    {
        $response = new Response();
        return $response;
    }
}