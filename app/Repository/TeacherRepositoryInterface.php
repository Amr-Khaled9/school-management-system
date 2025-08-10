<?php


namespace App\Repository;




interface TeacherRepositoryInterface
{
    public function getAllTeachers();

    public function getAllSpecialization();
    public function storeTeacher($request);
    public function editTeacher($id);

    public function updateTeacher($request,$id) ;
    public function destroyTeacher($id) ;
}
