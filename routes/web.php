<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
 use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teachers\QuestionTeacherController;
use App\Http\Controllers\Teachers\QuizzeTeacherController;
use App\Http\Controllers\Teachers\StudendTeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Attendences\AttendenceController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Fees\Fees_invoice;
use App\Http\Controllers\Fees\FeesController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\promotions\PromotionController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Quizzes\QuizzeController;
use App\Http\Controllers\Receipts\ReceiptStudentsController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\OnlineClassController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Models\Teacher;



//Route::get('/', [HomeController::class,'index'])->name('index');


Route::get('/', function () {
    return view('selection'); // صفحة اختيار النوع
})->name('selection');

// Login forms
Route::get('/login/{type}', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::prefix('web')->middleware('auth:web')->group(function() {
    Route::view('/dashboard', 'dashboard')->name('web.dashboard');
});
Route::prefix('student')->middleware('auth:student')->group(function() {
    Route::view('/dashboard', 'students.dashboard')->name('student.dashboard');
});

Route::prefix('teacher')->middleware('auth:teacher')->group(function() {
      Route::view('/dashboard', 'teachers.dashboard')->name('teacher.dashboard');
      Route::resource('students',StudendTeacherController::class);
      Route::resource('quizzes',QuizzeTeacherController::class);
      Route::resource('questions',QuestionTeacherController::class);
      Route::get('section',[StudendTeacherController::class,'section'])->name('sections');
      Route::post('attendance',[StudendTeacherController::class,'attendance'])->name('attendance');
      Route::post('attendance/edit/{test}',[StudendTeacherController::class,'attendanceEdit'])->name('attendance.edit');
      Route::get('attendance/report',[StudendTeacherController::class,'attendanceReport'])->name('attendance.report');
      Route::post('attendance/Seacrh',[StudendTeacherController::class,'attendanceSearch'])->name('attendance.search');
});

Route::prefix('perent')->middleware('auth:perent')->group(function() {
    Route::view('/dashboard', 'perents.dashboard')->name('perent.dashboard');
});

Route::resource('grade', GradeController::class);
Route::resource('classroom', ClassroomController::class);
Route::resource('section', SectionController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('student', StudentController::class);
Route::resource('promotion', promotionController::class);
Route::resource('graduated', GraduatedController::class);
Route::resource('fees', FeesController::class);
Route::resource('fees_invoice', Fees_invoice::class );
Route::resource('receipt_student', ReceiptStudentsController::class );
Route::resource('processing_fee',  ProcessingFeeController::class );
Route::resource('attendence',  AttendenceController::class );
Route::resource('subject',   SubjectController::class );
Route::resource('quizze',   QuizzeController::class );
Route::resource('question',    QuestionController::class );
Route::resource('online_class',    OnlineClassController::class );
Route::resource('library',    libraryController::class );
Route::get('downloadAttachment/{name}',[libraryController::class ,'download_file'])->name('downloadAttachment');

Route::get('setting',[SettingController::class,'index'])->name('setting.index');
Route::put('setting/update',[SettingController::class,'update'])->name('setting.update');

Route::post('delete-all', [ClassroomController::class, 'delete_all'])->name('delete_all');
Route::post('filter-class', [ClassroomController::class, 'filter_class'])->name('filter_class');

Route::get('classes/{id}', [SectionController::class, 'getclass']);
Route::post('upload_attachment',[StudentController::class,'upload_attachment'])->name('upload_attachment');
Route::get('download_attachment/{name}/{filename}',[StudentController::class,'download_attachment'])->name('download_attachment');
Route::post('delete_attachment/{id}',[StudentController::class,'delete_attachment'])->name('delete_attachment');

Route::get('/Get_classrooms/{id}', [StudentController::class,'Get_classrooms']);
Route::get('/Get_Sections/{id}',[StudentController::class,'Get_Sections']);
Route::view('add_perent', 'livewire.show_add_perent');
Route::view('add_perent', 'livewire.show_add_perent')->name('add_parent');
Route::view('table_perent', 'livewire.table_perent');

Route::view('/teacher/dashboard','teachers.dashboard');




//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
