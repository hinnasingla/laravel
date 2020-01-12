<?php

namespace App\Http\Controllers;

use App\Match;
use App\MatchBet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($match_id)
    {
        $match = Match::find($match_id);
        return view('bet.create')->with('match', $match);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'match_id' => 'required',
            'odds' => 'required',
            'bet_amount' => 'required'
        ]);

        $mb = new MatchBet();
        $mb->match_id = $request->input("match_id");
        $mb->team = $request->input("team");
        $mb->odds = $request->input("odds");
        $mb->bet_amount = $request->input("bet_amount");
        if(empty($mb->team)){
            $mb->team = '';
        }
        $mb->save();

        return redirect("/match/" . $mb->match_id)->with('success', "Bet Updated");
    }
}
