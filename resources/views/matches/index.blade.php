@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>Matches <a class="float-right btn btn-warning btn-sm" href="/matches/create">NEW</a></h3>
                <div class="row">
                    <div class="col-md-12">
                        @if(count($matches) > 0)
                            <table class="table table-condensed">
                                <tr class="thead-dark">
                                    <th>Details</th>
                                    <th>Score</th>
                                    <th>Start Time</th>
                                    <th>LastUpdated</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($matches as $match)
                                    <tr>
                                        <td>{{$match->team_one}} vs {{$match->team_two}}</td>
                                        <td>{{$match->team_one_score}} - {{$match->team_two_score}}</td>
                                        <td>{{$match->start_time}}</td>
                                        <td>{{$match->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="/match/{{$match->id}}">INFO</a>
                                            <a class="btn btn-warning btn-sm" href="/matches/{{$match->id}}/edit">EDIT</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif

                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
