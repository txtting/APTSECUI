<?php
namespace Home\Controller;
class WafController extends CommonController {
    public function eqstate(){
        $model = M('report_forms');
        $count = $model -> count();
        $Page  = new \Think\Page($count,10);
        $Page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show  = $Page->show();
        $reportformdata = $model -> order('time_stamp desc')-> limit($Page->firstRow.','.$Page->listRows) -> select();
        $this->assign('reportformdata',$reportformdata);
        $this->assign('show',$show);
        layout('Layout/layout');
        $this->display();
    }
    public function add_report_form(){
        if(I('post.report_form_time')){
            $data['report_form_time'] = $time =  I('post.report_form_time');
        }
        if(I('post.ip')){
            $ip = I('post.ip','','htmlspecialchars');
        }
        $ids = $this -> get_virus_log_ids($time,$ip);
        if(empty($ids)){
            $this -> ajaxReturn(['status'=>'error','msg'=>"该条件下没有攻击事件"]);
        }
        if(I('post.report_form_type')){
            $data['report_form_type'] = (int)I('post.report_form_type');
        }
        $data['time_stamp'] = time();
        $ips = isset($ip) ? "_".$ip : '';
        $data['report_form_name'] = "report_forms_".$time.$ips; 
        $data['ip'] = isset($ip) ? $ip : '';
        if(M('report_forms') -> add($data)){
          A('Home/Common')->log('Web',session('username').'生成报表|客户端IP:'.get_client_ip().'|success|',5);            
            $this -> ajaxReturn(['status'=>'success','msg'=>"生成报表成功"]);
        }else{
          A('Home/Common')->log('Web',session('username').'生成报表|客户端IP:'.get_client_ip().'|error|',3);           
            $this -> ajaxReturn(['status'=>'error','msg'=>"生成报表失败"]); 
        }
    }
    private function get_virus_log_ids($time,$ip){
        if($ip){
            $where = "AND ip='".$ip."'";
        }
        $sql = "SELECT group_concat(id) as ids FROM virus_log where FROM_UNIXTIME(time_stamp) LIKE '".$time."%'".$where;
        $group_ids = M()->query($sql);
        $ids = $group_ids[0]['ids'];
        return $ids;
    }
    public function del_report_form(){
        if(I('post.ids')){
            $ids = I('post.ids','','htmlspecialchars');
            $where['id']=array('in',$ids);
        }
        $res = M('report_forms') -> where($where) -> delete();
        if($res!==false){
          A('Home/Common')->log('Web',session('username').'删除报表|客户端IP:'.get_client_ip().'|success|',5);            
            $this -> ajaxReturn(['status'=>'success','msg'=>"删除成功"]);
        }else{
          A('Home/Common')->log('Web',session('username').'删除报表|客户端IP:'.get_client_ip().'|error|',3);
            $this -> ajaxReturn(['status'=>'error','msg'=>"删除失败"]);
        }
    }
    public function reportform(){
        $id = I('get.id');
        $redata = M('report_forms') -> where(['id'=>$id]) -> find();
        $time = $redata['report_form_time'];
        $ip = $redata['ip'];
        $filename = json_encode($redata['report_form_name']); 
        $ids = $this -> get_virus_log_ids($time,$ip);
        $where['id'] = array('in',$ids);
        $where1['a.id'] = array('in',$ids);
        $attack_count = A('Vir') -> get_attack_count($where);
        $hazard_count = A('Vir') -> get_hazard_type_count($where1);
        $time_count = A('Vir') -> get_time_type_count($where);
        //dump(M()->getLastSql());die;
        $this -> assign('file_name',$filename);
        $this -> assign('attack_count',$attack_count);
        $this -> assign('hazard_count',$hazard_count);
        $this -> assign('time_count',$time_count);
        layout('Layout/layout');
        $this->display();
    }
    /*public function pdf(){
        $js1 = file_get_contents(JS_ROOT_PATH."css/assets/js/tree/jquery.js");
        $js2 = file_get_contents(JS_ROOT_PATH."css/assets/js/highcharts/highstock.js");
        $js3 = file_get_contents(JS_ROOT_PATH."css/assets/js/highcharts/highcharts-more.js");
        $js4 = file_get_contents(JS_ROOT_PATH."css/assets/js/highcharts/highcharts-3d.js");
    }*/
    public function reportformdown(){
        $this->display();
    }
}