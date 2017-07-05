<?php 
function exportExcel($expTitle,$expCellName,$expTableData,$fileName){
    $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
    $cellNum = count($expCellName);
    $dataNum = count($expTableData);
    import("Extend.Vender.PHPExcel");
    $objPHPExcel = new \PHPExcel();
    $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
    $objPHPExcel->setActiveSheetIndex();  
    for($i=0;$i<$cellNum;$i++){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'1', $expCellName[$i][1]); 
    } 
    $objPHPExcel->getActiveSheet()->setTitle('Admin');
    for($i=0;$i<$dataNum;$i++){
      for($j=0;$j<$cellNum;$j++){
        $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+2), $expTableData[$i][$expCellName[$j][0]]);
      }             
    }  
    header('pragma:public');
    header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
    header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
    $objWriter->save('php://output'); 
    exit;   
}
public function excel_all($datas, callable $colCallback = null, callable $valueCallback = null,$filename = "", $count = 0)
    {

        $rootPath = C("DOWN_PATH");
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Byzoro百卓网络")
            ->setTitle("Byzoro百卓网络");

        $datas_count = count($datas);
        $data_count = 0;

        if ($datas_count === 0 && $filename === ""){
            return array('status' => 1,'message' => '无数据导出');
        } else if ($datas_count === 0 && $filename !== "") {
            return array('status' => 2,'message' => '导出完毕','filename' => $filename,'count' => $count);
        }

        $index     = 0;
        foreach ($datas as $name => $data)
        {
            $temp_count = count($data);
            $data_count = $data_count > $temp_count ? $data_count : $temp_count;
            $colscount = 0;
            $linecount = 2;
            $cols      = [];
            $wcols     = [];
            $objPHPExcel->createSheet();
            $objPHPExcel->setactivesheetindex($index);
            //var_dump($datas);die;
            foreach ($data as $key => $row) {
                foreach ($row as $col => $value) {
                    if (!isset($cols[$col])) {
                        $c = $col;
                        $colCallback !== null && $c = $colCallback($col);
                        $intCol     = self::int2col($colscount);
                        $wcols[$c]  = $intCol;
                        $cols[$col] = $intCol;
                        $colscount++;
                    }
                    $valueCallback !== null && $value = $valueCallback($col, $value);
                    $objPHPExcel->getActiveSheet()
                        ->setCellValue($cols[$col] . $linecount, $value);
                }
               $linecount++;
            }

            $objActSheet = $objPHPExcel->getActiveSheet();
            $objActSheet->setTitle($name);
            foreach ($wcols as $c => $v) {
                 $objPHPExcel->getActiveSheet()
                    ->setCellValue($v . 1, $c);
                $objActSheet->getColumnDimension($v)->setWidth(20);
            }
            $index ++;
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $count ++;
        $filename = $filename === "" ? "Export_" . date("Y_m_d_H_i_s", time()) : $filename;
        if (!is_dir($rootPath.$filename))
        { 
            mkdir ($rootPath.$filename, 0777);
        } 
        $savename = $rootPath.$filename."/".$filename."(".$count.")".".xls";

        $objWriter->save($savename);
        // Byzoro::$app->end();
        if ($data_count < 5000) {
            return array('status' => 2,'message' => '导出完毕','filename' => $filename,'count' => $count);
        } else {
            return array('status' => 3,'filename' => $filename,'count' => $count);
        }
    }

?>