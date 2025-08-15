<?php

namespace App\Repository;

use App\Models\Fees;

class FeesRepository implements FeesRepositoryInterface
{
public function store($request)
{
    $fees =new Fees();
    $fees->title_ar = $request->title_ar;
    $fees->title_en = $request->title_en;
    $fees->grade_id = $request->Grade_id;
    $fees->amount =$request->amount;
    $fees->classroom_id = $request->Classroom_id;
    $fees->year = $request->year;
    $fees->description = $request->description;
    $fees->save();
}
public function update ($request)
{
    $fees =Fees::findorfail($request->id);
    $fees->update([
    'title_ar' => $request->title_ar,
    'title_en' => $request->title_en,
    'grade_id' => $request->Grade_id,
    'amount' =>$request->amount,
    'classroom_id' => $request->Classroom_id,
    'year' => $request->year,
    'description' => $request->description
]);

}
}
