<?php

namespace Shishire\ProboscisTest\ResponseObject;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ResponseObject\Repo;

class RepoTest extends TestCase
{
    /**
     * @depends Shishire\ProboscisTest\ResponseObject\UserTest::testGetRepo
     */
    public function testGetName(Repo $repo)
    {
        $name = $repo->getName();
        $this->assertThat($name, $this->isType('string'));
        $this->assertSame($name, 'proboscis');
    }
}
