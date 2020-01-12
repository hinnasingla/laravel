{!! Form::open(['action' => 'MatchOddController@store', 'method' => 'POST']) !!}
    {{Form::text('match_id', $match->id , ['placeholder'=>'Match ID', 'class'=>'d-none'])}}

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="team_one">{{$match->team_one}}</label>
            {{Form::text('team_one', '' , ['placeholder'=>'Team One Odds', 'class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-3">
            <label for="tie">Tie</label>
            {{Form::text('tie', '' , ['placeholder'=>'Tie Odds', 'class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-3">
            <label for="team_two">{{$match->team_two}}</label>
            {{Form::text('team_two', '' , ['placeholder'=>'Team Two Odds', 'class'=>'form-control'])}}
        </div>
        <div class="form-group">
            <br/>
            {{Form::submit('Update Odds', ['class'=>'btn btn-primary mt-2'])}}
        </div>
    </div>
{!! Form::close() !!}
