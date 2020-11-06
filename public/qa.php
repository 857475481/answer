<?php
header('Content-Type:application/json; charset=utf-8');
ini_set('memory_limit', '128M');


//1.建立连接
$connect=mysqli_connect('106.14.62.38','root','SWP4syAFJfcraG4Y','qa','3306');



//2.定义sql语句
$num="SELECT COUNT(*) as  num FROM ti";
//3.发送SQL语句
$numresult=mysqli_query($connect,$num);


$arr=NoRand(1,mysqli_fetch_row($numresult)[0],10);



//2.定义sql语句
$sql="SELECT q,a,b,c,d,an FROM ti WHERE id in( $arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7],$arr[8],$arr[9])";

//随机数生成器
function NoRand($begin,$end,$limit){
    $rand_array=range($begin,$end);
    shuffle($rand_array);//调用现成的数组随机排列函数
    return array_slice($rand_array,0,$limit);//截取前$limit个
}


mysqli_query($connect,'set names utf8');

//3.发送SQL语句
$result=mysqli_query($connect,$sql);

if ($result){
    $reslist = array();
    $i=0;
    $arr = array();

    while($row = mysqli_fetch_row($result)){
        $reslist[$i] = $row;
        $i++;

//        {
//                "question": "1.烙铁咀温度低有可能是以下哪些原因造成的？",
//        "option":[
//          { id: 1, name: '烙铁咀是否衍生氧化物和碳化物', value:"A"},
//          { id: 2, name: '烙铁咀是否破损', value:"B"},
//          { id: 3, name: '发热元件破损或发热元件电阻值偏小',value:"C"},
//          { id: 4, name: '以上都不对', value:"D" },
//        ] ,
//      },


           $one=array(
               "question"=>$row[0],
               "option"=>array(
                   array(
                       "id"=>"1",
                       "name"=>$row[1],
                       "value"=>"A"
                   ),
                   array(
                       "id"=>"1",
                       "name"=>$row[2],
                       "value"=>"B"
                   ),
                   array(
                       "id"=>"1",
                       "name"=>$row[3],
                       "value"=>"C"
                   ),
                   array(
                       "id"=>"1",
                       "name"=>$row[4],
                       "value"=>"D"
                   ),
               ),
               "an"=>$row[5],
           );
        array_push($arr,$one);
    }

    echo  json_encode($arr,JSON_UNESCAPED_UNICODE);

} else{
    echo "no";
}
//4.关闭连接
mysqli_close($connect);
?>
