<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

Route::get('/courses', function () {
    return view('courses');
});

Route::post('/store', function (Request $request) {

    DB::table('courses')->insert([
        'name' => $request->name
    ]);

    return view('courses');
});

