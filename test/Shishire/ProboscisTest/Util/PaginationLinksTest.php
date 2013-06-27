<?php

namespace Shishire\ProboscisTest\Util;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\Util\PaginationLinks;

class PaginationLinksTest extends TestCase
{
    /**
     * @dataProvider generateLinkHeader
     */
    public function testLinkParsing($linkHeader, $shouldHaveFirst, $shouldHaveNext, $shouldHavePrev, $shouldHaveLast, $additionalRels)
    {
        $paginationLinks = new PaginationLinks($linkHeader);

        $this->assertNotEquals($paginationLinks->getFirst(), !$shouldHaveFirst);
        $this->assertNotEquals($paginationLinks->getNext(), !$shouldHaveNext);
        $this->assertNotEquals($paginationLinks->getPrev(), !$shouldHavePrev);
        $this->assertNotEquals($paginationLinks->getLast(), !$shouldHaveLast);
        foreach($additionalRels as $rel)
        {
            $this->assertNotEmpty($paginationLinks->getRel($rel));
        }
    }

    public function generateLinkHeader()
    {
        return array(
                        array(
                                '<https://api.github.com/user/9919/repos?page=2&per_page=5>; rel="next", <https://api.github.com/user/9919/repos?page=20&per_page=5>; rel="last"', false, true, false, true, array()
                             ),
                        array(
                                '<https://api.github.com/user/9919/repos?page=3&per_page=5>; rel="next", <https://api.github.com/user/9919/repos?page=20&per_page=5>; rel="last", <https://api.github.com/user/9919/repos?page=1&per_page=5>; rel="first", <https://api.github.com/user/9919/repos?page=1&per_page=5>; rel="prev"', true, true, true, true, array()
                             ),
                        array(
                                '<https://api.github.com/user/9919/repos?page=4&per_page=5>; rel="next", <https://api.github.com/user/9919/repos?page=20&per_page=5>; rel="last", <https://api.github.com/user/9919/repos?page=1&per_page=5>; rel="first", <https://api.github.com/user/9919/repos?page=2&per_page=5>; rel="prev"', true, true, true, true, array()
                             ),
                        array(
                                '<https://api.github.com/user/9919/repos?page=1&per_page=5>; rel="first", <https://api.github.com/user/9919/repos?page=19&per_page=5>; rel="prev"', true, false, true, false, array()
                             ),
                        array(
                                'Invalid Link Header', false, false, false, false, array()
                             ),
                        array(
                                '<https://api.github.com/user/9919/repos?page=1&per_page=5>; rel="unknownRel"', false, false, false, false, array('unknownRel')
                             ),
                    );
    }
}
