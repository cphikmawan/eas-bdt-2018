@extends('layouts.dashboard.app')

@section('title', 'Trash')

@section('sidebar')
    @include('layouts.dashboard.sidebar')
@endsection

@section('header')
    @include('layouts.dashboard.header')    
@endsection

@section('content')
<div class="block">
    <div class="block-header block-header-default bg-info">
        <h3 class="block-title">Deleted Books</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
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
                    <th class="text-center">Actions</th>
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
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="/bookrestore/{{$value->book_id}}" id="form-status" class="form-status" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $value->book_name }}" name="statusok" id="statusok">                                
                                        <button type="button" id="statusok" class="btn btn-sm btn-primary js-tooltip-enabled">
                                            <i class="fa fa-refresh"> Restore</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="block">
    <div class="block-header block-header-default bg-info">
        <h3 class="block-title">Deleted Category</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center">Category ID</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Delete At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{ csrf_field() }}
                @if(count($category)!=0)
                    @foreach ($category as $value)
                        <tr>
                            <td class="text-center">{{ $value->category_id }}</td>
                            <td class="">{{ $value->category_name }}</td>
                            <td class="text-center">{{ $value->created_at }}</td>
                            <td class="text-center">{{ $value->updated_at }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="/categoryrestore/{{$value->category_id}}" id="form-status2" class="form-status2" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $value->category_name }}" name="statusok2" id="statusok2">                                
                                        <button type="button" id="statusok2" class="btn btn-sm btn-primary js-tooltip-enabled">
                                            <i class="fa fa-refresh"> Restore</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('moreJs')
<script>
    $(document).on('click', '#statusok', function()
    {
        var form = $(this).closest('form#form-status');
        swal({
            title: 'Are Sure For Restoring This Data?',
            text: "This Data Will Be Restore",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.value) {
                form.submit();
            }
            });
    });
</script>

<script>
        $(document).on('click', '#statusok2', function()
        {
            var form = $(this).closest('form#form-status2');
            swal({
                title: 'Are Sure For Restoring This Data?',
                text: "This Data Will Be Restore",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                if (result.value) {
                    form.submit();
                }
                });
        });
    </script>
@endsection