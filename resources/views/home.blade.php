@extends('layouts.app')

@section('pageTitle', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($questions as $question)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="/questions/{{$question->id}}">{{ $question->title }}</a></div>
                    <div class="panel-body">
                        {{ $question->body }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
