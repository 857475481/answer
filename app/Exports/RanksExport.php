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
        $rank= new Rank(['openid','name','url','score','mytime','daybeforescore','daybeforecount']);
        return $rank->all();
        //
    }
}
