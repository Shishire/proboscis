<?php

namespace Shishire\Proboscis;

use \Buzz\Client\Curl as CurlClient;
use \Buzz\Message\Request;
use \Buzz\Message\Response;

class RestClient
{
    protected static $accessToken;

    protected $request;
    protected $response;
    protected $client;

    public static function setAccessToken($token)
    {
        static::$accessToken = $token;
    }

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->client = new CurlClient();
    }

    public static function requestBuilder()
    {
        $restClient = new RestClient();
        if(static::$accessToken)
        {
            $restClient->addRequestHeader('Authorization', sprintf('token %s', static::$accessToken));
        }
        $restClient->setUserAgent('Shishire/Proboscis - PHP Wrapper for Github API');
        return $restClient;
    }

    public function addRequestHeader($name, $value)
    {
        $this->request->addHeader(sprintf('%s: %s', $name, $value));
    }

    public function setUserAgent($userAgent)
    {
        $this->client->setOption(CURLOPT_USERAGENT, $userAgent);
    }

    public function setUrl($url)
    {
        $this->request->fromUrl($url);
    }

    public function executeRequest()
    {
        $this->client->send($this->request, $this->response);
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
