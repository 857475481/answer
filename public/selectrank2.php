<?php
header("Content-type:text/html;charset=utf-8");
//1.建立连接
$connect=mysqli_connect('106.14.62.38','root','SWP4syAFJfcraG4Y','qa','3306');
//2.定义sql语句
$sql="SELECT mytime,url,name,score,jishicount FROM xus ORDER BY score DESC, jishicount ASC,mytime ASC";
mysqli_query($connect,'set names utf8');
//3.发送SQL语句
$result=mysqli_query($connect,$sql);

if ($result){
    $reslist = array();
    $i=0;
    $arr = array();

    while($row = mysqli_fetch_row($result)) {
        $reslist[$i] = $row;
        $i++;

        $one=array(
            "id"=>$i,
            "url"=>$row[1],
            "name"=>base64_decode($row[2]),
            "mytime"=>$row[0],
            "score"=>$row[3],
            "jishicount"=>$row[4]
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