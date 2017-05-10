@extends('layouts.app')

@section('pageTitle', $question->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <div class="vote roundrect">
                    <div class="increment up"></div>
                    <div class="increment down"></div>

                    <div class="count">4</div>
                </div>
            </div>
            <div class="col-md-7 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $question->title }}</div>

                    <div class="panel-body">
                        {{ $question->body }}
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-8 col-md-offset-2">
                <h2>Answers</h2>
            </div>
            @if (isset($answers))
                @if ($answers)
                    @foreach ($answers as $answer)
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{$answer->body}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                There are no answers yet.
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            There are no answers yet.
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
