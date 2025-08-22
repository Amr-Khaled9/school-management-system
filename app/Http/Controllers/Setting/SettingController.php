<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use App\traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    use UploadFileTrait;
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
//"_token" => "HCTD45WiA0MJjlQx7LrkFvYVeqLeiCx92IwqtCoD"
//"_method" => "PUT"
//"school_name" => "National School"
//"current_session" => "2025-2026"
//"school_title" => "NS"
//"phone" => "01145094316"
//"school_email" => "school@gamil.com"
//"address" => "بني سويف"
//"end_first_term" => "01-12-2025"
//"end_second_term" => "01-03-2026"
//"logo"
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
