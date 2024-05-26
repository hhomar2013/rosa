@extends('layouts.admin_app')
@section('title','Categories')
@section('content-header',)
@include('admin.tools.content_header',['title'=>'Categories','page'=>'Categories'])
@endsection
@section('content')
@livewire('admin.categories-componnent')
@endsection
@push('js')

<script>

    function delete_cat($id){
        // if(confirm("Are you sure to delete this item ?")){
        //     window.livewire.emit('delete_cat',$id);
        // }

            Swal.fire({
            title: '{{ __('Are you sure?') }}',
            // text: "Are you sure to delete this item ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{ __("Yes, delete it!") }}',
            cancelButtonText:'{{ __("Cancel") }}'
            }).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('delete_cat',$id);

            }
            })
    }
</script>

@endpush


