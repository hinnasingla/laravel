<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    public function win_bucket(){
       if($this->attributes['team_one_score'] == $this->attributes['team_two_score']){
           return 1;
       }else if($this->attributes['team_one_score'] > $this->attributes['team_two_score']){
           return 0;
       }else{
           return 2;
       }
    }
}
