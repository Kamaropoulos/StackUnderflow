@extends('layouts.app')


@section('pageTitle', $question->title)

@section('content')
    <div class="container">
        <div class="row">
                <div class="list-group-item">
                    <i class="glyphicon glyphicon-chevron-up"></i>
                    <span class="label label-primary">3</span>
                    <i class="glyphicon glyphicon-chevron-down"></i>

                    <b>{{ $question->title }}</b>
                    <hr>
                    {{ $question->body }}
                    <br><hr>
                    <div class="pull-right">Asked by {{ $author->name }} at {{ $question->created_at->toDayDateTimeString() }}</div><br>
                </div><br>
                <hr>

                    <h2>Answers</h2>

                @if (isset($answers))
                    @if ($answers)
                        @foreach ($answers as $answer)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    {{$answer->body}}
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="panel panel-default">
                            <div class="panel-body">
                                There are no answers yet.
                            </div>
                        </div>
                    @endif
                @else
                    <div class="panel panel-default">
                        <div class="panel-body">
                            There are no answers yet.
                        </div>
                    </div>
                @endif

        </div>
    </div>
@endsection