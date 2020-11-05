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
        // $n=$request->input('n');  //需要随机抽取题目的数量
        mt_srand();  //生成随机数种子
        $res=Question::all(); //获得所有题目,不直接抽题是因为题目的id如果缺少了，生成随机数刚好命中,会出错,取得所有的记录以后保证索引都是存在的。
        for($i=0;$i< $n;$i++){

            $questions[]=$res[mt_rand(0,$res->count()-1)];
        }
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
            # code...
        }
        return $item;
        // for($j=0;$j<10;$j++){
        //     $questions=[];

        // for($i=0;$i<10;$i++){

        //     $questions[]=$res[mt_rand(0,$res->count()-1)];
        // }

        // foreach ($questions as $key => $value) {
        //     # code...
        //     echo $value['id'].'</br>';
        // }
        // echo '--------------------------------------------------------------';
        // }



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
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
