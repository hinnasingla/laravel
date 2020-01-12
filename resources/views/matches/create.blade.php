@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Update Odds</h1>

                {!! Form::open(['action' => 'MatchController@store', 'method' => 'POST']) !!}

                <div class="form-group">
                    <label for="sport">Sport</label>
                    {{Form::text('sport', 'soccer' , ['placeholder'=>'Sport', 'class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="team_one">Team One</label>
                    {{Form::text('team_one', '' , ['placeholder'=>'Team One', 'class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="team_two">Team two</label>
                    {{Form::text('team_two', '' , ['placeholder'=>'Team Two', 'class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="team_one">Team One Score</label>
                    {{Form::text('team_one_score', '' , ['placeholder'=>'Team One Score', 'class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="team_two">Team two</label>
                    {{Form::text('team_two_score', '' , ['placeholder'=>'Team Two Score', 'class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="start_time">Match Time</label>
                    {{Form::text('start_time', '' , ['placeholder'=>'Match Time', 'class'=>'form-control datetime-field', 'type'=>'datetime-local'])}}

                </div>

                {{Form::submit('submit', [])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
