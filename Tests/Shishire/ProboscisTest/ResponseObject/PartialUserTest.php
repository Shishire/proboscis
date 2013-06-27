<?php

namespace Shishire\ProboscisTest\ResponseObject;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ResponseObject\PartialUser;

class PartialUserTest extends TestCase
{
    /**
     * @dataProvider generatePartialUser
     */
    public function testGetLogin(PartialUser $user)
    {
        $login = $user->getLogin();
        $this->assertThat($login, $this->isType('string'));
        $this->assertSame($login, 'Shishire');
    }

    public function generatePartialUser()
    {
        $jsonObject = <<<'EOFEOF'
    {
      "login": "Shishire",
      "id": 848519,
      "avatar_url": "https://secure.gravatar.com/avatar/bfbc41a9788f32b83e5591443a701c95?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png",
      "gravatar_id": "bfbc41a9788f32b83e5591443a701c95",
      "url": "https://api.github.com/users/Shishire",
      "html_url": "https://github.com/Shishire",
      "followers_url": "https://api.github.com/users/Shishire/followers",
      "following_url": "https://api.github.com/users/Shishire/following{/other_user}",
      "gists_url": "https://api.github.com/users/Shishire/gists{/gist_id}",
      "starred_url": "https://api.github.com/users/Shishire/starred{/owner}{/repo}",
      "subscriptions_url": "https://api.github.com/users/Shishire/subscriptions",
      "organizations_url": "https://api.github.com/users/Shishire/orgs",
      "repos_url": "https://api.github.com/users/Shishire/repos",
      "events_url": "https://api.github.com/users/Shishire/events{/privacy}",
      "received_events_url": "https://api.github.com/users/Shishire/received_events",
      "type": "User"
    }
EOFEOF;
        return array(
                      array( new PartialUser(json_decode($jsonObject, true)) )
                    );

    }
}
