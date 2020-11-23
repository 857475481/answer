<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Rank;
class RanksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rank= new Rank();
        $res= $rank->all(['name','url','mytime','daybeforescore','daybeforecount']);
        foreach ($res as $v){
             $v->name=base64_decode($v->name);
        }
        return $res;
        //
    }
}
