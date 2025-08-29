<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quizze;
class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = auth()->guard('student')->user();

        $quizzes = Quizze::where('grade_id', $student->grade_id)
            ->where('classroom_id', $student->classroom_id)
            ->where('section_id', $student->section_id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('students.exams.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($quizze_id)
    {
        $student_id = auth()->guard('student')->user()->id;

        return view('students.exams.show' ,compact('quizze_id','student_id'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
