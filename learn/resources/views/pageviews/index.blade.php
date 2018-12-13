@extends('layouts.frontpage.app')

@section('title', 'Pages')

@section('sidebar')
    @include('layouts.frontpage.sidebar')
@endsection

@section('header')
    @include('layouts.frontpage.header')    
@endsection

@section('content')
<div class="block">
    <a href="/createpage" class="btn btn-sm btn-primary mb-2"><i class="fa fa-plus"> Create Page</i></a>
    <div class="block-header block-header-default bg-info">
        <h3 class="block-title">Page List</small></h3>
    </div>
    <div class="block-content block-content-full">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center">Key</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Count</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{ csrf_field() }}
                @if(count($pages)!=0)
                    @foreach ($pages as $data)
                        <tr>
                            <td class="text-center">{{ $data->key }}</td>
                            <td class="">{{ $data->name }}</td>
                            <td class="text-center">{{ $data->count }}</td>
                            <td class="text-center">
                                <a href="{{action('PageController@pages', $data->id)}}" class="btn btn-sm btn-info"><i class="si si-eye"> Visit</i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection