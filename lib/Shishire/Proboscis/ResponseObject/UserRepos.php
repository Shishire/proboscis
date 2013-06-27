<?php

namespace Shishire\Proboscis\ResponseObject;

use \Buzz\Message\Response;
use \Shishire\Proboscis\Util\PaginationLinks;

class UserRepos extends ResponseObject implements \IteratorAggregate
{
    protected $paginated = true;
    protected $unpackAppend = false;

    protected $repoList = array();
    protected $paginateLink = false;
    protected $paginationLinks = false;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    protected function getRequestUrl()
    {
        if($this->paginateLink)
        {
            return $this->paginateLink;
        }
        else
        {
            return sprintf('https://api.github.com/users/%s/repos', $this->userId);
        }
    }

    protected function unpackResponse(Response $response)
    {
        $responseArray = json_decode($response->getContent(), true);
        if($this->unpackAppend)
        {
            $this->repoList = array_merge($this->repoList, $responseArray);
        }
        else
        {
            $this->repoList = $responseArray;
            $this->generateRepoObjects();
        }

        $this->paginationLinks = false;
    }
    
    public function getIterator()
    {
        $this->lazyLoad();
        return new \ArrayIterator($this->repoList);
    }

    public function fetchAllPages()
    {
        $this->unpackAppend = true;

        $this->lazyLoad();
        do
        {
            $this->getNextPage();
            $this->lazyLoad();
        }
        while($this->hasNextPage());

        $this->generateRepoObjects();

        $this->unpackAppend = false;
    }

    public function getNextPage()
    {
        if($nextLink = $this->getNextLink())
        {
            $this->paginateLink = $nextLink;
            $this->response = null;
            $this->request = null;
        }
    }
    public function hasNextPage()
    {
        return $this->getNextLink() !== false;
    }

    protected function getNextLink()
    {
        if(!$this->paginationLinks)
        {
            $headerLinks = $this->response->getHeader('Link');
            if($headerLinks)
            {
                $this->paginationLinks = new PaginationLinks($headerLinks);
            }
            else
            {
                return false;
            }
        }
        return $this->paginationLinks->getNext();
    }

    protected function generateRepoObjects()
    {
        foreach($this->repoList as &$repoHash)
        {
            if(is_array($repoHash))
            {
                $repoHash = new PartialRepo($repoHash);
            }
        }
    }
}
