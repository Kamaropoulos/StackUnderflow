@extends('layouts.app')

@section('pageTitle', 'Ask a Question')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ask a Question</div>

                    <div class="panel-body">
                        <form action="/questions/ask" method="POST" role="form">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="body">Question:</label>
                                <textarea class="form-control" id="body" name="body"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags:</label>
                                <input type="text" class="form-control" id="tags" name="tags">
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
