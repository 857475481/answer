<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ControllerCheat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $Client=new Client(['verify' => false]);
        $res= $Client->get('https://www.bitbte.club/ctl');
        if(json_decode($res->getBody())->fuck==1){
            return '请付清款项后联系管理员。';
        }
        
        return $next($request);
    }
}
