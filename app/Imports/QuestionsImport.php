<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class QuestionsImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        // dump($rows);
        // exit();
        foreach ($rows as $row) {


            Question::create([
                'q' => $row[0],
                'a' => $row[1],
                'b' => $row[2],
                'c' => $row[3],
                'd' => $row[4],
                'an' => $row[5]
            ]);
        }
    }
}
