<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
    $collection = Setting::all();
    $setting= $collection->flatMap(function ($collection){  // في شكل key - value
        return [$collection->key =>$collection->value];  // associative array
    });
   // $setting = Setting::pluck('value', 'key')->toArray();
   // return view('setting.index', compact('setting'));

    return view('setting.index',compact('setting'));
   }

    public function update(SettingUpdateRequest $request)
    {
    $data = $request->except('_token', '_method', 'logo');

    if ($request->hasFile('logo')) {
        $name = Setting::where('id',9)->first();
        Storage::disk('upload_photo')->delete($name->value);
        $namePhoto = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->storeAs('/', $namePhoto, 'upload_photo');
        $data['logo'] = $namePhoto;
    }
     foreach($data as $key => $value){
         Setting::where('key' ,$key)->update(['value'=>$value]);
     }
     toastr()->success('تم التعديل علي البيانات');
     return back();
    }


}
