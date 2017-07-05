<?php
namespace Home\Controller;
class SafeController extends CommonController {
    public function index(){
        layout('Layout/layout');
        $this->display();
    }
    public function file(){
        layout('Layout/layout');
        $this->display();
    }
    public function bruteforce(){
        layout('Layout/layout');
        $this->display();
    }
    public function gettypename($table,$type){
        $where=[];
        $where['name'] = $type;
        return  M($table) -> where($where)-> getField('title');
    }
    public function gettype($table,$type){
        $where=[];
        $where['name'] = $type;
        return  M($table) -> where($where)-> getField('title,color');
    }
    public function typename($table){
        $arr = M($table) -> getField('name,title,color');
        return $arr;
    }
    public function zhulisttime($start,$end,$n){
        $listtime = [];
        for($i=$n;$i>=0;$i--){
            $listtime[$n-$i][] = date('m-d',$end - $i*24*3600);
        }
        return $listtime;
    } 
    public function initdata0($table,$start,$end,$n){
        $field = $this -> typename($table);
        $arr = [];
        $i = 0;
        $listtime = $this -> zhulisttime($start,$end,$n);
        foreach ($field as $k => $v) {
            foreach ($listtime as $k1 => $v1) {
                $arr[$i]['name'] = $v['title'];
                $arr[$i]['data'][$k1]['name'] = $v1[0];
                $arr[$i]['data'][$k1]['y'] = 0;
            }
            $i++;
        }
        return $arr;
    }
    public function initdata1($data,$table,$start,$end,$n){
        $arr = [];
        $i = 0;
        foreach ($data['data']['classify'] as $k => $v) {
            $time = date('m-d',$v['time']);
            $field = $this -> typename($table);
            $listtime = $this -> zhulisttime($start,$end,$n);
            foreach ($field as $k1 => $v1) {
                if($i>=count($field)){
                    $i = 0;
                }
                foreach ($listtime as $k2 => $v2) {
                    $arr[$i]['name'] = $v1['title'];
                    $arr[$i]['data'][$k2]['name'] = $v2[0];
                    if($v2[0]==$time){
                        $arr[$i]['data'][$k2]['y'] += $v[$k1];
                    }else{
                        $arr[$i]['data'][$k2]['y'] += 0;
                    }
                    $arr[$i]['data'][$k2]['color'] = $v1['color'];
                }
                $i++;
            }
        }
        //dump($arr);die;
        return $arr;
    }
	
