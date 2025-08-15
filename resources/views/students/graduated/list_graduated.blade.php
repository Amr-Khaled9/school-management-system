@extends('layouts.master')
@section('css')
    @section('title')
    قائمة الطلاب الخرجين
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        قائمة الطلاب الخرجين
        <i class="fas fa-user-graduate"></i>
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>اسم</th>
                                            <th>البريد الاكتروني</th>
                                            <th>النوع</th>
                                            <th>المرحلة الدراسية</th>
                                            <th>اسم الصف</th>
                                            <th>اسم القسم</th>
                                            <th><عمليات></عمليات></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$student->name_ar}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->gender}}</td>
                                                <td>{{$student->grade->name}}</td>
                                                <td>{{$student->classroom->name}}</td>
                                                <td>{{$student->section->name}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">ارجاع الطالب</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">حذف الطالب</button>

                                                </td>
                                            </tr>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Students_trans.Deleted_Student')}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('graduated.destroy','test')}}" method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <input type="hidden" name="id" value="{{$student->id}}">

                                                                <h5 style="font-family: 'Cairo', sans-serif;">حذف الطالب نهائيا</h5>
                                                                <input type="text" readonly value="{{$student->name_ar}}" class="form-control">

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                                    <button  class="btn btn-danger">حذف</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Return_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">ارجاع طالب</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('graduated.update','test')}}" method="post" autocomplete="off">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$student->id}}">

                                                                <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من الغاء عملية التخرج ؟</h5>
                                                                <input type="text" readonly value="{{$student->name_ar}}" class="form-control">

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                                    <button  class="btn btn-danger">ارجاع</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
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
    @toastr_js
    @toastr_render
@endsection
