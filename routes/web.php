<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::get('/', function () {
    return view('dashboard');
});
Route::resource('grade', GradeController::class);
Route::resource('classroom', ClassroomController::class);



