<?php
namespace Home\Controller;
class UrgentController extends CommonController {
    public function index(){
        layout('Layout/layout');
        $this->display();
    }
    public function indextu(){
        if(I('get.da1')) {
            $start = $this->time_data(I('get.da1'))['ts'];
            $end   = $this->time_data(I('get.da1'))['td'];
            $this ->save_time($start,$end,'ts','td');
            $this ->save_time($start,$end,'zts','ztd');
        }
        $data=[];
        //$data['data1'] = $this -> indexdata1($start,$end);
        //$data['data2'] = $this -> indexdata2($start,$end);
    }
    public function indexbiao(){
        if(I('get.da2')){
            $start = $this->time_data(I('get.da2'))['ts'];
            $end   = $this->time_data(I('get.da2'))['td'];
        }else{
            $start = $this->time_data(I('get.da1'))['ts'];
            $end   = $this->time_data(I('get.da1'))['td'];
        }
        $sort = I('get.sort');
        $order = I('get.order');
        $type = is_null(I('get.urgent_type'))? '':I('get.urgent_type');
        $page = is_null(I('get.pagenum'))? 1:I('get.pagenum');
        $res = $this -> indexdata3($start,$end,$type,$page,$sort,$order);
        echo json_encode($res);
    }
    public function indexzhutu(){
        if(I('get.sign')){
            $sign = I('get.sign');
            $times =  $this -> zhututime($sign);
            dump(date('Y-m-d'),$times['start']);
            dump(date('Y-m-d'),$times['end']);
        }
    }
    public function indexdata3($start,$end,$type='',$page=1,$sort='Time',$order='ASC'){
        $url = 'http://10.80.6.2:8070/byzoro.apt.com/urgencies/list/day?start='.$start.'&end='.$end.'&page='.$page.'&sort='.$sort.'&order='.$order.'&count=10&type='.$type;
        $data = request($url,false);
        $data = json_decode($data,true);
        foreach ($data['data']['Elements'] as $key => &$value) {
            if($value['Time']){
               $value['Time'] =date("Y-m-d H:i:s",$value['Time']);
            }
        }
        //dump($data);
        $data = SafeFilter($data);
        //dump($data);die;
        $arr=[];
        if($data['data']['Elements']){
            $arr['status']=ture;
        }else{
            $arr['status']=false;
        }
        $arr['totalNum']=$data['data']['Totality'];
        $arr['data']=$data['data']['Elements'];
        return $arr;
    }
}