    public function indextu(){
        /*$t1 = microtime(true);*/
        if(I('get.da1')) {
            $start = $this->time_data(I('get.da1'))['ts'];
            $end   = $this->time_data(I('get.da1'))['td'];
            $this ->save_time($start,$end,'ts','td');
            $this ->save_time($start,$end,'zts','ztd');
        }
        $data=[];
        $data['data1'] = $this -> indexdata1($start,$end);
        if(floor(($end-$start)/(10*24*3600)) > 0){
            $start = $end - 10*24*3600 + 1;
        }else{
            $start = $start;
        }
        $data['data2'] = $this -> indexdata2($start,$end);
        /*$t2 = microtime(true);  
        echo '程序耗时'.round($t2-$t1,5).'秒';die;*/
        echo json_encode($data);
    }
    public function filetu(){
        if(I('get.da1')) {
            $start = $this->time_data(I('get.da1'))['ts'];
            $end   = $this->time_data(I('get.da1'))['td'];
            $this -> save_time($start,$end,'ts','td');
            $this -> save_time($start,$end,'zts','ztd');
        }
        $data=[];
        $data['data1'] = $this -> filedata1($start,$end);
        if(floor(($end-$start)/(10*24*3600)) > 0){
            $start = $end - 10*24*3600 + 1;
        }else{
            $start = $start;
        }
        $data['data2'] = $this -> filedata2($start,$end);
        echo json_encode($data);
    }
    public function brutu(){
        if(I('get.da1')) {
            $start = $this->time_data(I('get.da1'))['ts'];
            $end   = $this->time_data(I('get.da1'))['td'];
            $this  -> save_time($start,$end,'ts','td');
            $this  -> save_time($start,$end,'zts','ztd');
        }
        $data=[];
        $data['data1'] = $this -> brudata1($start,$end);
        if(floor(($end-$start)/(10*24*3600)) > 0){
            $start = $end - 10*24*3600 + 1;
        }else{
            $start = $start;
        }
        $data['data2'] = $this -> brudata2($start,$end);
        echo json_encode($data);
    }
    public function indexbiao(){
        //$t1 = microtime(true);  
        $sort  = I('get.sort');
        $order = I('get.order');
        $type  = I('get.types');
        $page  = I('get.pagenum');
        $data  = [];
        if(I('get.da2')){
            $start = $this->time_data(I('get.da2'))['ts'];
            $end   = $this->time_data(I('get.da2'))['td'];
        }else{
            $start = $this->time_data(I('get.da1'))['ts'];
            $end   = $this->time_data(I('get.da1'))['td'];
        }
        $data['data4'] = $this -> indexdata1($start,$end,4,$type);
        $data['data3'] = $this -> indexdata3($start,$end,$type,$page,$sort,$order);
        //$t2 = microtime(true);  
        //echo '程序耗时'.round($t2-$t1,5).'秒';die;
        echo json_encode($data);
    }
    public function filebiao(){
        $sort  = I('get.sort');
        $order = I('get.order');
        $type  = I('get.types');
        $page  = I('get.pagenum');
        $data  = [];
        if(I('get.da2')){
            $start = $this->time_data(I('get.da2'))['ts'];
            $end   = $this->time_data(I('get.da2'))['td'];
            
        }else{
            $start = $this->time_data(I('get.da1'))['ts'];
            $end   = $this->time_data(I('get.da1'))['td'];
        }
        $data['data4'] = $this -> filedata1($start,$end,4,$type);
        //dump($data['data4']);die;
        $data['data3'] = $this -> filedata3($start,$end,$type,$page,$sort,$order);
        echo json_encode($data);
    }
    public function brubiao(){
        $sort  = I('get.sort');
        $order = I('get.order');
        $type  = I('get.types');
        $page  = I('get.pagenum');
        $data  = [];
        if(I('get.da2')){
            $start = $this->time_data(I('get.da2'))['ts'];
            $end   = $this->time_data(I('get.da2'))['td'];
        }else{
            $start = $this->time_data(I('get.da1'))['ts'];
            $end   = $this->time_data(I('get.da1'))['td'];
        }
        $data['data4'] = $this -> brudata1($start,$end,4,$type);
        //dump($data['data4']);die;
        $data['data3'] = $this -> brudata3($start,$end,$type,$page,$sort,$order);
        echo json_encode($data);
    }
    public function indexzhutu(){
        if(I('get.sign')){
            $sign = I('get.sign');
            $times =  $this -> zhututime($sign);
            $start =  $times['start'];
            $end   =  $times['end'];
            $data  = [];
            $data['data2']  =  $this -> indexdata2($start,$end);
            echo json_encode($data);
        }
    }
    public function filezhutu(){
        if(I('get.sign')){
            $sign  =  I('get.sign');
            $times =  $this -> zhututime($sign);
            $start =  $times['start'];
            $end   =  $times['end'];
            $data  = [];
            $data['data2']  =  $this -> filedata2($start,$end);
            echo json_encode($data);
        }
    }
    public function bruzhutu(){
        if(I('get.sign')){
            $sign = I('get.sign');
            $times =  $this -> zhututime($sign);
            $start =  $times['start'];
            $end   =  $times['end'];
            $data  = [];
            $data['data2']  =  $this -> brudata2($start,$end);
            echo json_encode($data);
        }
    }
    public function indexdata1($start,$end,$n,$type=''){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/httpflow/trend/day?start='.$start.'&end='.$end;
        $data = request($url,false);
        $data = json_decode($data,true);
        if($data['msg'] == 'success'){
            $str = [];
            $i = 0;
            if($n==4){
                if($type==''){
                    $str[0]['class'] = 'types sel';
                }else{
                    $str[0]['class'] = 'types';
                }
                $str[0]['data'] = '';
                $str[0]['name'] = '全部'; 
                $str[0]['num'] = (int)$data['data']['counts'];
            }
            foreach ($data['data']['elements'][0] as $k => $v) {
                if($n==4){
                    $i++;
                    if($k==$type&&$type!=''){
                        $str[$i]['class'] = 'types sel';
                    }else{
                        $str[$i]['class'] = 'types';
                    }
                    $str[$i]['data'] = $k;
                    $field = $this->gettype('waf_type',$k);
                    foreach ($field as $k1 => $v1) {
                        $str[$i]['name'] = $k1;
                    }  
                    $str[$i]['num'] = (int)$v;
                }else{
                    if($v!=0){
                        $field = $this->gettype('waf_type',$k);
                        foreach ($field as $k1 => $v1) {
                            $str[$i]['name']  = $k1;
                            $str[$i]['color'] = $v1;
                        }
                        $str[$i]['y'] = (int)$v;   
                        $i++; 
                    } 
                }    
            }
        }
        return $str;
    }
    public function filedata1($start,$end,$n,$type=''){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/fileThreat/trend/day?start='.$start.'&end='.$end;
        $data = request($url,false);
        $data = json_decode($data,true);
        if($data['msg'] == 'success'){
            $str = [];
            $i = 0;
            if($n==4){
                if($type==''){
                    $str[0]['class'] = 'types sel';
                }else{
                    $str[0]['class'] = 'types';
                }
                $str[0]['data'] = '';
                $str[0]['name'] = '全部'; 
                $str[0]['num'] = (int)$data['data']['counts'];
            }
            foreach ($data['data']['elements'][0] as $k => $v) {
                if($n==4){
                    $i++;
                    if($k==$type&&$type!=''){
                        $str[$i]['class'] = 'types sel';
                    }else{
                        $str[$i]['class'] = 'types';
                    }
                    $str[$i]['data'] = $k;
                    $field = $this->gettype('vds_type',$k);
                    foreach ($field as $k1 => $v1) {
                        $str[$i]['name'] = $k1;
                    } 
                    $str[$i]['num'] = (int)$v;
                }else{
                    if($v!=0){
                        $field = $this->gettype('vds_type',$k);
                        foreach ($field as $k1 => $v1) {
                            $str[$i]['name']  = $k1;
                            $str[$i]['color'] = $v1;
                        }
                        $str[$i]['y'] = (int)$v;  
                        $i++; 
                    } 
                }    
            }
        }
        return $str;
    }
    public function brudata1($start,$end,$n,$type=''){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/malFlow/trend/day?start='.$start.'&end='.$end;
        $data = request($url,false);
        $data = json_decode($data,true);
        if($data['msg'] == 'success'){
            $str = [];
            $i = 0;
            if($n==4){
                if($type==''){
                    $str[0]['class'] = 'types sel';
                }else{
                    $str[0]['class'] = 'types';
                }
                $str[0]['data'] = '';
                $str[0]['name'] = '全部'; 
                $str[0]['num'] = (int)$data['data']['counts'];
            }
            foreach ($data['data']['elements'][0] as $k => $v) {
                if($n==4){
                    $i++;
                    if($k==$type&&$type!=''){
                        $str[$i]['class'] = 'types sel';
                    }else{
                        $str[$i]['class'] = 'types';
                    }
                    $str[$i]['data'] = $k;
                    $field = $this->gettype('ids_type',$k);
                    foreach ($field as $k1 => $v1) {
                        $str[$i]['name'] = $k1;
                    }
                    $str[$i]['num'] = (int)$v;
                }else{
                    if($v!=0){
                        $field = $this->gettype('ids_type',$k);
                        foreach ($field as $k1 => $v1) {
                            $str[$i]['name']  = $k1;
                            $str[$i]['color'] = $v1;
                        }
                        $str[$i]['y'] = (int)$v;  
                        $i++; 
                    } 
                }    
            }
        }
        return $str;
    }
    public function indexdata2($start,$end){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/httpflow/classify/day?start='.$start.'&end='.$end;
        $data = request($url,false);
        $data = json_decode($data,true);
        $n = ($end - $start)/24/3600;
        if($data['msg']=='success'){
            if($data['data']['counts']==0){
                $arr = $this -> initdata0('waf_type',$start,$end,$n);
            }else{
                $arr = $this -> initdata1($data,'waf_type',$start,$end,$n);
            }            
        }
        return $arr;

    }
    public function filedata2($start,$end){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/fileThreat/classify/day?start='.$start.'&end='.$end;
        $data = request($url,false);
        $data = json_decode($data,true);
        $n = ($end - $start)/24/3600;
        if($data['msg']=='success'){
            if($data['data']['counts']==0){
                $arr = $this -> initdata0('vds_type',$start,$end,$n);
            }else{
                $arr = $this -> initdata1($data,'vds_type',$start,$end,$n);
            }
            return $arr;
        }
    }
    public function brudata2($start,$end){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/malFlow/classify/day?start='.$start.'&end='.$end;
        $data = request($url,false);
        $data = json_decode($data,true);
        $n = ($end - $start)/24/3600;
        if($data['msg']=='success'){
            if($data['data']['counts']==0){
                $arr = $this -> initdata0('ids_type',$start,$end,$n);
            }else{
                $arr = $this -> initdata1($data,'ids_type',$start,$end,$n);
            }
            return $arr;
        }
    }
    public function indexdata3($start,$end,$type=0,$page=1,$sort='time',$order='ASC'){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/httpflow/list?start='.$start.'&end='.$end.'&page='.$page.'&sort='.$sort.'&order='.$order.'&count=10&type='.$type;
        $data = request($url,false);
        $data = json_decode($data,true);
        foreach ($data['data']['elements'] as $key => &$value) {
            if($value['time']){
                $value['time'] =date("Y-m-d H:i:s",$value['time']);
            }
            if($value['attack']){
                $value['attack'] = $this -> gettypename('waf_type',$value['attack']);
            }
            if(isset($value['severity'])){
                $value['severity'] = $this -> gettypename('waf_severity',$value['severity']);
            }
            if($value['tags']){
                $value['tags'] = str_replace("[u'",'',$value['tags']);
                $value['tags'] = str_replace("']",'',$value['tags']);
                $value['tags'] = str_replace("', u'",'；',$value['tags']);
            }
        }
        $data = SafeFilter($data);
        $arr=[];
        if($data['data']['elements']){
            $arr['status']=ture;
        }else{
            $arr['status']=false;
        }
        $arr['totalNum']=$data['data']['total'];
        $arr['data']=$data['data']['elements'];

        return $arr;
    }
    public function filedata3($start,$end,$type='',$page=1,$sort='time',$order='ASC'){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/fileThreats/list/day?start='.$start.'&end='.$end.'&page='.$page.'&sort='.$sort.'&order='.$order.'&count=10&type='.$type;
        //dump($url);
        $data = request($url,false);
        $data = json_decode($data,true);
       // dump($data);die;
        $arr=[];
        foreach ($data['data']['elements'] as $key => &$value) {
            if($value['time']){
               $value['time'] =date("Y-m-d H:i:s",$value['time']);
            }
            if($value['localVType']){
                $value['localVType'] = $this -> gettypename('vds_type',$value['localVType']);
            }
            if(empty($value['subFile'])){
                $value['path'] = $value['filePath'];
                $value['subFile'] = '无';
            }else{
                $value['path'] = $value['filePath'].'/'.$value['subFile'];
            }
        }
        $data = SafeFilter($data);
        if($data['data']['elements']){
            $arr['status']=ture;
        }else{
            $arr['status']=false;
        }
        $arr['totalNum']=(int)$data['data']['total'];
        $arr['data']=$data['data']['elements'];
        return $arr;
    }
    public function brudata3($start,$end,$type='',$page=1,$sort='time',$order='ASC'){
        $url = 'http://'.C('API_IP').'/byzoro.apt.com/malFlow/list/day?start='.$start.'&end='.$end.'&page='.$page.'&sort='.$sort.'&order='.$order.'&count=10&type='.$type;
        $data = request($url,false);
        $data = json_decode($data,true);
        foreach ($data['data']['elements'] as $key => &$value) {
            if($value['time']){
               $value['time'] =date("Y-m-d H:i:s",$value['time']);
            }
            if($value['severity']){
               $value['severity'] = $this -> getlevel($value['severity']);
            }
            if($value['byzoroType']){
                $value['byzoroType'] = $this -> gettypename('ids_type',$value['byzoroType']);
            }
        }
        $arr=[];
        if($data['data']['elements']){
            $arr['status']=ture;
        }else{
            $arr['status']=false;
        }
        $arr['totalNum']=$data['data']['total'];
        $arr['data']=$data['data']['elements'];
        return $arr;
    }

