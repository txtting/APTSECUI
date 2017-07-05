<?php
namespace Home\Controller;

class VirController extends CommonController {
    public function index(){
        Layout('Layout/layout');
        $this->display();
    }
    public function indexdata(){
        $end   = time();
        $start = $end -30*24*3600;
        $data=[];
        $data['data1'] = $this -> indexdata1($start,$end);
        //$t1 = microtime(true);
        $data['data2'] = $this -> indexdata2($start,$end,'up');
        $data['data3'] = $this -> indexdata2($start,$end,'down');
        $data['data4'] = $this -> indexdata4($end);
        session('end',$end);
        session('start',$start);
        /*$t2 = microtime(true);  
        echo '程序耗时'.round($t2-$t1,5).'秒';
        die;*/
        $this->ajaxReturn($data);
    }
    public function indexdata1($start,$end){
        $url = 'http://'.C('API_IP').'chosen-default/byzoro.apt.com/urgencies/list/day?start='.$start.'&end='.$end.'&lastCount=5';
        $data = request($url,false);
        $data = json_decode($data,true);
        foreach ($data1['data']['Elements'] as $key => &$value) {
            if($value['Time']){
                $value['Time'] = date('Y-m-d H:i:s',$value['Time']);
            }
        }
        return $data['data']['Elements'];
    }
    public function indexdata2($start,$end,$direction){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/flow/minute?start='.$start.'&end='.$end.'&direction='.$direction;
        $data = request($url,false);
        $data = json_decode($data,true); 
        $arr = $this -> getindexdata2($data['data']['elements']);
        return $arr;
    }
    public function indexdataline($start,$end,$direction){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/flow/minute?start='.$start.'&end='.$end.'&direction='.$direction;
        $data = request($url,false);
        $data = json_decode($data,true); 
        $arr = $this -> getindexdata2($data['data']['elements']);
        if(empty($arr)){
            $arr = array(array($end*1000,0));
        }
        return $arr;
    }
    public function indexlinetu(){
        if(I('post.sign')){
            $n = (int)I('post.sign');
        }else{
            $n = 30;
        }
        $end = time();
        $start = $end -$n*24*3600;
        $data=[];
        $data['data2'] = $this -> indexdata2($start,$end,'up');
        $data['data3'] = $this -> indexdata2($start,$end,'down');
        $this->ajaxReturn($data);
    }
    public function getlinetu(){
        $end   = time();
        $start = $end - 5;
        $data=[];
        $data['d2']  = $this -> indexdataline($start,$end,'up')[0];
        $data['d3']  = $this -> indexdataline($start,$end,'down')[0];
        $this->ajaxReturn($data);
    }
    public function indexdiantu(){
        if(I('get.sign')=='1') {
            $td = session('end')-10*24*3600;
            $ts = session('start');
            if($td>$ts){
                $datelist = $this -> indexdata4($td);
                session('end',$td);
            }else{
                $td = session('end');
                $datelist = $this -> indexdata4($td);
            }
        }elseif(I('get.sign')=='2'){
            $td = session('end')+10*24*3600;
            $end = time();
            if($td<$end){
                $datelist = $this -> indexdata4($td);
                session('end',$td);
            }else{
                $td = session('end');
                $datelist = $this -> indexdata4($td);
            }
        }
        $data = [];
        $data['data4'] = $datelist;
        $this -> ajaxReturn($data);
    }
    public function indexdata4($end){
        $datelist = [];
        for($i=9;$i>=0;$i--){
            $datelist[] = date('m-d',$end-$i*24*3600);
        }
        return $datelist;
    }
    public function getindexdata2($arr){
        $str = [];
        foreach($arr as $k => $v){
            $str[$k][0]= (int)$v['time']*1000;
            $str[$k][1]= (int)$v['flow'];
        }
        return $str;
    }
    public function assets_detail(){  
        Layout('Layout/layout');
        $this->display();
    }
    
}