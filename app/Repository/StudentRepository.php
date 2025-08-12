<?php


namespace App\Repository;

use App\Models\Grade;
use App\Models\Image;
use App\Models\MyPerent;
use App\Models\Nationalitie;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Repository\StudentsRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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

       // dd($request->all());
        $students = new Student();
        $students->name_ar = $request->name_ar;
        $students->name_en = $request->name_ar;
        $students->email = $request->email;
        $students->password = Hash::make($request->password);
        $students->gender = $request->gender;
        $students->nationalitie_id = $request->nationalitie_id;
        $students->blood_id = $request->blood_id;
        $students->date_birth = $request->date_birth;
        $students->grade_id = $request->grade_id;
        $students->classroom_id = $request->classroom_id;
        $students->section_id = $request->section_id;
        $students->parent_id = $request->parent_id;
        $students->academic_year = $request->academic_year;
        $students->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/students/'.$students->name, $name, 'upload_attachments');

                Image::create([
                    'filename' => $name,
                    'imageable_id' => $students->id,
                    'imageable_type' => Student::class
                ]);
            }
        }

        Toastr()->success(" تم اضافة الطالب $request->name_ar");
        return Back();
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

    public function showDetails($id)
    {
        return Student::findorfail($id);
    }
    public function upload_attachment($request)
    {
        foreach ($request->file('photos') as $file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/' . $request->student_name, $name, 'upload_attachments');

            Image::create([
                'filename' => $name,
                'imageable_id' => $request->student_id,
                'imageable_type' => Student::class
            ]);

        }
        toastr()->success('تم اضافة المرفق بنجاح');
        return Back();
    }

    public function download_attachment($name ,$filename)
    {
        return response()->download(public_path('attachments/students/' . $name . '/' . $filename));
    }
    public function delete_attachment($id,$request)
    {
         Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);
         $image =Image::findorfail($id);

        return $image->delete();
    }
}
