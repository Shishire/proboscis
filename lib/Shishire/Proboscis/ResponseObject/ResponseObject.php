<?php

namespace Shishire\Proboscis\ResponseObject;

use \Buzz\Message\Request;
use \Buzz\Message\Response;
use \Buzz\Util\Url;
use \Buzz\Client\Curl;

abstract class ResponseObject
{
    protected $request = null;
    protected $response = null;

    protected function lazyLoad()
    {
        if(is_null($this->response))
        {
            // Do Request
            $requestUrl = new Url($this->getRequestUrl());

            $request = new Request();
            $request->fromUrl($requestUrl);

            $response = new Response();

            $client = new Curl();
            $client->setOption(CURLOPT_USERAGENT, 'Shishire/Proboscis - PHP Wrapper for Github API');

            $client->send($request, $response);

            $this->request = $request;
            $this->response = $response;

            $this->unpackResponse($this->response);
        }
    }
    
    abstract protected function getRequestUrl();
    abstract protected function unpackResponse(Response $response);
}
