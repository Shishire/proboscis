<?php

namespace Shishire\ProboscisTest\ResponseObject;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ResponseObject\ResponseObject;

class ResponseObjectTest extends TestCase
{
    public function testLazyLoad()
    {
        $stub = $this->getMockForAbstractClass('\Shishire\Proboscis\ResponseObject\ResponseObject');
        $stub->expects($this->once())
             ->method('getRequestUrl')
             ->will($this->returnValue('https://api.github.com/users/Shishire'));
        $stub->expects($this->once())
             ->method('unpackResponse');

        $method = new \ReflectionMethod($stub, 'lazyLoad');
        $method->setAccessible(true);
        $method->invoke($stub);
    }
}
