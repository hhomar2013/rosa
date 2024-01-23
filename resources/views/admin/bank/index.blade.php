@extends('layouts.admin_app')
@section('title','Bank')
@section('content-header',)
@include('admin.tools.content_header',['title'=>'Bank','page'=>'Bank'])
@endsection
@section('content')
@livewire('admin.bank.bank-component')
@endsection
@push('js')

<script>

    function delete_bank($id){
        // if(confirm("Are you sure to delete this item ?")){
        //     window.livewire.emit('delete_cat',$id);
        // }

            Swal.fire({
            title: 'Are you sure?',
            // text: "Are you sure to delete this item ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('delete_bank',$id);

            }
            })
    }
</script>

@endpush


