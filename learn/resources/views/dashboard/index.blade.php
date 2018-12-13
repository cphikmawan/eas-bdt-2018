@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.dashboard.sidebar')
@endsection

@section('header')
    @include('layouts.dashboard.header')    
@endsection

@section('content')
<div class="block">
    <div class="block-header block-header-default bg-primary">
        <h3 class="block-title">Dashboard</small></h3>
    </div>
    <div class="block-content block-content-full">
        <div class="alert alert-info">Welcome to Book BS</div>
    </div>
</div>
@endsection