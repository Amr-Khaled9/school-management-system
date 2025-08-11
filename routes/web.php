<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Students\StudentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::get('/', function () {
    return view('dashboard');
});
Route::resource('grade', GradeController::class);
Route::resource('classroom', ClassroomController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('student', StudentController::class);

Route::post('delete-all', [ClassroomController::class, 'delete_all'])->name('delete_all');
Route::post('filter-class', [ClassroomController::class, 'filter_class'])->name('filter_class');

Route::resource('section', SectionController::class);
Route::get('classes/{id}', [SectionController::class, 'getclass']);

// Get_classrooms
// Get_Sections
Route::get('/Get_classrooms/{id}', [StudentController::class,'Get_classrooms']);
Route::get('/Get_Sections/{id}',[StudentController::class,'Get_Sections']);
Route::view('add_perent', 'livewire.show_add_perent');
Route::view('table_perent', 'livewire.table_perent');
