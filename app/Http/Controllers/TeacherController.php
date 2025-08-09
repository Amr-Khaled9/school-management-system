<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;
class TeacherController extends Controller
{
    protected $teacher;
    public function __construct(TeacherRepositoryInterface $teacher) {
        $this->teacher =$teacher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->teacher->getAllTeachers();
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
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