    public function getlevel($value){
        $sev = '';
        switch ((int)$value) {
            case 1:
                $sev = '严重';
                break;
            case 2:
                $sev = '中等';
                break;
            case 3:
                $sev = '低';
                break;
        }
        return $sev;
    }
	public function malicioust(){
        layout('Layout/layout');
        $this->display();
    }
	public function scanevent(){
        layout('Layout/layout');
        $this->display();
    }
    public function offLine(){
        $task = $this -> get_offline_num();
        $this -> assign('task',$task);
        layout('Layout/layout');
        $this->display();
    }
    public function get_offline_num(){
        $task =  M('offline_task') -> count();
        return $task;
    }
    public function get_offline_nums(){
        $task = $this -> get_offline_num();
        $this -> ajaxReturn($task);
    }
    public function offLineOK(){
        /*$where = [];
        if((int)I('get.times')){
            $start           = strtotime(explode('-', (int)I('get.times'))[0]);
            $end             = strtotime(explode('-', (int)I('get.times'))[1] ."23:59:59");
            $where['times']  = array('between',array($start,$end));
        }
        if(I('get.types')){
            $where['types']  = I('get.types','','htmlspecialchars');
        }
        if(I('get.status')){
            $where['status'] = I('get.status','','htmlspecialchars');
        }
        $order = I('get.sort').' '.I('get.order');
        $page = is_null((int)I('get.pagenum'))? 1:(int)I('get.pagenum');
        $limit = (int)I('get.limit');
        $page = ($page-1)*10;*/
        $url = 'http://'.C('API_IPOFF').'/byzoro.apt.com/off-line-dispatch/tasklist';
        $data = request($url,false);
        $data = json_decode($data,true);
        foreach ($data['data']['elements'] as $key => &$value) {
            if($value['time']){
               $value['time'] =date("Y-m-d H:i:s",$value['time']);
            }
            if($value['start']&&$value['end']){
               $value['setimes'] = $value['start'].'-'.$value['end'];
            }
        }
        $res=[];
        if($data['data']['elements']){
            $res['status'] = ture;
        }else{
            $res['status'] = false;
        }
        $res['totalNum']   = $data['data']['total'];
        $res['data']       = $data['data']['elements'];
        $this ->ajaxReturn($res);
    }
    public function offline_add(){
        if(IS_POST){
            $name  = I('post.name','','htmlspecialchars');
            $type = I('post.types','','htmlspecialchars');
            $start = explode(' - ', I('post.date'))[0];
            $end   = explode(' - ', I('post.date'))[1];
            $time = time();
        }
        $url = 'http://'.C('API_IPOFF').'/byzoro.apt.com/off-line-dispatch/operate?cmd=creat&name='.$name.'&time='.$time.'&type='.$type.'&start='.$start.'&end='.$end;
        $res = request($url,false);
        $res = json_decode($res,true);
        if($res['data']['result']=='ok'){
            $this -> ajaxReturn(['status'=>'success','msg'=>'添加成功']);
        }else{
            $this -> ajaxReturn(['status'=>'error','msg'=>'添加失败']);
        }
    }
    public function offline_start(){
        $where = [];
        $data['status'] = 'runing';
        if(IS_POST){
            $where['name']  = $name  = I('post.name','','htmlspecialchars');
            $where['times'] = $time  = strtotime(I('post.times','','htmlspecialchars'));
        }

        $url = 'http://'.C('API_IPOFF').'/byzoro.apt.com/off-line-dispatch/operate?cmd=start&name='.$name.'&time='.$time;
        $res = request($url,false);
        $res = json_decode($res,true);
        //dump($res);die;
        $num = M('offline_task') -> count();
        if($num<10){
            if($res['data']['result']=='ok'){
                M('offline_task') -> add($where);
                $this -> ajaxReturn(['status'=>'success','msg'=>'任务在进行中,鼠标移至扫描进度可查看进度详情']);
            }else{
                $this -> ajaxReturn(['status'=>'error','msg'=>'开始扫描任务失败']);
            }
        }else{
            $this -> ajaxReturn(['status'=>'error','msg'=>'最多开始10个离线任务']);
        }
    }
    public function offline_stop(){
        $where = [];
        $where = array('name'=>I('post.name','','htmlspecialchars'),'times'=>strtotime(I('post.times','','htmlspecialchars')));
        $data['status'] = '已终止';
        $res = M('offline') -> where($where)->save($data);
        if($res!==false){
            $this -> ajaxReturn(['status'=>'success','msg'=>'任务已终止,鼠标移至扫描进度可查看进度详情']);
        }else{
            $this -> ajaxReturn(['status'=>'error','msg'=>'终止扫描任务失败']);
        }
    }
    public function offline_del(){
        $where = [];
        if(IS_POST){
            $where['name']  = $name  = I('post.name','','htmlspecialchars');
            $where['times'] = $time  = strtotime(I('post.times'));
        }
        $url = 'http://'.C('API_IPOFF').'/byzoro.apt.com/off-line-dispatch/operate?cmd=delete&name='.$name.'&time='.$time;
        //dump($url);die;
        $res = request($url,false);
        $res = json_decode($res,true);
        if($res['data']['result']=='ok'){
            M('offline_task') -> where($where)->delete();
            $this -> ajaxReturn(['status'=>'success','msg'=>'任务删除成功']);
        }else{
            $this -> ajaxReturn(['status'=>'error','msg'=>'任务删除失败']);
        }
    }
    public function get_offline_rate(){
        $tasklist =  M('offline_task') -> field('name,times as time') -> select();
        foreach ($tasklist as $key => &$value) {
            $value['time'] = (int)$value['time'];
        }
        $tasklist = json_encode($tasklist);
        $url = 'http://'.C('API_IPOFF').'/byzoro.apt.com/off-line-dispatch/taskstatus?tasklist='.$tasklist;
        //dump($url);die;
        $arr = request($url,false);
        $arr = json_decode($arr,true);
        //dump($arr);die;
        $this -> ajaxReturn($arr['data']);
    }
    //del_offline_task
    public function del_offline_task(){
        $where = [];
        if(IS_POST){
            $where['name']  = I('post.name','','htmlspecialchars');
            $where['times'] = I('post.times');
        }
        //dump($where);die;
        $res = M('offline_task') -> where($where)->delete();
        if($res>0){
            $this -> ajaxReturn(['status'=>'success']);
        }else{
            $this -> ajaxReturn(['status'=>'error']);
        }
    }
    public function offLine_details(){
        $data           = [];
        $data['types']  = I('get.types','','htmlspecialchars');
        $data['name']   = (string)I('get.name','','htmlspecialchars');
        $data['start']  = (string)I('get.start','','htmlspecialchars');
        $data['end']    = (string)I('get.end','','htmlspecialchars');
        $data['times']  = (int)strtotime(I('get.times'));
        $this           -> assign('detail_data',json_encode($data['types'])); 
        session('detail_get',$data);
        layout('Layout/layout');
        $this->display();
    }
    public function offLine_detailsOK(){
        $detail_get = session('detail_get');
        if($detail_get){
            $start = strtotime(explode('-', $detail_get['start']));
            $end   = strtotime(explode('-', $detail_get['end']) ."23:59:59");
        }
        $status    = I('get.status','','htmlspecialchars');
        $order     = I('get.order');
        $sort      = I('get.sort');
        $page      = is_null((int)I('get.pagenum'))? 1:(int)I('get.pagenum');
        $limit     = (int)I('get.limit');
        if($detail_get['types']=='waf'){
            $res   = $this -> indexdata3($start,$end,'',$page,$sort,$order);
        }elseif($detail_get['types']=='vds'){
            $res   = $this -> filedata3($start,$end,'',$page,$sort,$order);
        }else{
            $res   = $this -> brudata3($start,$end,'',$page,$sort,$order);
        }
        $this  -> ajaxReturn($res);
    }
   
}