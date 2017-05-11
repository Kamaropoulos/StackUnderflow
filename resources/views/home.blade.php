@extends('layouts.app')

@section('pageTitle', 'Home')
@section('askURL', 'questions/ask')


@section('content')
    <div class="container">
        <div class="row">
            <?php $author_counter = 1; ?>
            @foreach($questions as $question)
                <div class="list-group-item">
                    <a href="questions/{{$question->id}}">{{ $question->title }}</a>
                    <hr>
                    {{ $question->body }}
                    <br>
                    <hr>
                    <div class="pull-right">Asked by {{ $authors[$author_counter]->name }}
                        at {{ $question->created_at->toDayDateTimeString() }}</div>
                    <br>
                    <?php ++$author_counter; ?>
                </div><br>
            @endforeach
        </div>
    </div>
@endsection
