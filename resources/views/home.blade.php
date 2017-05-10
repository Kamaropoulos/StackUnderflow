@extends('layouts.app')

@section('pageTitle', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <?php $author_counter = 1; ?>
            @foreach($questions as $question)
                <div class="list-group-item">
                    <i class="glyphicon glyphicon-chevron-up"></i>
                    <span class="label label-primary">3</span>
                    <i class="glyphicon glyphicon-chevron-down"></i>

                    <a href="/questions/{{$question->id}}">{{ $question->title }}</a>
                    <hr>
                        {{ $question->body }}
                    <br><hr>
                    <div class="pull-right">Asked by {{ $authors[$author_counter]->name }} at {{ $question->created_at->toDayDateTimeString() }}</div><br>
                    <?php ++$author_counter; ?>
                </div><br>
            @endforeach
        </div>
    </div>
@endsection
