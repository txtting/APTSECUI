<?php
namespace Home\Controller;
use Home\Model\Export;
class LogController extends CommonController{
   /* public function index1($where,$pp,$count){
        $log = M('log');
        $firstRow = ($pp-1)*$count;
        $listRows = $count;
        $log_count = $log-> where($where)-> count();
        $log_data = $log->field("users.user_login, log.*")->join("LEFT JOIN users ON log.uid=users.id")->limit($firstRow.','.$listRows)->where($where)->order('time desc')->select();
        $arr=array();
        $arr[] = $log_count;
        $arr[] = $log_data;
        return $arr;
    }
    public function index(){
        $where = [];
        $pp = !empty(I('get.pp'))?I('get.pp'):1;
        if (!empty($_GET)) {
            $time = I('get.date-range-picker'); 
            $ip = I('get.webip');
            $username = I('get.username'); 
            if ($time) {
                $times = explode('-', $time);
                $time_start = strtotime($times[0]);
                $time_end = strtotime($times[1].":59");
                $where['time'] = array('between',array($time_start, $time_end));
            }
            if($ip !='') {
                $where['ip'] = $ip;
            }
            if($username !=''){
                $where['username'] =$username;
            }
        }
        if(!session('isAdmin')){
            $where['uid'] = session('uid');
        }
        $data = $this -> index1($where,$pp,15);
        $count=count($data[1]);
        $ye = ceil((float)$data[0]/15);
        $Page  = new \Think\Page($count, 10);// 实例化分页类 传入总记录数
        $Page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $log_data=array_slice($data[1],$Page->firstRow,$Page->listRows);
        //dump($log_data);die;
        $show = $Page->show();// 分页显示输出
        //self::log('Web','操作日志查询',5);
        $this->assign('log_data',$log_data);
        $this->assign('show',$show);
        $this->assign('ye',$ye);
        layout('Layout/layout');
        $this->display();
    }*/
    public function index(){
        layout('Layout/layout');
        $this->display();
    }
    public function indexOK(){
        $log = M('log');
        $where = [];
        //dump($_GET);die;
        if (!empty($_GET)) {
            $time = I('get.time'); 
            $ip = I('get.webip');
            $username = I('get.username'); 
            if ($time) {
                $times = explode('-', $time);
                $time_start = strtotime($times[0]);
                $time_end = strtotime($times[1].":59");
                $where['time'] = array('between',array($time_start, $time_end));
            }
            if($ip!='') {
                $where['ip'] = $ip;
            }
            if($username !=''){
                $where['username'] =$username;
            }
            $order = I('get.sort').' '.I('get.order');
            $page = is_null(I('get.pagenum'))? 1:I('get.pagenum');
            $page = ($page-1)*10;
        }
        if(!session('isAdmin')){
            $where['uid'] = session('uid');
        }
        $count = $log->where($where)->count();
        //dump($order);die;
        $log_data = $log->field("users.user_login,log.message,log.ip,log.time")->join("LEFT JOIN users ON log.uid=users.id")->limit($page.',10')->where($where)->order($order)->select();
        foreach ($log_data as $key => &$value) {
            if(!empty($value['time'])){
                $value['time'] = date("Y-m-d H:i:s",$value['time']);
            }
        }
        self::log('Web','操作日志查询',5);
        $res = [];
        if($log_data){
            $res['status']=ture;
        }else{
            $res['status']=false;
        }
        $res['totalNum'] = $count;
        $res['data'] = $log_data;
        $this ->ajaxReturn($res);
        
    }
    public function export_log(){
        $log = M('log');
        $where = [];
        if (!empty($_POST)) {
            $time = I('post.date-range-picker'); 
            $ip = I('post.webip');
            $username = I('post.username'); 
            if ($time) {
                $times = explode('-', $time);
                $time_start = strtotime($times[0]);
                $time_end = strtotime($times[1].":59");
                $where['time'] = array('between',array($time_start, $time_end));
            }
            if($ip !='') {
                $where['ip'] = $ip;
            }
            if($username !=''){
                $where['username'] =$username;
            }
        }
        if(!session('isAdmin')){
            $where['uid'] = session('uid');
        }
        $filename = 'log_info';
        $count = 0;
        $offset = $count * 5000;
        $log_data = $log
                ->field("users.user_login,log.app,log.ip,log.message,log.time")
                ->join("LEFT JOIN users ON log.uid=users.id")
                ->limit($offset.',5000')->where($where)->order('time desc')->select();
        
        foreach ($log_data as $key => &$value) {
            if(!empty($value['time'])){
                $value['time'] = date("Y-m-d H:i:s",$value['time']);
            }
        }
        //dump($log_data);die;
        $colFilter = function($col){
            return $this->log_col2name($col);
        };
        self::log('Web',"操作日志查询导出",5);
        Export::excel($log_data, $colFilter, $valueFilter, $filename, $count);
    }
    public function log_col2name($col){
        $cc = $this->log_name2col();
        return array_search($col, $cc);
    }
    public function log_name2col(){
        $cc = [
          '用户名称'     => 'user_login',
          'WEB'          => 'app',
          '客户端IP'     => 'ip',
          '操作日志信息' => 'message',
          '时间'         => 'time',
       ];
      return $cc;
    }
    public function index1(){
        layout('Layout/layout');
        $this->display();
    }
    public function indexOK1(){
        $log = M('log');
        $where = [];
        //dump($_GET);die;
        if (!empty($_GET)) {
            $time = I('get.time'); 
            $ip = I('get.webip');
            $username = I('get.username'); 
            if ($time) {
                $times = explode('-', $time);
                $time_start = strtotime($times[0]);
                $time_end = strtotime($times[1].":59");
                $where['time'] = array('between',array($time_start, $time_end));
            }
            if($ip!='') {
                $where['ip'] = $ip;
            }
            if($username !=''){
                $where['username'] =$username;
            }
            $order = I('get.sort').' '.I('get.order');
            $page = is_null(I('get.pagenum'))? 1:I('get.pagenum');
            $page = ($page-1)*10;
        }
        if(!session('isAdmin')){
            $where['uid'] = session('uid');
        }
        $count = $log->where($where)->count();
        //dump($order);die;
        $log_data = $log->field("users.user_login,log.message,log.ip,log.time")->join("LEFT JOIN users ON log.uid=users.id")->limit($page.',10')->where($where)->order($order)->select();
        foreach ($log_data as $key => &$value) {
            if(!empty($value['time'])){
                $value['time'] = date("Y-m-d H:i:s",$value['time']);
            }
        }
        self::log('Web','操作日志查询',5);
        $res = [];
        if($log_data){
            $res['status']=ture;
        }else{
            $res['status']=false;
        }
        $res['totalNum'] = $count;
        $res['data'] = $log_data;
        $this ->ajaxReturn($res);
    }
}