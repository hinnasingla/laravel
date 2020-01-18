@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Bet</h1>
                <form method="POST" action="/bet" accept-charset="UTF-8">
                    @csrf
                    {{Form::text('match_id', $match->id , ['placeholder'=>'Match ID', 'class'=>'invisible'])}}
                    <div class="form-group">
                        <label for="team">Team</label><br/>
                        <div>
                            <div class="form-check form-check-inline">
                                {{ Form::radio('team', $match->team_one, false, ['id'=>$match->team_one, "class"=>"form-check-input"]) }}
                                <label class="form-check-label" for="{{$match->team_one}}">{{$match->team_one}}</label>
                            </div>

                            <div class="form-check form-check-inline">
                                {{ Form::radio('team', $match->team_two, false, ['id'=>$match->team_two, "class"=>"form-check-input"]) }}
                                <label class="form-check-label" for="{{$match->team_two}}">{{$match->team_two}}</label>
                            </div>

                            <div class="form-check form-check-inline">
                                {{ Form::radio('team', '', false, ['id'=>'Tie', "class"=>"form-check-input"]) }}
                                <label class="form-check-label" for="Tie">Tie</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="odds">Odds</label>
                        {{Form::text('odds', '' , ['placeholder'=>'Odds', 'class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        {{Form::text('bet_amount', '' , ['placeholder'=>'Amount', 'class'=>'form-control'])}}
                    </div>

                    {{Form::submit('submit', [])}}
                </form>
            </div>
        </div>
    </div>
@endsection
