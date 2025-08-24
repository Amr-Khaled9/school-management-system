<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
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
 use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('selection');

// Routes خاصة بالـ Login
Route::middleware('guest')->group(function () {
    Route::get('/login/{type}', [LoginController::class, 'loginForm'])->name('login.show');

    Route::post('/login', [LoginController::class, 'login'])->name('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

require __DIR__.'/auth.php';
