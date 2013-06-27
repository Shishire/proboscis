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

    /**
     * @depends Shishire\ProboscisTest\RestClientTest::testGetUser
     */
    public function testGetLogin(User $user)
    {
        $login = $user->getLogin();
        $this->assertThat($login, $this->isType('string'));
        $this->assertSame($login, 'Shishire');
    }

    /**
     * @depends Shishire\ProboscisTest\RestClientTest::testGetUser
     */
    public function testGetId(User $user)
    {
        $id = $user->getId();
        $this->assertThat($id, $this->isType('int'));
        $this->assertSame($id, 848519);
    }

    /**
     * @depends Shishire\ProboscisTest\RestClientTest::testGetUser
     */
    public function testGetType(User $user)
    {
        $type = $user->getType();
        $this->assertThat($type, $this->isType('string'));
        $this->assertSame($type, 'User');
    }

    /**
     * @depends Shishire\ProboscisTest\RestClientTest::testGetUser
     */
    public function testGetAvatarUrl(User $user)
    {
        $avatarUrl = $user->getAvatarUrl();
        $this->assertThat($avatarUrl, $this->isType('string'));
        $this->assertThat($avatarUrl, $this->logicalOr($this->stringStartsWith('http://'), $this->stringStartsWith('https://')));
    }

    /**
     * @depends Shishire\ProboscisTest\RestClientTest::testGetUser
     */
    public function testGetAttribute(User $user)
    {
        $id = $user->getAttribute('id');
        $this->assertThat($id, $this->isType('int'));
        $this->assertSame($id, 848519);

        $nonExistant = $user->getAttribute('non-existant');
        $this->assertSame($nonExistant, null);
    }

    /**
     * @depends Shishire\ProboscisTest\RestClientTest::testGetUser
     */
    public function testGetRepo(User $user)
    {
        $repo = $user->getRepo('proboscis');
        $this->assertInstanceOf('\Shishire\Proboscis\ResponseObject\Repo', $repo);

        return $repo;
    }

    /**
     * @depends Shishire\ProboscisTest\RestClientTest::testGetUser
     */
    public function tesGetRepos(User $user)
    {
        $repos = $user->getRepos();
        $this->assertInstanceOf('\Shishire\Proboscis\ResponseObject\UserRepos', $repos);

        return $repos;
    }
}
