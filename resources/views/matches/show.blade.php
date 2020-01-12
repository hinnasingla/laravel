@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>{{$match->team_one}} vs {{$match->team_two}}</h3>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                @include('partials.match_form', ['match' => $match])
                            </div>
                            <div class="card-body">
                                @include('partials.match_odd_form', ['match' => $match])
                                @if(count($odds) > 0)
                                    <table class="table table-condensed">
                                        <tr class="thead-dark">
                                            <th>{{$match->team_one}}</th>
                                            <th>Tie</th>
                                            <th>{{$match->team_two}}</th>
                                            <th>LastUpdated</th>
                                        </tr>
                                        @foreach($odds as $odd)
                                            <tr>
                                                <td>{{$odd->team_one}}</td>
                                                <td>{{$odd->tie}}</td>
                                                <td>{{$odd->team_two}}</td>
                                                <td>{{$odd->updated_at->diffForHumans()}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-center">BET SUMMARY
                                <a class="btn btn-primary btn-sm float-right" href="/match/{{$match->id}}/bet/create">BET</a>
                            </div>

                            <div class="card-body">
                                @if(count($bets) > 0)
                                    <table class="table table-condensed">
                                        <tr class="thead-dark">
                                            <th>Team</th>
                                            <th>Odd and Amount</th>
                                            <th>Win</th>
                                        </tr>
                                        @section('statement')
                                            {{$total_bet = 0}}
                                            {{$team_one_win = 0}}
                                            {{$team_two_win = 0}}
                                            {{$tie = 0}}
                                        @endsection
                                        @foreach($bets as $bet)
                                            <tr>
                                                <td>
                                                    @if(empty($bet->team))
                                                        Tie
                                                        @section('statement')
                                                            {{$tie = $tie + ($bet->bet_amount*$bet->odds)}}
                                                        @endsection
                                                    @else
                                                        @section('statement')
                                                            @if($bet->team == $match->team_one)
                                                                {{$team_one_win = $team_one_win + ($bet->bet_amount*$bet->odds)}}
                                                            @else
                                                                {{$team_two_win = $team_two_win + ($bet->bet_amount*$bet->odds)}}
                                                            @endif
                                                        @endsection
                                                        {{$bet->team}}
                                                    @endif
                                                </td>
                                                <td>{{$bet->odds}}*{{$bet->bet_amount}}</td>
                                                <td>Rs. {{$bet->odds*$bet->bet_amount}}</td>
                                                @section('statement')
                                                    {{$total_bet = $total_bet + $bet->bet_amount}}
                                                @endsection
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="font-weight-bold">Total Bet</td>
                                            <td></td>
                                            <td class="font-weight-bold">Rs. {{$total_bet}}</td>
                                        </tr>
                                    </table>
                                    <table class="table table-condensed">
                                        <tr class="thead-dark">
                                            <th class="{{ $match->win_bucket() == 0 ? 'text-success' : ''}}">{{$match->team_one}}</th>
                                            <th class="{{ $match->win_bucket() == 1 ? 'text-success' : ''}}">Tie</th>
                                            <th class="{{ $match->win_bucket() == 2 ? 'text-success' : ''}}">{{$match->team_two}}</th>
                                        </tr>
                                        <tr>
                                            <th class="{{ $team_one_win-$total_bet < 0 ? 'text-danger' : 'text-success'}}">{{$team_one_win-$total_bet}}</th>
                                            <th class="{{ $tie-$total_bet < 0 ? 'text-danger' : 'text-success'}}">{{$tie-$total_bet}}</th>
                                            <th class="{{ $team_two_win-$total_bet < 0 ? 'text-danger' : 'text-success'}}">{{$team_two_win-$total_bet}}</th>
                                        </tr>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
