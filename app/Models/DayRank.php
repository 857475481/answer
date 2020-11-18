<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayRank extends Model
{

    use HasFactory;
    protected $fillable =['openid','score','url','name','jishicount','openid','mytime'];
    public static function record($openid,$score,$time,$name,$url,$date){
        return self::create([
             'openid'=>$openid,
             'score'=>$score,
             'jishicount'=>$time,
             'name'=>$name,
             'url'=>$url,
             'mytime'=>$date
         ]);
     }
}
