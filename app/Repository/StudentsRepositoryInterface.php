<?php


namespace App\Repository;




interface StudentsRepositoryInterface
{
 public function createStudent()  ;
 public function storeStudent($request);

 public function indexStudent();

 public function editStudent($id);
 public function updateStudent($request,$id);
 public function destroyStudent($id);

}
