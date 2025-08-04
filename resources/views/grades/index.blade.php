@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    المراحل الدراسية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">المراحل الدراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">المراحل الدراسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    اضافة مرحلة
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        @php $id = 0; @endphp
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المرحلة</th>
                                <th>الملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grades as $grade)
                                <tr>
                                    <td>{{ ++$id }}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td>{{ $grade->notes }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $grade->id }}" title="تعديل"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $grade->id }}" title="حذف"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>اسم المرحلة</th>
                                <th>الملاحظات</th>
                                <th>العمليات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Grades_trans.add_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('grade.store') }}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="Name" class="form-label">اسم المرحلة:</label>
                                    <input id="Name" type="text" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="exampleFormControlTextarea1" class="form-label">الملاحظات:</label>
                                    <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-success">اضافة</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    @foreach ($grades as $grade)
        <tr>
            <td>{{ ++$id }}</td>
            <td>{{ $grade->name }}</td>
            <td>{{ $grade->notes }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#edit{{ $grade->id }}" title="تعديل"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete{{ $grade->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </td>
        </tr>

        <!-- ✅ مودال التعديل -->
        <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('grade.update', $grade->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                            <h5 class="modal-title">{{ trans('Grades_trans.edit_Grade') }}</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label>اسم المرحلة:</label>
                            <input type="text" name="name" value="{{ $grade->name }}" class="form-control">
                            <label>الملاحظات:</label>
                            <textarea name="notes" class="form-control" rows="3">{{ $grade->notes }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"
                                class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ✅ مودال الحذف -->
        <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('grade.destroy', $grade->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title">{{ trans('Grades_trans.delete_Grade') }}</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ trans('Grades_trans.Warning_Grade') }}</p>
                            <input type="hidden" name="id" value="{{ $grade->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">{{ trans('Grades_trans.submit') }}</button>
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

</div>
</div>
</div>
</div>

</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
