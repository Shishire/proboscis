<?php

namespace Shishire\ProboscisTest\ResponseObject;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ResponseObject\UserRepos;

class UserReposTest extends TestCase
{
    /**
     * @depends Shishire\ProboscisTest\ResponseObject\UserTest::testGetRepos
     */
    public function testPreFetch(UserRepos $repos)
    {
        $repos->fetchAllPages();
        foreach($repos as $repo)
        {
            $repoName = $repo->getName()
            $this->assertThat($repoName, $this->isType('string'));
        }
    }

    /**
     * @depends Shishire\ProboscisTest\ResponseObject\UserTest::testGetRepos
     */
    public function testLazyFetch(UserRepos $repos)
    {
        do
        {
            foreach($repos as $repo)
            {
                $repoName = $repo->getName()
                $this->assertThat($repoName, $this->isType('string'));
            }
        }
        while($repos->hasNextPage() && $repos->getNextPage());
    }

    /**
     * @depends Shishire\ProboscisTest\ResponseObject\UserTest::testGetRepos
     */
    public function testLimitedFetch(UserRepos $repos)
    {
        for($i = 0; $i < 3; $i++)
        {
            foreach($repos as $repo)
            {   
                $repoName = $repo->getName()
                $this->assertThat($repoName, $this->isType('string'));
            }   

            if($repos->hasNextPage())
            {   
                $repos->getNextPage();
            }   
            else
            {   
                break;
            }   
        }
    }
}
