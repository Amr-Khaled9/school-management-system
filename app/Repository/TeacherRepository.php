<?php


namespace App\Repository;

use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;


class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers()
    {
        return Teacher::all();
    }
    public function getAllSpecialization()
    {
        return Specialization::all();
    }

    public function storeTeacher($request)
    {
         return  Teacher::create($request);
    }
    public function editTeacher($id) {
        return Teacher::findOrFail($id);
    }

    public function updateTeacher($request,$id)  {
        $teacher =Teacher::findOrFail($id);
        return $teacher->update($request);
    }
        public function destroyTeacher($id)  {
            return Teacher::where('id',$id)->delete();
    }

}
