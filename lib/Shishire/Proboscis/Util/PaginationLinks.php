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
            list($linkDirty, $relDirty) = array_map('trim', explode(';', $unparsedLink));
            $rel = preg_replace('/rel="(.*)"/', '\1', $relDirty);
            $link = preg_replace('/<(.*)>/', '\1', $linkDirty);
            $links[$rel] = $link;
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
