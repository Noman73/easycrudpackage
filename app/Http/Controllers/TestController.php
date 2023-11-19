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
            'description',
            'keyword',
            'parent',
           ],
           'route'=>route('forms.index'),
           'fields'=> [
                [
                    'name'=>'parent_id',
                    'label'=>'Parent',
                    'placeholder'=>'Select Parent',
                    'type'=>'select',
                    'classes'=>'form-control',
                    'options'=>[],
                    
                ],
                [
                    'name'=>'name',
                    'label'=>'Name',
                    'placeholder'=>'Enter Name',
                    'type'=>'text',
                    'classes'=>'form-control',
                    
                ],
                [
                    'name'=>'description',
                    'label'=>'Description',
                    'placeholder'=>'Enter Description',
                    'type'=>'textarea',
                    'classes'=>'form-control',

                ],
                [
                    'name'=>'keyword',
                    'label'=>'Keyword',
                    'placeholder'=>'Enter Keyword',
                    'type'=>'textarea',
                    'classes'=>'form-control',
                ],
                [
                    'name'=>'serial',
                    'label'=>'Serial',
                    'placeholder'=>'Enter Keyword',
                    'type'=>'number',
                    'classes'=>'form-control',
                ],
            ]
        ];
        $view= Easycrud::initPage($data);
        return view("test.test",compact('data','view'));
    }
}
