@extends('layouts.admin_app')
@section('title','Employes')
@section('content-header',)
@include('admin.tools.content_header',['title'=>'Employes','page'=>'Employes'])
@endsection
@section('content')
@livewire('admin.employe.index')
@endsection
@push('js')

<script>

    function delete_cat($id){
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
                window.livewire.emit('delete_cat',$id);

            }
            })
    }
</script>

@endpush
