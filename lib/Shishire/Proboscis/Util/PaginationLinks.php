<?php

namespace Shishire\Proboscis\Util;

class PaginationLinks
{
    protected $links;

    public function __construct($linkHeader = false)
    {
        $unparsedLinks = array_map('trim', explode(',', $linkHeader));
        $links = array();
        foreach($unparsedLinks as $unparsedLink)
        {
            $matches = array();
            preg_match('/<(.*)>; rel="(.*)"/', $unparsedLink, $matches);

            if(isset($matches[2]))
            {
                $links[$matches[2]] = $matches[1];
            }
        }
        
        $this->links = $links;
    }

    public function getFirst()
    {
        return $this->getRel('first');
    }
    public function getNext()
    {
        return $this->getRel('next');
    }
    public function getPrev()
    {
        return $this->getRel('prev');
    }
    public function getLast()
    {
        return $this->getRel('last');
    }

    public function getRel($rel)
    {
        if(isset($this->links[$rel]))
            return $this->links[$rel];
        else
            return false;
    }

}
