@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Update Odds</h1>

                {!! Form::open(['action' => 'MatchOddController@store', 'method' => 'POST']) !!}
                {{Form::text('match_id', $match->id , ['placeholder'=>'Match ID', 'class'=>'invisible'])}}


                <div class="form-group">
                    <label for="team_one">{{$match->team_one}}</label>
                    {{Form::text('team_one', '' , ['placeholder'=>'Team One Odds', 'class'=>'form-control'])}}
                </div>



                <div class="form-group">
                    <label for="tie">Tie</label>
                    {{Form::text('tie', '' , ['placeholder'=>'Tie Odds', 'class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="team_two">{{$match->team_two}}</label>
                    {{Form::text('team_two', '' , ['placeholder'=>'Team Two Odds', 'class'=>'form-control'])}}
                </div>


                {{Form::submit('submit', [])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
