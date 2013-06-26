<?php

namespace Shishire\Proboscis\ResponseObject;

abstract class ResponseObject
{
    protected function lazyLoad()
    {
        // Do Request
        $requestUrl = $this->getRequestUrl();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, 'Shishire/Proboscis - PHP Wrapper for Github API');
        curl_setopt($ch, CURLOPT_URL, $requestUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $this->response = curl_exec($ch);
        curl_close($ch);

        $this->unpackResponse($this->response);
    }
    
    abstract protected function getRequestUrl();
    abstract protected function unpackResponse($response);
}
