<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }
    public function indexOK(){
        $user = M('users');
        $pass = I('post.password');           
        $mcode = I('post.code');
        //dump($mcode);
        $verify = new \Think\Verify();
        if($verify->check($mcode,'')){
            $res = $user->where(array('user_login'=>I('post.username'),'user_pass'=>md5(I('post.password'))))->find();
            if ($res) {
                session('uid',$res['id']);
                session('username',$res['user_login']);
                //默认不是超级管理员
                session('isAdmin',0);
                setcookie('userid',$res['id'],time()+3600*24);
                setcookie('username',$res['user_login'],time()+3600*24);
                self::update($res['id']);
                //查看是否为超级管理员
                if($res['user_type']==1){
                    session('isAdmin',1);
                }
                // A('Common')-> log('Web','登录系统',5);
                if(preg_match("/[A-Za-z]/",$pass)&& preg_match("/\d/",$pass)){
                   $this->ajaxReturn(array('status'=>'success','msg'=>'登录成功'));
                } else{
                   $this->ajaxReturn(array('status'=>'warning','msg'=>'您的密码过于简单，请及时修改！'));
                } 
            }else{
                //A('Common')-> log('Web','登录系统失败',5);
                $this->ajaxReturn(array('status'=>'error','msg'=>'用户名或密码错误'));
            }
        }else{
            //A('Common')-> log('Web','登录系统失败',5);
            //dump('验证码错误请重新输入');die;
            $this->ajaxReturn(array('status'=>'error','msg'=>'验证码错误请重新输入'));
        }
    }
    public function verify(){
      $config =    array(
            'imageW'    =>    130,
            'imageH'    =>    42,
            'fontSize'    =>    19,    // 验证码字体大小
            'length'    =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'useCurve'    =>    false,
            'bg'        =>    array(208, 238, 238),
            //'fontttf'   =>  '5.ttf',  
      );
      $verify = new \Think\Verify($config);
      $ver    = $verify->entry();
    }
    public function check_ip($uid){
        $sys_config = M('sys_config');
        $res = $sys_config->where(['uid'=>$uid,'key'=>'ip_limit'])->field('val')->find();
        if (!empty($res['val'])) {
            $explode_str = explode('/', $res['val']);
            $res = self::isSubNetIP($explode_str[0],$explode_str[1],get_client_ip());
            if($res){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
    static public function update($id){
       $user = M('users');
       $data['last_login_time'] = time();
       $data['last_login_ip'] = get_client_ip();
       $user->where(['id'=>$id])->save($data);
    }
    public function logout(){
          if(!session('uid')){
              $this->redirect('Login/index');
          }
          A('Common')->log('Web','主动退出',5);
          $_SESSION = array(); //清除SESSION值.
          setcookie(session_name(),'',time()-1,'/');
          session_destroy();  //清除服务器的sesion文件
          $this->redirect('Login/index');
    }
    public function isSubNetIP($ip, $subnetMask, $clientIp)
    {
        // 将ip地址和子网掩码转换为整数
        $ipNum = ip2long($ip);
        //$clientIp = ip2long($clientIp);

        $subnetMask=(long2ip(ip2long("255.255.255.255")
           << (32-$subnetMask)));
        $subnetMaskNum = ip2long($subnetMask);
        // 下面的计算需要必须能够了解子网掩码的相关知识
        // 计算网络号对应的整数（此地址为此网段的起始地址，但是是表示网段，所以不能分给主机使用）
        $netNum = long2ip($ipNum & $subnetMaskNum);
        // 计算网段结束IP地址（此地址此网段的结束IP地址，但是是广播地址，所以不能分给主机使用）
        $broadcastIPNum = long2ip($ipNum | (~$subnetMaskNum));

        if ($netNum <= $clientIp && $broadcastIPNum >= $clientIp) {
           return true;
        }else{
           return false;
        }
        
    }
}