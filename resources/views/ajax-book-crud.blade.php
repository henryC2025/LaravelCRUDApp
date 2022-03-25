@extends('base')
@section('main')

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
            <h2>Laravel 8 Ajax Book CRUD Tutorial</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewBook" class="btn btn-success">Add</button></div>
        <div class="col-md-12">
            <table id="Table1" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Book Code</th>
                        <th scope="col">Book Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->code }}</td>
                        <td>{{ $book->author }}</td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $book->id }}">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-primary delete" data-id="{{ $book->id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <input id="btnGet" type="button" value="Get Selected" />

            <div class="d-flex justify-content-center">
                {!! $books->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
    <div><textarea id="message" rows="10" cols="100">Selection</textarea><button type="button" id="copy">Copy</button></div>
</div>

<!-- boostrap model -->
<div class="modal fade" id="ajax-book-model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxBookModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Book Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Book Name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Book Code</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter Book Code" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Book Author</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="author" name="author" placeholder="Enter author Name" value="" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@endsection
