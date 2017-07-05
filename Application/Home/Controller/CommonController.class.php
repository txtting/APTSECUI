<?php
namespace Home\Controller;
use Think\Controller;
use Think\Auth;
Class CommonController extends Controller
{ 
    public function _initialize()
    {
        $this->check_login();
        $auth = new Auth();
        if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,session('uid'))){
            $this -> ajaxReturn(['status'=>'error','msg'=>'没有权限或该模块不存在']);
        }
        if (MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME != 'Home/System/check_status') {
            self::update(session('uid'));
        }  
        $this->assign('module', $think . MODULE_NAME);
        $this->assign('controller', $think . CONTROLLER_NAME);
        $this->assign('action', $think . ACTION_NAME);
    }
    public function update($id){
        $user = M('users');
        $data['last_login_time'] = time();
        $data['last_login_ip'] = get_client_ip();
        $user->where(['id'=>$id])->save($data);
    }
    public function get_iplong($ip){  
        //bindec(decbin(ip2long('这里填ip地址')));  
        //ip2long();的意思是将IP地址转换成整型 ，  
        //之所以要decbin和bindec一下是为了防止IP数值过大int型存储不了出现负数。  
        return bindec(decbin(ip2long($ip)));  
    }
    //判断IP是否在IP段内
    public function check_ips_range($start_ip,$end_ip,$ip){
        $ip_start = self::get_iplong($start_ip); //起始ip  
        $ip_end = self::get_iplong($end_ip);//至ip  
        $ip = self::get_iplong($ip);//判断的ip  
        //可以这样简单判断  
        if($ip>=$ip_start && $ip <=$ip_end){  
             return true; 
        }else{  
             return false; 
        } 
    } 

    /*public function ipv6_cmp($ipv6, $mask){   
        $ip_split = explode(":", $ipv6);
        $mask_split = explode(":", $mask);
        for ( $i = 0; $i < 8; $i++ )
        {
            $start_ip[$i] = bin2hex(hex2bin($ip_split[$i]) & hex2bin($mask_split[$i]));
            $end_ip[$i] = bin2hex(hex2bin($ip_split[$i]) | ~hex2bin($mask_split[$i]));
        }
        for ( $i = 0; $i < 8; $i++ )
        {
            $start_ip1 = $start_ip1.$start_ip[$i].":";
            $end_ip1 = $end_ip1.$end_ip[$i].":";
        }
        $start_ip = trim ( $start_ip1 ,  " \t:" );
        $end_ip = trim ( $end_ip1 ,  " \t:" );
        $ipAddrs = array();
        array_unshift($ipAddrs,$start_ip,$end_ip);
        return $ipAddrs;
     }*/
    public static function log($app, $message='', $level=5, $data=[]){
        $log = M('log');
        $data['app'] = $app;
        $data['ip'] = get_client_ip();
        $data['username'] = $_SESSION['username'];
        $data['message'] = $message;
        $data['level'] = $level;
        $data['uid'] = session('uid') ? session('uid'):0;
        $data['time'] = time();
        $log->add($data);
    }
    public function check_login()
    {   
        if(!session('username') && !session('uid')) {
            $this->redirect('Login/index');
        }
    }
    public function initMenu()
    {
        $Menu = F("Menu");
        if (!$Menu) {
            $Menu = D("Menu")->menu_cache();
        }
        return $Menu;
    }
    public function save_time($start,$end,$ts,$td){
        session($ts,$start);
        session($td,$end);
        session('n',0);
    }
    public function time_data($date){
        $time = explode('-', $date);
        $ts   = strtotime($time[0]);
        $td   = strtotime($time[1]."23:59:59");
        $times = array('ts'=>$ts,'td'=>$td);
        return $times;
    }
    public function zhututime($sign){
        $ts = session('ts');
        $td = session('td');
        $n  = session('n');
        $d  = (int)(floor(($td-$ts)/(10*24*3600)));
        $times = [];
        if($d==2){
            $times[0]['end']   =  $td;
            $times[0]['start'] =  $td - 10*24*3600 + 1;
            $times[1]['end']   =  $td - 10*24*3600;
            $times[1]['start'] =  $td - 20*24*3600 + 1;
            $times[2]['end']   =  $td - 20*24*3600;
            $times[2]['start'] =  $ts;
        }
        if($d==1){
            $times[0]['end']   =  $td;
            $times[0]['start'] =  $td - 10*24*3600 + 1;
            $times[1]['end']   =  $td - 10*24*3600;
            $times[1]['start'] =  $ts;
        }
        if($d==0){
            $times[0]['end']   =  $td;
            $times[0]['start'] =  $ts;
        }
        $i = $d>0 ? $d:1;
        if($sign==1){
            $n++;
            $n = $n>=$d ? $i:$n;
            if($n==1&&$d!=0){
                $time = array('start'=>$times[1]['start'],'end'=>$times[1]['end']);
            }elseif($n==1&&$d==0){
                $time = array('start'=>$times[0]['start'],'end'=>$times[0]['end']);
            }
            if($n==2&&$d==2){
                $time = array('start'=>$times[2]['start'],'end'=>$times[2]['end']);
            }elseif($n==2&&$d==1){
                $time = array('start'=>$times[1]['start'],'end'=>$times[1]['end']);
            }elseif($n==2&&$d==0){
                $time = array('start'=>$times[0]['start'],'end'=>$times[0]['end']);
            }
        }elseif($sign==2){
            $n--;
            $n = $n<=0? 0:$n;
            if($n==0){
                $time = array('start'=>$times[0]['start'],'end'=>$times[0]['end']);
            }
            if($n==1&&$d!=0){
                $time = array('start'=>$times[1]['start'],'end'=>$times[1]['end']);
            }elseif($n==1&&$d==0){
                $time = array('start'=>$times[0]['start'],'end'=>$times[0]['end']);
            }
        }
        session('n',$n);
        return $time;
    }
}