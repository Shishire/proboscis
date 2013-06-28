<?php

namespace Shishire\Proboscis\ResponseObject;

use \Shishire\Proboscis\RestClient;
use \Buzz\Message\Response;
use \Buzz\Util\Url;

abstract class ResponseObject
{
    protected $request = null;
    protected $response = null;

    protected function lazyLoad()
    {
        if(is_null($this->response))
        {
            // Do Request
            $client = RestClient::requestBuilder();

            $requestUrl = new Url($this->getRequestUrl());

            $client->setUrl($requestUrl);

            $client->executeRequest();

            $this->request = $client->getRequest();
            $this->response = $client->getResponse();

            $this->unpackResponse($this->response);
        }
    }

    abstract protected function getRequestUrl();
    abstract protected function unpackResponse(Response $response);
}
