<?php

namespace Shishire\ProboscisTest;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\RestClient;

class RestClientTest extends TestCase
{
    public function testRestClient()
    {
        $restClient = new RestClient();
        $this->assertInstanceOf('\Shishire\Proboscis\RestClient', $restClient);

        return $restClient;
    }
}