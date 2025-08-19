<?php

namespace App\Repository;

use App\Models\Quizze;

class QuizzeRepository implements QuizzeRepositoryInterface
{

//"name_ar" => "asdsad"
//"subject_id" => "2"
//"teacher_id" => "1"
//"Grade_id" => "1"
//"Classroom_id" => "1"
//"section_id" => "1"
    public function store($request)
    {
        $quizze = new Quizze();
        $quizze->name = $request->name_ar;
        $quizze->subject_id = $request->subject_id;
        $quizze->teacher_id = $request->teacher_id;
        $quizze->grade_id = $request->Grade_id;
        $quizze->classroom_id = $request->Classroom_id;
        $quizze->section_id = $request->section_id;
        $quizze->save();
    }
    public function update($request)
    {
        $quizze = Quizze::findOrFail($request->id);
        $quizze->name = $request->name_ar;
        $quizze->subject_id = $request->subject_id;
        $quizze->teacher_id = $request->teacher_id;
        $quizze->grade_id = $request->Grade_id;
        $quizze->classroom_id = $request->Classroom_id;
        $quizze->section_id = $request->section_id;
        $quizze->save();
    }
}
