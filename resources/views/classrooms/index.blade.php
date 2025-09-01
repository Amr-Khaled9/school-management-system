@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta/dist/css/bootstrap-select.min.css">

@section('title')
    الفصول الدراسية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الفصول الدراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">#</a></li>
                <li class="breadcrumb-item active">الفصول الدراسية</li>
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
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#exampleModal">
                    اضافة صف
                </button>
                <button type="button" class="btn btn-success btn-sm" role="button" id="btn_delete_all">
                    حذف الصفوف المختارة
                </button>

                <br><br>

                <form action="{{ route('filter_class') }}" method="POST">
                    @csrf
                    <label for="grade_id" class="mb-2" style="font-weight: bold; color: #155724;">

                    </label>

                    <select class="selectpicker" data-style="btn-success" name="grade_id" id="grade_id" required
                        onchange="this.form.submit()">
                        <option value="" selected disabled>البحث باسم المرحلة
                        </option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        @php $id = 0; @endphp
                        <thead>
                            <tr>
                                <th>
                                    <input name="select_all" id="example-select-all" type="checkbox"
                                        onclick="toggleSelectAll(this, 'box1')" />
                                </th>


                                <th>#</th>
                                <th>اسم الصف</th>
                                <th>اسم االمرحلة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <td>
                                        <input type="checkbox" value="{{ $classroom->id }}" class="box1">
                                    </td>
                                    <td>{{ ++$id }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td>{{ $classroom->Grades->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $classroom->id }}" title="تعديل الصف"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $classroom->id }}" title="حذف الصف"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    <input name="select_all" id="example-select-all" type="checkbox"
                                           onclick="toggleSelectAll(this, 'box1')" />
                                </th>
                                <th>#</th>
                                <th>اسم الصف</th>
                                <th>اسم االمرحلة</th>
                                <th>العمليات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>


    @foreach ($classrooms as $classroom)
        <!-- edit_modal_Grade -->
        <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            تعديل الصف
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('classroom.update', $classroom->id) }}" method="post">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">اسم الصف
                                        :</label>
                                    <input id="Name" type="text" name="name" class="form-control"
                                        value="{{ $classroom->name }}" required>
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ $classroom->id }}">
                                </div>
                            </div>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> اسم المرحلة
                            : </label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="grade_id">
                            <option value="{{ $classroom->grades->id }}">
                                {{ $classroom->grades->name }}
                            </option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">
                                    {{ $grade->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-success">تعديل</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
</div>

<!-- delete_modal_Grade -->
<div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    حذف الصف
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('classroom.destroy', 'test') }}" method="post">
                    {{ method_field('Delete') }}
                    @csrf
                    حذف الصف : {{ $classroom->name }}

                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $classroom->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">حذف</button>
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



<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    اضافة صف
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('classroom.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">اسم الصف
                                                :</label>
                                            <input class="form-control" type="text" name="name" />
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">اسم المرحلة
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="grade_id">
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">العمليات
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="حذف" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="اضافة صف" />
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-success">حفظ</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>
</div>
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('My_Classes_trans.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('My_Classes_trans.Warning_Grade') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')

<script>
    function toggleSelectAll(masterCheckbox, className) {
        const checkboxes = document.querySelectorAll('.' + className);
        checkboxes.forEach(cb => {
            cb.checked = masterCheckbox.checked;
        });
    }
</script>
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    });
</script>

@endsection
