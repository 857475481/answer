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
    Excel::import(new QuestionsImport,request()->file('que')); //,null, \Maatwebsite\Excel\Excel::XLSX

    }
    public function ExtractQuestion($n/*Request $request*/){
        $questions=[];
        $item=[];
        // $n=$request->input('n');

        $res=Question::all()->toArray();
        // dump($res);
        // exit();
        mt_srand(time()*$n);
        for($i=0;$i<$n;$i++)
        {

            $questions[]=$res[mt_rand(0,count($res)-1)];
        }
        // $questions=array_rand($res, $n);

        // var_dump($res[$questions[2]]['q']);
        // exit();
        foreach ($questions as $key => $value) {
            $item[]=[
                "question"=>$value['q'],
                "option"=>[
                    [
                        'id'=>1,
                        'name'=>$value['a'],
                        'value'=>'A'
                    ],
                    [
                        'id'=>1,
                        'name'=>$value['b'],
                        'value'=>'B'
                    ],
                    [
                        'id'=>1,
                        'name'=>$value['c'],
                        'value'=>'C'
                    ],
                    [
                        'id'=>1,
                        'name'=>$value['d'],
                        'value'=>'D'
                    ]


                ],
                "an"=>$value['an']

            ];
        }
        return $item;


    }

}
