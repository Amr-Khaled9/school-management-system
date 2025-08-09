<div class="container my-4">

    {{-- رسالة النجاح --}}
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    @if ($show_table)
        @include('livewire.table_perent')
    @else
        @include('livewire.form_add_perent')
    @endif

    
</div>
</div>
