@extends('layouts.app')


@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        {{Form::text('title', '' , ['placeholder'=>'Title'])}}
        <br/>
        {{Form::textarea('body', '' , ['placeholder'=>'Body Text'])}}

        {{Form::submit('submit', [])}}
    {!! Form::close() !!}
@endsection
