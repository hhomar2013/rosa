@extends('layouts.admin_app')
@section('title','Categories')
@section('content-header',)
@include('admin.tools.content_header',['title'=>'Categories','page'=>'Categories'])
@endsection
@section('content')
@livewire('admin.categories-componnent')
@endsection

