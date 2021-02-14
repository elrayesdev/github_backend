<?php

namespace App\Classes;

class Filtering{

    public $perPage;
    public $pageNumber;

    public function __construct($perPage, $pageNumber)
    {
        $this->perPage = $perPage;
        $this->pageNumber = $pageNumber;
    }


    public function toString(){
        $sorting = ''.$this->stringPerPage();
        $sorting.= "&".$this->stringPageNumber();

        return $sorting;
    }


    protected function stringPerPage(){
        return "per_page=".$this->perPage;
    }

    protected function stringPageNumber(){
        return "page=".$this->pageNumber;
    }
}
