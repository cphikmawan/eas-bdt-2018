@extends('layouts.frontpage.app')

@section('title', 'Book')

@section('sidebar')
    @include('layouts.frontpage.sidebar')
@endsection

@section('header')
    @include('layouts.frontpage.header')    
@endsection

@section('content')
<div class="block">
    <div class="block-header block-header-default bg-info">
        <h3 class="block-title">Book List / {{ date('d-M-Y') }}</small></h3>
    </div>
    <div class="block-content block-content-full">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Publisher</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Year</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    {{ csrf_field() }}
                @if(count($book)!=0)
                    @foreach ($book as $value)
                        <tr>
                            <td class="text-center">{{ $value->book_id }}</td>
                            <td class="">{{ $value->book_name }}</td>
                            <td class="">{{ $value->book_publisher }}</td>
                            <td class="">{{ $value->book_author }}</td>
                            <td class="text-center">{{ $value->book_published }}</td>
                            <td class="text-center">Rp. {{ $value->book_price }}</td>
                            <td class="text-center">{{ $value->book_stock }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection