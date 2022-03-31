@extends('comment-base')
@section('main')

<div class="col-md-12">
    <table id="TableResults" class="table" style="width:100%">
        <thead>
            <tr>
                <th scope="col" style="width:10%">#</th>
                <th scope="col" style="width:15%">Comment Code</th>
                <th scope="col" style="width:55%">Comment Description</th>
                <th scope="col" style="width:15%">Created By</th>
                <th scope="col" style="width:5%"></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
            <tr>
                <td><input type="checkbox" /></td>
                <td>{{ $result->comment_id }}</td>
                <td class={{$result->style == 'p' ? 'positive' : ''}}>{{ $result->comment_name }}</td>
                <td>{{ $result->forename . " " . $result->surname }} </td>
                <td>
                    {{-- <a href="javascript:void(0)" id="edit-button" class="btn btn-primary edit" data-id="{{ $result->id }}">Edit</a>
                    <a href="javascript:void(0)" id="delete-button" class="btn btn-primary delete" data-id="{{ $result->id }}">Delete</a> --}}
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
