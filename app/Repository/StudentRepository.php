<?php


namespace App\Repository;

use App\Models\Grade;
use App\Models\MyPerent;
use App\Models\Nationalitie;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Repository\StudentsRepositoryInterface;


class StudentRepository implements StudentsRepositoryInterface
{
    public function createStudent()
    {
        $data['my_classes'] = Grade::all();
        $data['parents'] = MyPerent::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();


        return view('students.add', $data);
    }

    public function storeStudent($request)
    {
        return Student::create($request->all());
    }

    public function indexStudent()
    {
        return Student::all();
    }
    public function editStudent($id)
    {
        $data['Grades'] = Grade::all();
        $data['parents'] = MyPerent::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();

        $data['student'] = Student::findOrFail($id);

        return view('students.edit', $data);
    }
    public function updateStudent($request, $id)
    {

        $student = Student::findOrFail($id);

        return  $student->update($request->all());
    }
    public function destroyStudent($id)
    {
        $student = Student::findOrFail($id);

        return  $student->delete($id);
    }
}
