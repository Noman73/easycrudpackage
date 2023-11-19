<?php



Route::group(['prefix'=>'easy-crud','namespace'=>"Noman\Easycrud\Http\Controllers"],function(){

    Route::get('/',function(){
        return view('easycrud::test');
    });
    Route::resource('/forms',"FormController");
    Route::get('/noman',function(){
        return view('easycrud::test');
    });
});