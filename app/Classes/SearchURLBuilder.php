<?php

namespace App\Classes;

class SearchURLBuilder implements CanToBeURL
{
    public $query;
    public $sort;
    public $filter;

    public function __construct($query, $sort, $filter)
    {
        $this->query = $query;
        $this->sort = $sort;
        $this->filter = $filter;
    }

    public function toURL()
    {
        $url = "?";
        $url.= $this->query->toString();
        $url.= "&";
        $url.= $this->sort->toString();
        $url.= "&";
        $url.= $this->filter->toString();

        return $url;
    }
}
