@extends('layouts.dashboard.app')

@section('title', 'Category')

@section('sidebar')
    @include('layouts.dashboard.sidebar')
@endsection

@section('header')
    @include('layouts.dashboard.header')    
@endsection

@section('content')
<div class="block">
    <div class="block-header block-header-default  bg-info">
    <h3 class="block-title">Category List / {{ date('d-M-Y') }}</small></h3>
    </div>
    <div class="block-content block-content-full">
        <div class="pull-left">
            <a class="btn btn-sm btn-success text-white" data-toggle="modal" data-target="#add-modal"> 
                <i class="fa fa-plus" style="width: 140px;"> Add New Category</i>
            </a>
            <a class="btn btn-sm btn-primary text-white" href="/trash"> 
                <i class="fa fa-eye" style="width: 140px;"> Show Deleted Category</i>
            </a>
        </div><p><br></p>
        {{-- create Category modal --}}
        <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Add New Book</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('category.store') }}" method="POST">
        
                            {{ csrf_field() }}
                            
                            <input type=hidden name=_token value="{{ csrf_token() }}">
        
                            <div class="form-group @if ($errors->has('category_id')) has-error @endif">
                                <label for="item">Category ID : </label>
                                <input name="category_id" type="text" class="form-control" id="item" placeholder="Category ID" required>
                                @if ($errors->has('category_id'))
                                    <p class="help-block">{{ $errors->first('category_id') }}</p> 
                                @endif
                            </div>
        
                            <div class="form-group @if ($errors->has('category_name')) has-error @endif">
                                <label for="category_name">Category Name : </label>
                                <input name="category_name" type="text" class="form-control" id="debit" placeholder="Category Name" required>
                                @if ($errors->has('category_name'))
                                    <p class="help-block">{{ $errors->first('category_name') }}</p>
                                @endif
                            </div>
                    </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        {{-- edit Category modal --}}
        @foreach ($category as $value)
        <div class="modal fade" id="edit-modal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        <form action="{{URL::to('/category/'.$value->id.'/update')}}" method="POST">
                            {{ csrf_field() }}
                            <input type=hidden name=_token value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="item">Category ID : </label>
                                <input name="" type="text" class="form-control" id="item" value="{{ $value->category_id }}" placeholder="Category ID" disabled>
                            </div>
                            <div class="form-group">
                                <label for="item">Category Name : </label>
                                <input name="category_name" type="text" class="form-control" id="debit" value="{{$value->category_name}}" placeholder="Category Name" required>
                            </div>
                            
                    </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        @endforeach
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center">Category ID</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Update At</th>
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
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="modal" title="" data-target="#edit-modal-{{$value->id}}" href="{{URL::to('/category/'.$value->id)}}" method="GET" data-original-title="Edit">
                                        <i class="fa fa-pencil" style="width: 50px;"> Edit</i>
                                    </a>
                                    <form action="/category/{{$value->category_id}}" id="form-status" class="form-status" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $value->category_name }}" name="statusok" id="statusok">                                
                                        <button type="button" id="statusok" class="btn btn-sm btn-danger js-tooltip-enabled">
                                            <i class="fa fa-trash" style="width: 50px;"> Delete</i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{-- <div class="pull-right">{{$category->links()}}</div> --}}
        </div>
    </div>
</div>
@endsection

@section('moreJs')
<script>
    $(document).on('click', '#statusok', function()
    {
        var form = $(this).closest('form#form-status');
        swal({
            title: 'Are You Sure to Delete This Data?',
            text: "Deleted Data Will Be Move to Trash",
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