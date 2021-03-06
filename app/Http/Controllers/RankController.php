<?php

namespace App\Http\Controllers;

use App\Models\DayRank;
use App\Models\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class RankController extends Controller
{
    public function getUserById(Request $req){
        $openid=$req->input('uid');
        return Rank::where(['openid'=>$openid])->first();

    }
    public function uIsE($id){
        if(Rank::where(['openid'=>$id])->count()>0)
           {
               return ['status'=>true];
           }else {
               return ['status'=>false];

           }
    }
    public function login2($code){
        $appid=config('wechat.miniprogram.appid');
        $secret=config('wechat.miniprogram.secret');
         $res= Http::get("https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code");
         return  $res;


    }
    public function login($code){
        $appid=config('wechat.miniprogram.appid');
        $secret=config('wechat.miniprogram.secret');
         $res= Http::get("https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code");
         if(isset($res)){
           if(Rank::where(['openid'=>$res['openid']])->count()<=0)
           {
                 Rank::create(['openid'=>$res['openid']]);

                 return  $res;
           }

         }
                  return $res;
    }
    public function getRank(){
        $res=Rank::where('score','>',0)->orderBy('score','desc')->orderBy('jishicount','asc')->get();
        foreach ($res as $k=>$v)
        {
            $v['name']=base64_decode($v['name']);
        }

        return $res;
    }
    public function getRank2(){
        $res=Rank::where('day_score','>',0)->orderBy('day_score','desc')->orderBy('day_count','asc')->get();
        foreach ($res as $k=>$v)
        {
            $v['name']=base64_decode($v['name']);
        }

        return $res;
    }
    public function Record(Request $request){
        $openid=$request->input('uid');
        $res=$request->input('res');
        $nickname=$request->input('name');
        $url=$request->input('url');
        $rank= Rank::where([
            'openid'=>$openid
        ]);
        if($res){
            $score=$request->input('score');

        $count=$request->input('jishicount');

        $rank->increment('score',$score);
        $rank->increment('jishicount',$count);
        $rank->update([
            'day_score'=>$score,
            'day_count'=>$count

        ]);
    //   return $rank= Rank::where([
    //         'openid'=>$openid
    //     ])->increment('jishicount',$count);
      //  DayRank::record($openid,$score,$count,$nickname,$url,date("Ymd"));
        }else{

         return     Rank::where([
            'openid'=>$openid])->update([
            'name'=>base64_encode($nickname),
            'url'=> $url
        ]);
        }


    }

    public function ClearScoreAndTime(){
        Rank::where([['score','>',0],['jishicount','>',0]])->update(['score'=>0,'jishicount'=>0]);
    }
    public function show(Rank $rank)
    {
        //
        return $rank->all();
    }

}
