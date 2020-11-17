<?php
header("content-Type: text/html; charset=Utf-8"); //设置字符的编码是utp-8

addExcel();


//接收前台文件
 function addExcel()
 {
     //接收前台文件
     $ex = $_FILES['file'];
     //重设置文件名
     $filename = time() . substr($ex['name'], stripos($ex['name'], '.'));

     $path = './excel/' . $filename;//设置移动路径
     move_uploaded_file($ex['tmp_name'], $path);

     /*读取excel文件，并进行相应处理*/


     require_once '../ThinkPHP/Library/Vendor/PHPExcel/PHPExcel/IOFactory.php';

     try {
         $objPHPExcel = PHPExcel_IOFactory::load($path);
     } catch (PHPExcel_Reader_Exception $e) {
     }

//获取sheet表格数目

     $sheetCount = $objPHPExcel->getSheetCount();

//默认选中sheet0表

     $sheetSelected = 0;
     try {
         $objPHPExcel->setActiveSheetIndex($sheetSelected);
     } catch (PHPExcel_Exception $e) {
     }

//获取表格行数

     try {
         $rowCount = $objPHPExcel->getActiveSheet()->getHighestRow();
     } catch (PHPExcel_Exception $e) {
     }

//获取表格列数

     try {
         $columnCount = $objPHPExcel->getActiveSheet()->getHighestColumn();
     } catch (PHPExcel_Exception $e) {
     }

     echo "<div>工作表数量 : " . $sheetCount . "　　行数： " . $rowCount . "　　列数：" . $columnCount . "</div>";

     $dataArr = array();


     /* 循环读取每个单元格的数据 */

        //行数循环



     for ($row = 2; $row <= $rowCount; $row++) {

         //列数循环 , 列数是以A列开始


         for ($column = 'A'; $column <= F; $column++) {

             $dataArr[] = $objPHPExcel->getActiveSheet()->getCell($column . $row)->getValue();

               $column . $row . ":" . $objPHPExcel->getActiveSheet()->getCell($column . $row)->getValue() . "<br />";

         }
         //表用函数方法 返回数组
         //$exfn = $this->_readExcel($path); // 读取内容

         //$this->upload_file($exfn, $path); // 上传数据


     }
//1.建立连接
     $connect=mysqli_connect('106.14.62.38','root','Mysql123','qa','3306');
     mysqli_query($connect,'set names utf8');
     for ($i=0;$i<=($rowCount-1)*6-1;$i+=6){


             $one="('".$dataArr[$i]."','".$dataArr[$i+1]."','".$dataArr[$i+2]."','".$dataArr[$i+3]."','".$dataArr[$i+4]."','".$dataArr[$i+5];
                //sql语句拼接
              $sql="INSERT INTO ti (q, a, b, c, d, an) VALUES".$one."');";

                //3.发送SQL语句
                $result=mysqli_query($connect,$sql);



     }



    echo '<br>上传成功';
     //4.关闭连接
     mysqli_close($connect);
     // 上传完文件之后删除文件，避免造成垃圾文件的堆积
     unlink($path);


 }

