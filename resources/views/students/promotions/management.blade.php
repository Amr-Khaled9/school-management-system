@extends('layouts.master')
@section('css')
    @section('title')
        ادراه الترقيات
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        ادراه الترقيات
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

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    تراجع الكل
                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">اسم الطالب</th>
                                            <th class="alert-danger">السنة الدراسية</th>
                                            <th class="alert-danger">الصف الدراسي السابق</th>
                                            <th class="alert-danger">القسم الدراسي السابق</th>
                                            <th class="alert-success">السنة الدراسية الحالية</th>
                                            <th class="alert-success">الصف الدراسي الحالي</th>
                                            <th class="alert-success">القسم الدراسي الحالي</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name_ar}}</td>
                                                <td>{{$promotion->f_grade->name}}</td>
                                                <td>{{$promotion->f_classroom->name}}</td>
                                                <td>{{$promotion->f_section->name}}</td>
                                                <td>{{$promotion->t_grade->name}}</td>
                                                <td>{{$promotion->t_classroom->name}}</td>
                                                <td>{{$promotion->t_section->name}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">ارجاع الطالب</button>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#">تخرج الطالب</button>
                                                </td>
                                            </tr>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_all" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">تراجع الكل</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('promotion.destroy',1)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <input type="text" name="page_id" value="1">
                                                                <input type="text" name="id" value="{{$promotion->id}}">

                                                                <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من عملية تراجع كافة الطلاب ؟</h5>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                                    <button  class="btn btn-danger">تراجع</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_one{{$promotion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">تراجع طالب</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('promotion.destroy','test')}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id" value="{{$promotion->id}}">
                                                                <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من عملية تراجع الطالب ؟ {{$promotion->student->name}}</h5>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                                                    <button  class="btn btn-danger">حذف</button>
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

@endsection
