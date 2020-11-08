<?php
//1.建立连接
$connect=mysqli_connect('106.14.62.38','root','SWP4syAFJfcraG4Y','qa','3306');
//2.定义sql语句
$sql="SELECT COUNT(*) as  num FROM ti";
mysqli_query($connect,'set names utf8');
//3.发送SQL语句
$result=mysqli_query($connect,$sql);

if ($result){
    while ($row = mysqli_fetch_assoc($result)) {
        echo $memberlist = $row['num'];
    }
}
//4.关闭连接
mysqli_close($connect);
?>