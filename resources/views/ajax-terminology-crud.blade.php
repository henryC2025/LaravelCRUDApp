@extends('comment-base')
@section('main')

<div class="col-md-12">
    <table id="TableTerminology" class="table" style="width:100%">
        <thead>
            <tr>
                <th scope="col" style="width:10%">#</th>
                <th scope="col" style="width:15%">Comment Code</th>
                <th scope="col" style="width:55%">Comment</th>
                <th scope="col" style="width:15%">Created By</th>
                <th scope="col" style="width:5%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($terminology as $terminologies)
            <tr>
                <td><input type="checkbox" /></td>
                <td>{{ $terminologies->comment_id }}</td>
                <td terminologies>{{ $terminologies->comment_name }}</td>
                <td>{{ $terminologies->forename . " " . $terminologies->surname }} </td>
                <td>
                    <a href="javascript:void(0)" id="edit-button" class="btn btn-primary edit" data-id="{{ $terminologies->id }}">Edit</a>
                    <a href="javascript:void(0)" id="delete-button" class="btn btn-primary delete" data-id="{{ $terminologies->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $terminology->links('pagination::bootstrap-4') !!}
    </div>
</div>

@endsection
