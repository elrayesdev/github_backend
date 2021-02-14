<?php

namespace App\Classes;

class Sorting{

    public $sortBy;
    public $order;

    public function __construct($sortBy, $order)
    {
        $this->sortBy = $sortBy;
        $this->order = $order;
    }


    public function toString(){
        $sorting = ''.$this->stringSortBy();
        $sorting.= "&".$this->stringOrder();

        return $sorting;
    }


    protected function stringSortBy(){
        return "sort=".$this->sortBy;
    }

    protected function stringOrder(){
        return "order=".$this->order;
    }
}
