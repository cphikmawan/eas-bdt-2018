@extends('layouts.dashboard.app')

@section('title', 'Books')

@section('sidebar')
    @include('layouts.dashboard.sidebar')
@endsection

@section('header')
    @include('layouts.dashboard.header')    
@endsection

@section('content')
<div class="block">
    <div class="block-header block-header-default bg-info">
    <h3 class="block-title">Book List / {{ date('d-M-Y') }}</small></h3>
    </div>
    <div class="block-content block-content-full">
        <div class="pull-left">
            <a class="btn btn-sm btn-success text-white" data-toggle="modal" data-target="#add-modal"> 
                <i class="fa fa-plus" style="width: 140px;"> Add New Book</i>
            </a>
            <a class="btn btn-sm btn-primary text-white" href="trash"> 
                <i class="fa fa-eye" style="width: 140px;"> Show Deleted Books</i>
            </a>
        </div><p><br></p>
        {{-- create book modal --}}
        <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Tambah Buku</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('books.store') }}" method="POST">
        
                            {{ csrf_field() }}
                            
                            <input type=hidden name=_token value="{{ csrf_token() }}">
        
                            <div class="form-group @if ($errors->has('book_id')) has-error @endif">
                                <label for="item">Book ID : </label>
                                <input name="book_id" type="text" class="form-control" id="item" placeholder="Book ID" required>
                                @if ($errors->has('book_id'))
                                    <p class="help-block">{{ $errors->first('book_id') }}</p> 
                                @endif
                            </div>
        
                            <div class="form-group ">
                                <label for="category_id">Book Category : </label>
                                <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($category as $value)
                                        <option value="{{ $value->category_id }}">{{ $value->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
        
                            <div class="form-group @if ($errors->has('book_name')) has-error @endif">
                                <label for="book_name">Book Name : </label>
                                <input name="book_name" type="text" class="form-control" id="debit" placeholder="Book Name" required>
                                @if ($errors->has('book_name'))
                                    <p class="help-block">{{ $errors->first('book_name') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group @if ($errors->has('book_publisher')) has-error @endif">
                                <label for="book_publisher">Book Publisher : </label>
                                <input name="book_publisher" type="text" class="form-control" id="debit" placeholder="Book Publisher" required>
                                @if ($errors->has('book_publisher'))
                                    <p class="help-block">{{ $errors->first('book_publisher') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group @if ($errors->has('book_author')) has-error @endif">
                                <label for="book_author">Book Author : </label>
                                <input name="book_author" type="text" class="form-control" id="debit" placeholder="Book Author" required>
                                @if ($errors->has('book_author'))
                                    <p class="help-block">{{ $errors->first('book_author') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group @if ($errors->has('book_published')) has-error @endif">
                                <label for="book_published">Book Published : </label>
                                <input name="book_published" type="date" class="form-control" id="debit" placeholder="Book Published" required>
                                @if ($errors->has('book_published'))
                                    <p class="help-block">{{ $errors->first('book_published') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group @if ($errors->has('book_price')) has-error @endif">
                                <label for="book_price">Book Price : </label>
                                <input name="book_price" type="number" class="form-control" id="debit" placeholder="Book Price" required>
                                @if ($errors->has('book_price'))
                                    <p class="help-block">{{ $errors->first('book_price') }}</p>
                                @endif
                            </div>
        
                            <div class="form-group @if ($errors->has('book_stock')) has-error @endif">
                                <label for="book_stock">Book Stock : </label>
                                <input name="book_stock" type="number" class="form-control" id="debit" placeholder="Book Stock" required>
                                @if ($errors->has('book_stock'))
                                    <p class="help-block">{{ $errors->first('book_stock') }}</p>
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
        {{-- edit book modal --}}
        @foreach ($book as $value)
        <div class="modal fade" id="edit-modal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Book</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        <form action="{{URL::to('/books/'.$value->id.'/update')}}" method="POST">
                            {{ csrf_field() }}
                            <input type=hidden name=_token value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="item">Book ID : </label>
                                <input name="" type="text" class="form-control" id="item" value="{{ $value->book_id }}" placeholder="Book ID" disabled>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Book Category : </label>
                                <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach($category as $cats)
                                        <option value="{{ $cats->category_id }}" @if($cats->category_id == $value->category_id) selected @endif>{{ $cats->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="item">Book Name : </label>
                                <input name="book_name" type="text" class="form-control" id="debit" value="{{$value->book_name}}" placeholder="Book Name" required>
                            </div>
                            <div class="form-group">
                                <label for="book_publisher">Book Publisher : </label>
                                <input name="book_publisher" type="text" class="form-control" id="debit" value="{{$value->book_publisher}}" placeholder="Book Publisher" required>
                            </div>
                            <div class="form-group">
                                <label for="book_author">Book Author : </label>
                                <input name="book_author" type="text" class="form-control" id="debit" value="{{$value->book_author}}" placeholder="Book Author" required>
                            </div>
                            <div class="form-group">
                                <label for="book_published">Book Published : </label>
                                <input name="book_published" type="date" class="form-control" id="debit" value="{{$value->book_published}}" placeholder="Book Published" required>
                            </div>
                            <div class="form-group">
                                <label for="book_price">Book Price : </label>
                                <input name="book_price" type="number" class="form-control" id="debit" value="{{$value->book_price}}" placeholder="Book Price" required>
                            </div>
                            <div class="form-group">
                                <label for="book_stock">Book Stock : </label>
                                <input name="book_stock" type="number" class="form-control" id="debit" value="{{$value->book_stock}}" placeholder="Book Stock" required>
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
                                    <a class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="modal" title="" data-target="#edit-modal-{{$value->id}}" href="{{URL::to('/books/'.$value->id)}}" method="GET" data-original-title="Edit">
                                        <i class="fa fa-pencil" style="width: 50px;"> Edit</i>
                                    </a>
                                    <form action="/books/{{$value->book_id}}" id="form-status" class="form-status" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $value->book_name }}" name="statusok" id="statusok">                                
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
            {{-- <div class="pull-right">{{$book->links()}}</div> --}}
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