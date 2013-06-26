<?php

namespace Shishire\ProboscisTest;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\RestClient as RestClient;
use \Shishire\Proboscis\ResponseObject\User;

class RestClientTest extends TestCase
{
    public function testRestClient()
    {
        $restClient = new RestClient();
        $this->assertInstanceOf('\Shishire\Proboscis\RestClient', $restClient);

        return $restClient;
    }

    /**
     * @depends testRestClient
     */
    public function testGetUser(RestClient $restClient)
    {
        $userShishire = $restClient->getUser('Shishire');

        $this->assertInstanceOf('\Shishire\Proboscis\ResponseObject\User', $userShishire);

        return $userShishire;
    }
}
