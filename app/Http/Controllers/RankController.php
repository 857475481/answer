<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromCollection;


class RankController extends Controller
{

    public function login($code){
        $appid=config('wechat.miniprogram.appid');
        $secret=config('wechat.miniprogram.secret');
       $res= Http::get("https://api.weixin.qq.com/sns/jscode2session?appid='.$appid.'&secret='.$secret.'&js_code='.$code.'&grant_type=authorization_code",[
            'code'=>$code
        ]);
        return $res;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function show(Rank $rank)
    {
        //
        return $rank->all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rank $rank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rank $rank)
    {
        //
    }
}
