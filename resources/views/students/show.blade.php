@extends('layouts.master')
@section('css')
    @section('title')
        تفاصيل الطالب
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        تفاصيل الطالب :  {{ $student->name_ar }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">تفاصيل الطالب</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">مرفقات الطالب</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">اسم الطالب</th>
                                            <td>{{ $student->name_ar }}</td>
                                            <th scope="row">البريد الاكتروني</th>
                                            <td>{{$student->email}}</td>
                                            <th scope="row">النوع</th>
                                            <td>{{$student->gender }}</td>
                                            <th scope="row">الجنسية</th>
                                            <td>{{$student->nationalitie->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">المرحلة الدراسية</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">اسم الصف</th>
                                            <td>{{$student->classroom->name}}</td>
                                            <th scope="row">اسم القسم</th>
                                            <td>{{$student->section->name}}</td>
                                            <th scope="row">تاريخ الميلاد</th>
                                            <td>{{ $student->date_birth}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">اسم الاب</th>
                                            <td>{{ $student->parent->name_father}}</td>
                                            <th scope="row">السنه</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{route('upload_attachment')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">المرفقات
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="student_name" value="{{$student->name_ar}}">
                                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                    اضافة
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">اسم المرفق</th>
                                                <th scope="col">تاريخ الاضافة</th>
                                                <th scope="col">العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student->images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->filename}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{route('download_attachment', [$attachment->imageable->name_ar, $attachment->filename])}}"
                                                           role="button"><i class="fas fa-download"></i>&nbsp; تحميل المرفق </a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="حذف المرفق">حذف المرفق
                                                        </button>

                                                    </td>
                                                </tr>
                                                <!-- Deleted inFormation Student -->
                                                <div class="modal fade" id="Delete_img{{$attachment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Students_trans.Delete_attachment')}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('delete_attachment',$attachment->id)}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$attachment->id}}">

                                                                    <input type="hidden" name="student_name" value="{{$attachment->imageable->name_ar}}">
                                                                    <input type="hidden" name="student_id" value="{{$attachment->imageable->id}}">

                                                                    <h5 style="font-family: 'Cairo', sans-serif;">{{trans('Students_trans.Delete_attachment_tilte')}}</h5>
                                                                    <input type="text" name="filename" readonly value="{{$attachment->filename}}" class="form-control">

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                                                                        <button  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- row closed -->
            @endsection
            @section('js')

@endsection
