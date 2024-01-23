@extends('layouts.admin_app')
@section('title','POS')
@section('content-header')
    @include('admin.tools.content_header',['title'=>'POS','page'=>'POS'])
@endsection
@section('content')
    @livewire('admin.employee.employee-component')
@endsection
@push('js')

@endpush
