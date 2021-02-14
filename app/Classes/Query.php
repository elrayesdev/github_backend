<?php

namespace App\Classes;

class Query{

    public $date;
    public $language;

    public function __construct($date, $language=null)
    {
        $this->date = $date;
        $this->language = $language;
    }

    public function toString(){
        $query = "q=";
        $query.= $this->stringDate();

        if ($this->language)
            $query.= "+".$this->stringLanguage();

        return $query;
    }

    protected function stringDate($operator = '>'){
        return "date:".$operator.$this->date;
    }

    protected function stringLanguage(){
        return "language:".$this->language;
    }

}
