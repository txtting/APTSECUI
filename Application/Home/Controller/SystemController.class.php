<?php
namespace Home\Controller;
class SystemController extends CommonController {
    public function setting(){
     	layout('Layout/layout');
     	$this->display();
    }
    public function update(){
     	layout('Layout/layout');
     	$this->display();
    }
    public function password_edit(){
    	$id = session('uid');
    	$user = M('users');
    	$res = $user->where(['id'=>$id])->field('user_pass')->find();
    	if (IS_POST) {
     		$password = I('post.password');
     	 	$password_new = I('post.password_new');
    	    $password_new2 = I('post.password_new2');
        }
        if (md5($password) != $res['user_pass']) {
            $this->ajaxReturn(['status'=>'error1']);
        }else if ($password_new != $password_new2) {
            $this->ajaxReturn(['status'=>'error2']);
        }else{
	        $user_pass = md5($password_new);
	        $res2 = $user -> where(['id'=>$id]) ->save(['user_pass' => $user_pass]);
	        if ($res2!==false) {
	        	//$this->log('Web',$_SESSION['username'].'修改密码|客户端IP:'.get_client_ip().'|success',5,['user_pass' => $user_pass]);
	        	$this->ajaxReturn(['status'=>'success']);
	        }else{
	        	//$this->log('Web',$_SESSION['username'].'修改密码|客户端IP:'.get_client_ip().'|success',5,['user_pass' => $user_pass]);
	       		$this->ajaxReturn(['status'=>'failed']);
	        }
        }
    }
    public function do_sys(){
        $sys_config = M('sys_config');
        $data['out_time'] = I('post.out_time');
        $data['ip_limit'] = I('post.ip_limit');
        $ext = extract($data);
        $sys_config = M('sys_config');
        $datas['uid'] = session('uid');
        foreach ($data as $k => $v) {
            $datas['key'] = $k;
            $datas['val'] = $v; 
            $res = $sys_config->where(['uid'=>session('uid'),'key'=>$k])->find();
            if ($res) {
                $sys_config->where(['id'=>$res['id']])->save(['val'=>$v]);
            }else{
                $sys_config->add($datas);
            }
        }
        $this->ajaxReturn(array('status' => 'success'));
    }
    public function check_status(){
        $users = M('users');
        $sys_config = M('sys_config');
        $user_info = $users->where(['id'=>session('uid')])->find();
        $status = $sys_config->where(['uid'=>session('uid'),'key'=>'out_time'])->field('val')->find();
        (int)$status['val'] = $status['val']?$status['val']:C('SESSION_EXPIRE');
        
        $time = time()-(int)$user_info['last_login_time'];
        if ($time>(int)$status['val']) {
            //var_dump((int)$status['val']);die;
            //$this->logs('Web','admin超时退出');
            $_SESSION = array(); 
            setcookie(session_name(),'',time()-1,'/');
            session_destroy();
            $this->ajaxReturn(['status'=>'out_time']);
        }else{
            $this->ajaxReturn(['status'=>'keeplived']);
        }
    }
}