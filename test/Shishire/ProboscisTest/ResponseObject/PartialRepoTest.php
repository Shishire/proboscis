<?php

namespace Shishire\ProboscisTest\ResponseObject;

use \PHPUnit_Framework_TestCase as TestCase;
use \Shishire\Proboscis\ResponseObject\PartialRepo;

class PartialRepoTest extends TestCase
{
    /**
     * @dataProvider generatePartialRepo
     */
    public function testGetName(PartialRepo $repo)
    {
        $name = $repo->getName();
        $this->assertThat($name, $this->isType('string'));
        $this->assertSame($name, 'proboscis');
    }

    /**
     * @dataProvider generatePartialRepo
     */
    public function testGetOwner(PartialRepo $repo)
    {
        $owner = $repo->getOwner();
        $this->assertInstanceOf('\\Shishire\\Proboscis\\ResponseObject\\PartialUser', $owner);

        return $owner;
    }

    public function generatePartialRepo()
    {
        $jsonObject = <<<'EOFEOF'
  {
    "id": 10698838,
    "name": "proboscis",
    "full_name": "Shishire/proboscis",
    "owner": {
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
    },
    "private": false,
    "html_url": "https://github.com/Shishire/proboscis",
    "description": "A PHP wrapper library for the Github API v3",
    "fork": false,
    "url": "https://api.github.com/repos/Shishire/proboscis",
    "forks_url": "https://api.github.com/repos/Shishire/proboscis/forks",
    "keys_url": "https://api.github.com/repos/Shishire/proboscis/keys{/key_id}",
    "collaborators_url": "https://api.github.com/repos/Shishire/proboscis/collaborators{/collaborator}",
    "teams_url": "https://api.github.com/repos/Shishire/proboscis/teams",
    "hooks_url": "https://api.github.com/repos/Shishire/proboscis/hooks",
    "issue_events_url": "https://api.github.com/repos/Shishire/proboscis/issues/events{/number}",
    "events_url": "https://api.github.com/repos/Shishire/proboscis/events",
    "assignees_url": "https://api.github.com/repos/Shishire/proboscis/assignees{/user}",
    "branches_url": "https://api.github.com/repos/Shishire/proboscis/branches{/branch}",
    "tags_url": "https://api.github.com/repos/Shishire/proboscis/tags",
    "blobs_url": "https://api.github.com/repos/Shishire/proboscis/git/blobs{/sha}",
    "git_tags_url": "https://api.github.com/repos/Shishire/proboscis/git/tags{/sha}",
    "git_refs_url": "https://api.github.com/repos/Shishire/proboscis/git/refs{/sha}",
    "trees_url": "https://api.github.com/repos/Shishire/proboscis/git/trees{/sha}",
    "statuses_url": "https://api.github.com/repos/Shishire/proboscis/statuses/{sha}",
    "languages_url": "https://api.github.com/repos/Shishire/proboscis/languages",
    "stargazers_url": "https://api.github.com/repos/Shishire/proboscis/stargazers",
    "contributors_url": "https://api.github.com/repos/Shishire/proboscis/contributors",
    "subscribers_url": "https://api.github.com/repos/Shishire/proboscis/subscribers",
    "subscription_url": "https://api.github.com/repos/Shishire/proboscis/subscription",
    "commits_url": "https://api.github.com/repos/Shishire/proboscis/commits{/sha}",
    "git_commits_url": "https://api.github.com/repos/Shishire/proboscis/git/commits{/sha}",
    "comments_url": "https://api.github.com/repos/Shishire/proboscis/comments{/number}",
    "issue_comment_url": "https://api.github.com/repos/Shishire/proboscis/issues/comments/{number}",
    "contents_url": "https://api.github.com/repos/Shishire/proboscis/contents/{+path}",
    "compare_url": "https://api.github.com/repos/Shishire/proboscis/compare/{base}...{head}",
    "merges_url": "https://api.github.com/repos/Shishire/proboscis/merges",
    "archive_url": "https://api.github.com/repos/Shishire/proboscis/{archive_format}{/ref}",
    "downloads_url": "https://api.github.com/repos/Shishire/proboscis/downloads",
    "issues_url": "https://api.github.com/repos/Shishire/proboscis/issues{/number}",
    "pulls_url": "https://api.github.com/repos/Shishire/proboscis/pulls{/number}",
    "milestones_url": "https://api.github.com/repos/Shishire/proboscis/milestones{/number}",
    "notifications_url": "https://api.github.com/repos/Shishire/proboscis/notifications{?since,all,participating}",
    "labels_url": "https://api.github.com/repos/Shishire/proboscis/labels{/name}",
    "created_at": "2013-06-14T22:15:14Z",
    "updated_at": "2013-06-26T23:23:42Z",
    "pushed_at": "2013-06-26T23:23:42Z",
    "git_url": "git://github.com/Shishire/proboscis.git",
    "ssh_url": "git@github.com:Shishire/proboscis.git",
    "clone_url": "https://github.com/Shishire/proboscis.git",
    "svn_url": "https://github.com/Shishire/proboscis",
    "homepage": null,
    "size": 160,
    "watchers_count": 0,
    "language": "PHP",
    "has_issues": true,
    "has_downloads": true,
    "has_wiki": true,
    "forks_count": 0,
    "mirror_url": null,
    "open_issues_count": 0,
    "forks": 0,
    "open_issues": 0,
    "watchers": 0,
    "master_branch": "master",
    "default_branch": "master"
  }
EOFEOF;
        return array(
                      array( new PartialRepo(json_decode($jsonObject, true)) )
                    );
    }
}
