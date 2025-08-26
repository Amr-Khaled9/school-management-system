

<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">اضاقة ولي امر</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>البريد الكتروني</th>
            <th>اسم الاب</th>
            <th>رقم الهوية</th>
            <th>رقم جواز السفر </th>
            <th>رقم الهاتف</th>
            <th>وظيفة الاب</th>
            <th>العمليات</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($my_parents as $my_parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->name }}</td>
                <td>{{ $my_parent->national_id_father }}</td>
                <td>{{ $my_parent->passport_iD_father }}</td>
                <td>{{ $my_parent->phone_father }}</td>
                <td>{{ $my_parent->job_father }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="تعديل"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{حذف البيانات"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
