<?php
$openid = $_GET['id'];
$score= $_GET['score'];
$jishicount= $_GET['jishicount'];
$name=base64_encode($_GET['name']);
$url=$_GET['url'];
$mytime=date('Y-m-d H:i:s', time());


//1.建立连接
$connect=mysqli_connect('106.14.62.38','root','SWP4syAFJfcraG4Y','qa','3306');
//2.定义sql语句
$sql="INSERT INTO xus (openid,name,url,mytime,score,jishicount) VALUES('$openid','$name','$url','$mytime','$score','$jishicount')";

mysqli_query($connect,'set names utf8');
echo $sql;
//3.发送SQL语句
$result=mysqli_query($connect,$sql);

if ($result){
    echo "ok";
} else{
    echo "no";
}
//4.关闭连接
mysqli_close($connect);