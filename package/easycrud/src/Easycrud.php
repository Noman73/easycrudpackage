<?php 

namespace Noman\Easycrud;
// use View;

class Easycrud{
    public function __construct($data)
    {
         $this->initPage($data);
    }

    public static function initPage($data)
    {
        return view("easycrud::views.easycrud.crud_maker",compact('data'))->render();
    }
}