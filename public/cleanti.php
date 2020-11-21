<?php

//1.建立连接
$connect=mysqli_connect('43.226.33.210','root','NGLLFnjZehwJfjjZ','qa','3306');
//2.定义sql语句
$sql="truncate table answer_questions;";
mysqli_query($connect,'set names utf8');
//3.发送SQL语句
$result=mysqli_query($connect,$sql);

if ($result){
    echo "ok";
} else{
    echo "no";
}
//4.关闭连接
mysqli_close($connect);
?>