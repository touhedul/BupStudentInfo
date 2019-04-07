@extends('layouts.student')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Course Marks</h4>
    </div>
    @if($examMark)
    <table class="table table-striped">
        <thead>
        <tr>
            <td>CT</td>
            <td>{{$examMark->ct}}</td>
        </tr>
        <tr>
            <td>Mid</td>
            <td>{{$examMark->mid}}</td>
        </tr>
        <tr>
            <td>Final</td>
            <td>{{$examMark->final}}</td>
        </tr>
        <tr>
            <td>gpa</td>
            <td>{{$examMark->gpa}}</td>
        </tr>

        </thead>
    </table>
        @else
        <h3>No marks given</h3>
    @endif


@endsection