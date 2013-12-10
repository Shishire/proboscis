<?php

namespace Shishire\ProboscisTest;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ApiClient;

class SystemTest extends TestCase
{
	public function testGetLatestCommit()
	{
		$apiClient = new ApiClient();
		$this->assertStringMatchesFormat('%x', $apiClient->getUser('Shishire')->getRepo('proboscis')->getCommitForRef('master')->getHash());
	}
}
