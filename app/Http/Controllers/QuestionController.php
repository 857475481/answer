<?php

namespace App\Http\Controllers;
ini_set('memory_limit',-1);
use App\Models\Question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionsImport;
use SebastianBergmann\CodeCoverage\Report\PHP;

class QuestionController extends Controller
{

    public function import(){
     $question=new    QuestionsImport();
     Excel::import($question,'123.xlsx',null, \Maatwebsite\Excel\Excel::XLSX);

    }
    public function ExtractQuestion($n/*Request $request*/){
        $questions=[];
        $item=[];
        // $n=$request->input('n');
      
        $res=Question::all()->toArray();
    
        $questions=array_rand($res, $n);
      
        // var_dump($res[$questions[2]]['q']);
        // exit();
        foreach ($questions as $key => $value) {
            $item[]=[
                "question"=>$res[$value]['q'],
                "option"=>[
                    [
                        'id'=>1,
                        'name'=>$res[$value]['a'],
                        'value'=>'A'
                    ],
                    [
                        'id'=>1,
                        'name'=>$res[$value]['b'],
                        'value'=>'B'
                    ],
                    [
                        'id'=>1,
                        'name'=>$res[$value]['c'],
                        'value'=>'C'
                    ],
                    [
                        'id'=>1,
                        'name'=>$res[$value]['d'],
                        'value'=>'D'
                    ]


                ],
                "an"=>$res[$value]['an']

            ];
        }
        return $item;


    }
    
}
