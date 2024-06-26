<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[AuthController::class,'login']);
Route::post('login',[AuthController::class,'AuthLogin']);
Route::get('logout',[AuthController::class,'logout']);






Route::group(['middleware' => 'admin'],function(){
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('admin/admin/list', function () {
        return view('admin.admin.list');
    });
});
Route::group(['middleware' => 'teacher'],function(){
    Route::get('teacher/dashboard', function () {
        return view('teacher.dashboard');
    });
});
Route::group(['middleware' => 'student'],function(){
    Route::get('student/dashboard', function () {
        return view('student.dashboard');
    });
});
Route::group(['middleware' => 'parent'],function(){
    Route::get('parent/dashboard', function () {
        return view('parent.dashboard');
    });
});
