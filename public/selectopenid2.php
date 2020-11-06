<?php
$id = $_GET['id'];

//1.建立连接
$connect=mysqli_connect('106.14.62.38','root','SWP4syAFJfcraG4Y','qa','3306');
//2.定义sql语句
$sql="select * from xus where openid='$id'";
mysqli_query($connect,'set names utf8');
//3.发送SQL语句
$result=mysqli_query($connect,$sql);

if ($result){

    //echo mysqli_fetch_row($result)[1];
    while ($row = mysqli_fetch_assoc($result)) {
        echo $memberlist = $row['score'];
    }

} else{
    echo $memberlist="no";
}
//4.关闭连接
mysqli_close($connect);
?>