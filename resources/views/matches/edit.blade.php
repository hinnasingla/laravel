@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Update Match</h1>

                <form method="POST" action="/matches/{{$match->id}}" accept-charset="UTF-8">
                    @csrf
                    <div class="form-group">
                        <label for="team_one">Team One</label>
                        {{Form::text('sport', $match->sport , ['placeholder'=>'Sport', 'class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label for="team_one">Team One</label>
                        {{Form::text('team_one', $match->team_one , ['placeholder'=>'Team One', 'class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label for="team_two">Team two</label>
                        {{Form::text('team_two', $match->team_two , ['placeholder'=>'Team Two', 'class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label for="team_one">Team One Score</label>
                        {{Form::text('team_one_score', $match->team_one_score , ['placeholder'=>'Team One Score', 'class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label for="team_two">Team two</label>
                        {{Form::text('team_two_score', $match->team_two_score , ['placeholder'=>'Team Two Score', 'class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label for="start_time">Match Time</label>
                        {{Form::text('start_time', $match->start_time , ['placeholder'=>'Match Time', 'class'=>'form-control', 'type'=>'datetime-local'])}}

                    </div>

                    {{Form::submit('submit', [])}}
                </form>
            </div>
        </div>
    </div>
@endsection
