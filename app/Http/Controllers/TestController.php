<?php

namespace App\Http\Controllers;

use GuzzleHttp\Handler\EasyHandle;
use Illuminate\Http\Request;
// use Noman\Easycrud;
use Noman\Easycrud\Easycrud;

class TestController extends Controller
{
    public function index(){
        

        $data=
        [
           'form'=>[
            'name'=>'test',
           ],
           'datatable'=>[
            'name',
            'roll',
           ],
           'fields'=> [
                [
                    'name'=>'name',
                    'label'=>'Name',
                    'placeholder'=>'Enter Name',
                    'type'=>'text',
                    'classes'=>'form-control',
                    
                ],
                [
                    'name'=>'keyword',
                    'label'=>'Keyword',
                    'placeholder'=>'Enter Keyword',
                    'type'=>'text',
                    'classes'=>'form-control',
                ],
            ]
        ];
        $view= Easycrud::initPage($data);
        return view("test.test",compact('data','view'));
    }
}
