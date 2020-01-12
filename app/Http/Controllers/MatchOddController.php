<?php

namespace App\Http\Controllers;

use App\Match;
use App\MatchOdd;
use App\Post;
use Illuminate\Http\Request;

class MatchOddController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($match_id)
    {
        $match = Match::find($match_id);
        return view('match_odd.create')->with('match', $match);
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
            'team_one' => 'required',
            'team_two' => 'required',
            'tie' => 'required'
        ]);

        $mo = new MatchOdd();
        $mo->match_id = $request->input("match_id");
        $mo->team_one = $request->input("team_one");
        $mo->team_two = $request->input("team_two");
        $mo->tie = $request->input("tie");
        $mo->save();

        return redirect("/match/" . $mo->match_id)->with('success', "Match Odd Updated");
    }
}
