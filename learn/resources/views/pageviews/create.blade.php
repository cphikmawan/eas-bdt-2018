@extends('layouts.frontpage.app')

@section('title', 'Create')

@section('sidebar')
    @include('layouts.frontpage.sidebar')
@endsection

@section('header')
    @include('layouts.frontpage.header')    
@endsection

@section('content')
<form method="POST" action="/savepage">
    @csrf
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Key">Key:</label>
            <input type="text" class="form-control" name="key">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
@endsection