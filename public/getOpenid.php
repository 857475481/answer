<?php
header("Content-type:text/html;charset=utf-8");
$code = $_GET['code'];

$appid="wx485c3615539b7102";
//wx1f80a24d7354bba8

$secret="3d5e927c8b21c80b577090755c987606";

//47b0ab97256ffed3c9a02185a656ba40
$url='https://api.weixin.qq.com/sns/jscode2session?appid='.$appid.'&secret='.$secret.'&js_code='.$code.'&grant_type=authorization_code';

curl_file_get_contents($url);

 function curl_file_get_contents($durl){
    // header传送格式
    $headers = array(
        "token:1111111111111",
        "over_time:22222222222",
    );
    // 初始化
    $curl = curl_init();
    // 设置url路径
    curl_setopt($curl, CURLOPT_URL, $durl);
    // 将 curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true) ;
    // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
    curl_setopt($curl, CURLOPT_BINARYTRANSFER, true) ;
    // 添加头信息
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    // CURLINFO_HEADER_OUT选项可以拿到请求头信息
    curl_setopt($curl, CURLINFO_HEADER_OUT, true);
    // 不验证SSL
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    // 执行
    $data = curl_exec($curl);
    // 打印请求头信息
//        echo curl_getinfo($curl, CURLINFO_HEADER_OUT);
    // 关闭连接
    curl_close($curl);
echo $data;
    // 返回数据
    return $data;


}