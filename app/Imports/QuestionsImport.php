<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
set_time_limit(0);
class QuestionsImport implements ToModel//ToCollection
{

    // public function collection(Collection $rows)
    // {
    //     // dump($rows[0][5]);
    //     // exit();
    //     foreach ($rows as $k=>$row) {
            
            
    //             // dump($row[0]);
            
    //         Question::create([
    //             'q' => $row[0],
    //             'a' => $row[1],
    //             'b' => $row[2],
    //             'c' => $row[3],
    //             'd' => $row[4],
    //             'an' => $row[5]
    //         ]);
    //     }
    //     // exit();
    // }
    public function model(array $row)
    {
        // dump($row);
        // exit();
        return new Question([
            'q' => $row[0],
                'a' => $row[1],
                'b' => $row[2],
                'c' => $row[3],
                'd' => $row[4],
                'an' => $row[5]
        ]);
    }
}
