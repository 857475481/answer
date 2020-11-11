<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{     public function record($openid){
        return Record::create([
            'openid'=>$openid,
            'date'=>date('Ymd')
        ]);
    }
     public function getAnswered($openid,$count){
        $c=Record::where(['openid'=>$openid,'date'=>date('Ymd')])->count();
        if($c < $count){
            return 0;
        }else {
            
            return 1;    
        }
            
        
    }
    //
}
