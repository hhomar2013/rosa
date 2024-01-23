@extends('layouts.admin_app')
@section('title','Employes')
@section('content-header')
@include('admin.tools.content_header',['title'=>'Employes','page'=>'Employes'])
@endsection
@section('content')
@livewire('admin.employee.employee-component')
@endsection
@push('js')

@endpush
