<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoyalController extends Controller
{
    public function index(){
        

        $data=
        [
           'form'=>[
            'name'=>'doyal',
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
                    'name'=>'email',
                    'label'=>'email',
                    'placeholder'=>'Enter Keyword',
                    'type'=>'text',
                    'classes'=>'form-control',
                ],
            ]
        ];
        return view("doyal.test",compact('data'));
    }
}
