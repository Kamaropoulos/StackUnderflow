@extends('layouts.app')


@section('pageTitle', $question->title)
@section('askURL', 'ask')

@section('content')
    <div class="container">
        <div class="row">
            <div class="list-group-item">
                <button type="button" class="btn btn-link btn-sm"
                        onClick="location.href=window.location.href+'/upvote'">
                    <span class="glyphicon glyphicon-chevron-up"></span>
                </button>
                <span class="label label-primary">{{ $question_votes }}</span>
                <button type="button" class="btn btn-link btn-sm"
                        onClick="location.href=window.location.href+'/downvote'">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </button>

                <b>{{ $question->title }}</b>
                <hr>
                {{ $question->body }}
                <br>
                <hr>
                <div class="pull-right">Asked by {{ $author->name }}
                    at {{ $question->created_at->toDayDateTimeString() }}</div>
                <br>
            </div>
            <br>
            <hr>

            <h2>Answers</h2>

            @if (isset($answers))
                @if ($answers)
                    <?php $author_counter = 1; ?>
                    @foreach ($answers as $answer)

                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{--<a class="glyphicon glyphicon-chevron-up"></a>--}}
                                <button type="button" class="btn btn-link btn-sm"
                                        onClick="location.href=window.location.href+'/answer/{{ $answer->id }}/upvote'">
                                    <span class="glyphicon glyphicon-chevron-up"></span>
                                </button>
                                <span class="label label-primary">{{ $answers_votes[$author_counter] }}</span>
                                {{--<a class="glyphicon glyphicon-chevron-down"></a>--}}
                                <button type="button" class="btn btn-link btn-sm"
                                        onClick="location.href=window.location.href+'/answer/{{ $answer->id }}/downvote'">
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </button>
                                <div class="pull-right">
                                    Answered by {{ $answer_authors[$author_counter]->name }}
                                    at {{ $question->created_at->toDayDateTimeString() }}
                                    <?php ++$author_counter; ?>
                                </div>
                                <hr>
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

            <div class="panel panel-default">
                <h3>&nbsp;&nbsp;Your Answer</h3>
                <hr>
                <div class="panel-body">
                    <form action="../questions/{{ $question->id }}/answer" method="POST" role="form">
                        <div class="form-group">
                            <textarea class="form-control" id="body" name="body"></textarea>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection