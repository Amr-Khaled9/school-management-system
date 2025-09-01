<?php

namespace App\Repository;
use App\Models\Library;
use App\traits\UploadFileTrait;
class LibraryRepository implements LibraryRepositoryInterface
{
    use UploadFileTrait;
    public function store($request)
    {
        $book = new Library();
        $book->title = $request->title;
        $book->grade_id = $request->Grade_id;
        $book->classroom_id = $request->Classroom_id;
        $book->section_id = $request->section_id;


            $book->teacher_id = auth()->guard('teacher')->user()->id;

        $book->file_name = $request->file('file_name')->getClientOriginalName();
        $book->save();
        $this->uploadPDF($request, 'file_name');

    }
    public function update($request)
    {
        $book = library::findorFail($request->id);

        $book->title = $request->title;

        if($request->hasfile('file_name')){
           $this->deleteFile($book->file_name);

           $book->file_name = $request->file('file_name')->getClientOriginalName();

           $this->uploadPDF($request,'file_name');

         }
        $book->grade_id = $request->Grade_id;
        $book->classroom_id = $request->Classroom_id;
        $book->section_id = $request->section_id;
        if (auth()->guard('web')->check()) {
            // لو الأدمن هو اللي مسجل دخول
            $book->teacher_id = auth()->guard('web')->user()->id;
        } elseif (auth()->guard('teacher')->check()) {
            // لو المعلم هو اللي مسجل دخول
            $book->teacher_id = auth()->guard('teacher')->user()->id;
        }        $book->save();
    }
    public function delete($request)
    {
        $this->deleteFile($request->file('file_name'));
        $book = library::findorFail($request->id);
        $book->delete();
    }
}
