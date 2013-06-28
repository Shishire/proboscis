<?php

namespace Shishire\ProboscisTest;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ApiClient;
use \Shishire\Proboscis\ResponseObject\User;

class ApiClientTest extends TestCase
{
    public function testApiClient()
    {
        $apiClient = new ApiClient();
        $this->assertInstanceOf('\Shishire\Proboscis\ApiClient', $apiClient);

        return $apiClient;
    }

    /**
     * @depends testApiClient
     */
    public function testGetUser(ApiClient $apiClient)
    {
        $userShishire = $apiClient->getUser('Shishire');

        $this->assertInstanceOf('\Shishire\Proboscis\ResponseObject\User', $userShishire);

        return $userShishire;
    }
}
