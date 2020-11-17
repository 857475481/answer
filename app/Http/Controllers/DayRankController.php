<?php

namespace App\Http\Controllers;

use App\Models\DayRank;
use Illuminate\Http\Request;

class DayRankController extends Controller
{
    public static function record($openid,$score,$time,$name,$url,$date){
       return DayRank::create([
            'openid'=>$openid,
            'score'=>$score,
            'jishicount'=>$time,
            'name'=>$name,
            'url'=>$url,
            'mytime'=>$date
        ]);
    }
    //
}
