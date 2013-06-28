<?php

namespace Shishire\ProboscisTest;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ApiClient;
use \Shishire\Proboscis\ResponseObject\User;

class ApiClientTest extends TestCase
{
    public function testSetAccessToken()
    {
        $apiClient = new ApiClient();
        if($githubToken = getenv('GITHUB_API_TOKEN'))
        {
            $apiClient->setAccessToken($githubToken);
        }
        // Assert that ApiToken Works?
    }

    /**
     * @depends testSetAccessToken
     */
    public function testApiClient()
    {
        $apiClient = new ApiClient();
        $this->assertInstanceOf('\Shishire\Proboscis\ApiClient', $apiClient);
        if($githubToken = getenv('GITHUB_API_TOKEN'))
        {
            $apiClient->setAccessToken($githubToken);
        }

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
