<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnlineClassStoreRequest;
use App\Models\Grade;
use App\Models\Online_class;
use App\Models\User;
use App\Services\ZoomService;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OnlineClassController extends Controller
{

    public function index()
    {
        $online_classes = Online_class::all();
        return view('online_class.index',compact('online_classes'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('online_class.add',compact('grades'));
    }

    public function store(OnlineClassStoreRequest $request,ZoomService $zoom)
    {
        $user = User::find(2);
    $token =$zoom->generateAccessToken();
    $meeting = $zoom->createMeeting($request->topic,$request->start_time,$request->duration,2,$token);
        $online = Online_class::create([
            'grade_id'     => $request->Grade_id,
            'classroom_id' => $request->Classroom_id,
            'section_id'   => $request->section_id,
            'user_id'      => $user->id,
            'meeting_id'   => $meeting['id'],
            'topic'        => $meeting['topic'],
            'duration'      =>$request->duration,
            'start_time'   => $request->start_time,
            'timezone'     => $meeting['timezone'],
            'join_url'     => $meeting['join_url'],
            'start_url'    => $meeting['start_url'],
        ]);


        toastr()->success('تم انشاء ZOOM بنجاح');
        return redirect()->route('online_class.index');


    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $meet =Online_class::where('meeting_id',$request->id)->delete();
        toastr()->error('تم حذف ZOOM ');
        return redirect()->route('online_class.index');
    }
}
