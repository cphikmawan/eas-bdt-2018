@extends('layouts.frontpage.app')

@section('title', 'Pages')

@section('sidebar')
    @include('layouts.frontpage.sidebar')
@endsection

@section('header')
    @include('layouts.frontpage.header')    
@endsection

@section('content')
    <h5 class="text-center">This is {{ $page->name }} Visited {{ $page->count }} Times</h5> 
@endsection