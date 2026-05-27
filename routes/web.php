<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about' , function() {
    $name = 'abdalaziz' ;
      $departments = [
        '1' => 'Tichnical' ,
        '2' => 'Financial' ,
        '3' => 'Sales' ,
    ];

    return view(view: 'about' , data: compact('name' ,'departments'));
    //return view ('about', ['name' => $name]);
    //return view('about')->with('name', $name);
});
Route::post('/about' , function(){
    $name =$_POST['name'];
    $departments = [
        '1' => 'Tichnical' ,
        '2' => 'Financial' ,
        '3' => 'Sales' ,
    ];

    return view(view: 'about',data: compact('name' , 'departments'));
});
