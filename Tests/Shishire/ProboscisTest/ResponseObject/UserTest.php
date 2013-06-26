<?php

namespace Shishire\ProboscisTest\ResponseObject;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ResponseObject\User;

class UserTest extends TestCase
{
    /**
     * @depends Shishire\ProboscisTest\RestClientTest::testGetUser
     */
     public function testGetName(User $user)
     {
        $name = $user->getName();
        $this->assertThat($name, $this->isType('string'));
        $this->assertSame($name, 'Wesley Hirsch');
     }
}
