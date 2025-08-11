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
}
