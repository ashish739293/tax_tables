@extends('admin.layouts.app')


@section('content')
<!-- Success Message -->
@if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif


<!-- Create Blogs UI -->
@include('includes.create')

<!-- Blogs List -->
@include('includes.blogs', ['blogs' => $blogs])

@endsection