@extends('comment-base')
@section('main')

<div class="col-md-12">
    <table id="Table1" class="table" style="width:100%">
        <thead>
            <tr>
                <th scope="col" style="width:10%">#</th>
                <th scope="col" style="width:15%">Comment ID</th>
                <th scope="col" style="width:55%">Comment</th>
                <th scope="col" style="width:20%">Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <td><input type="checkbox" /></td>
                <td>RO{{ $result->id }}</td>
                <td>{{ $result->comment }}</td>
                <td>{{ $result->author }} </td>
                <td>
                    <a href="javascript:void(0)" id="edit-button" class="btn btn-primary edit" data-id="{{ $result->id }}">Edit</a>
                    <a href="javascript:void(0)" id="delete-button" class="btn btn-primary delete" data-id="{{ $result->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $results->links('pagination::bootstrap-4') !!}
    </div>
</div>

@endsection
