<?php

namespace App\Http\Controllers;

use App\Match;
use App\MatchBet;
use App\MatchOdd;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::orderBy('created_at', 'DESC')->get();
        return view('matches.index')->with('matches', $matches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('matches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sport' => 'required',
            'team_one' => 'required',
            'team_two' => 'required',
            'team_one_score' => 'required',
            'team_two_score' => 'required',
            'start_time' => 'required'
        ]);

        $match = new Match();
        $match->sport = $request->input("sport");
        $match->team_one = $request->input("team_one");
        $match->team_two = $request->input("team_two");
        $match->team_one_score = $request->input("team_one_score");
        $match->team_two_score = $request->input("team_two_score");
        $match->start_time = $request->input("start_time");
        $match->save();

        return redirect("/matches")->with('success', "Match Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $match = Match::find($id);
        $date = Carbon::parse($match->date)->diffForHumans();
        $bets = MatchBet::where('match_id', $match->id)->get();
        $odds = MatchOdd::where('match_id', $match->id)->orderBy('created_at', 'DESC')->get();
        return view('matches.show')->with('match', $match)->with('bets', $bets)->with('odds', $odds)->with('date', $date);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $match = Match::find($id);
        return view('matches.edit')->with('match', $match);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $match = Match::find($id);

        $this->validate($request, [
            'sport' => 'required',
            'team_one' => 'required',
            'team_two' => 'required',
            'team_one_score' => 'required',
            'team_two_score' => 'required',
            'start_time' => 'required'
        ]);

        $match->sport = $request->input("sport");
        $match->team_one = $request->input("team_one");
        $match->team_two = $request->input("team_two");
        $match->team_one_score = $request->input("team_one_score");
        $match->team_two_score = $request->input("team_two_score");
        $match->start_time = $request->input("start_time");
        $match->save();

        return redirect("/match/" . $match->id)->with('success', "Match Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
