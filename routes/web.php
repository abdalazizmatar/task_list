<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;

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
Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('tasks'));
});

Route::post('/store', function () {
    $task_name = $_POST['name'];

    DB::table('tasks')->insert([
        'name' => $task_name
    ]);

    return redirect('/tasks');
});
/////////////////////////////////////////////////////////////////////////

// 3. حل المشروع الثالث التعامل مع قواعد البيانات في لارافل(الجزء الثالث+ الرابع + الخامس)
Route::get('tasks', function () {
    $tasks =  DB::table('tasks')->get();

    return view(view: 'tasks', data: compact(var_name: 'tasks'));
});

Route::post(uri: 'store', action: function (){
    $task_name = $_POST['name'];
    DB::table(table: 'tasks')->insert(values: ['name' => $task_name]);

    return redirect()->back();
});


Route::post(uri: 'tasks/delete/{id}', action: function ($id) {
    DB::table(table: 'tasks')->where(column: 'id', operator: '=', value: $id)->delete();

    return redirect()->back();
});


Route::post('tasks/edit/{id}', function ($id) {
    $task = DB::table(table: 'tasks')->where(column: 'id', operator: '=', value: $id)->first();
    $tasks = DB::table(table: 'tasks')->get();

    return view(view: 'tasks', data: compact('task', 'tasks'));
});

Route::post(uri: 'tasks/update', action: function () {
    $id = $_POST['id'];
    $update_task_name = $_POST['name'];

    DB::table(table: 'tasks')->where(column: 'id', operator: '=', value: $id)->update(['name' => $update_task_name]);

    return redirect(to: 'tasks');
});


// 4. Fourth Project: Implement Users CRUD via Controllers and integrate Blade template inheritance
Route::get(uri: 'users', action: [UserController::class, 'index']);

Route::post(uri: 'users/create', action: [UserController::class, 'create']);

Route::post(uri: 'users/delete/{id}', action: [UserController::class, 'destroy']);

Route::post(uri: 'users/edit/{id}', action: [UserController::class, 'edit']);

Route::post(uri: 'users/update', action: [UserController::class, 'update']);


Route::get('app', function(){
    return view('layouts.app');
});
// Route::get('tasks', [taskController::class, 'index']);
// Route::post('store', [taskController::class, 'create']);
// Route::post('tasks/delete/{id}', [taskController::class, 'destroy']);
// Route::post('tasks/edit/{id}', [taskController::class, 'edit']);
// Route::post('tasks/update', [taskController::class, 'update']);



Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/store', [TaskController::class, 'create']);
Route::post('/tasks/delete/{id}', [TaskController::class, 'destroy']);
Route::post('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::post('/tasks/update', [TaskController::class, 'update']);
