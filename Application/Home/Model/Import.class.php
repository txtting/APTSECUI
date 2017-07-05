<?php

namespace Home\Model;
use PHPExcel;
use PHPExcel_IOFactory;

class Import
{
    public static function excel($filePath = "", $tables = array())
    {
        $filePath = "./Uploads/".$filePath; // 要读取的文件的路径
        $PHPExcel = new PHPExcel(); // 拿到实例，待会儿用
        $PHPReader = new \PHPExcel_Reader_Excel2007(); // Reader很关键，用来读excel文件
        if (!$PHPReader->canRead($filePath)) { // 这里是用Reader尝试去读文件，07不行用05，05不行就报错。注意，这里的return是Yii框架的方式。
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if (!$PHPReader->canRead($filePath)) {
                $errorMessage = "Can not read file.";
                return $this->render('error', ['errorMessage' => $errorMessage]);
            }
        }
        $PHPExcel = $PHPReader->load($filePath); // Reader读出来后，加载给Excel实例
        $data = [];
        foreach ($tables as $key => $value) {
            $currentSheet = $PHPExcel->getSheetByName($value);
            $result = [];
            foreach ($currentSheet->getRowIterator() as $row) { // 行迭代器

                $cellIterator = $row->getCellIterator(); // 拿到行中的cell迭代器
                $cellIterator->setIterateOnlyExistingCells(false); // 设置cell迭代器，遍历所有cell，哪怕cell没有值
                $lineVal = [];
                foreach ($cellIterator as $cell) {

                    if ($cell->getDataType() == \PHPExcel_Cell_DataType::TYPE_NUMERIC) { // 这里是比较cell中数据类型是不是number
                        $cellStyleFormat = $cell->getStyle( $cell->getCoordinate() )->getNumberFormat(); // 接下来这两句是拿到这个number的格式
                        $formatCode = $cellStyleFormat->getFormatCode(); // 如果是普通的数字，formatCode将为General, 如果是如6/12/91 12:00的时间格式，formatCode将为/d/yy h:mm（反正就是时间格式了）
                         //dump($formatCode);
                        if ($formatCode == 'yyyy/m/d\ h:mm;@'|| $formatCode == "mm-dd-yy") {
                            $value = \PHPExcel_Shared_Date::ExcelToPHP($cell->getValue()) - 28800;
                            //dump($value);
                        } else {
                            $value = $cell->getValue();
                            //dump("aa");
                        }
                    } else {
                        $value = $cell->getValue();
                        //dump("bb");
                    }
                    array_push($lineVal, $value);
                }
                array_push($result, $lineVal);
            }
        $data[$key] = $result;
        }
        return $data;
    }

}