<?php



Route::group(['prefix'=>'easy-crud','namespace'=>"Noman\Easycrud\Http\Controllers"],function(){

    Route::get('/',function(){
        $data=[
            "title"=>"Test"
        ];
        return view('easycrud::test',compact('data'));
    });
    Route::resource('/forms',"FormController");
    Route::get('/noman',function(){
        return view('easycrud::test');
    });
});