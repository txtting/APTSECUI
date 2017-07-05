<?php
namespace Api\Controller;
use Think\Controller;
class UserController extends Controller {
    public function register(){
        if(IS_POST){
            $post = I('post.');
            //dump($post);die;
            $model = M('User0');
            $rs = $model -> where("email = '{$post['email']}'") ->find();
            if($rs){
                return $this -> error('邮箱已被注册:(',U('register'),3);
            }else{
                $rst = $model -> add($post);
                if($rst){
                    $sendToAddr = $post['email'];               
                    $title = $post['username']."恭喜你注册成功快去激活吧!";
                    $msg = "欢迎来到美食吧,".$post['username']."您好请<a href='http://www.tp.com/Api/User/active/email/$sendToAddr'>点击</a>激活您的账号";
                    $send = sendMail($title,$msg,$sendToAddr);
                    //dump($send);die;
                    if($send){
                        return $this -> success('发送激活邮件成功@~@,根据提示进行激活',U('login'),3);
                    }else{
                        return $this -> error('发送激活邮激活失败,请重新发送:(',U('active'),3);
                    }  
                }else{
                    return $this -> error('注册失败:(',U('register'),3);
                }
            }                    
        }else{
            $this -> display();
        } 
    }
    public function login(){
        echo "this is login";
    }
    public function active(){
        $email = I('get.email');
        $model = M('User0');
        $data = $model -> where("email = '$email'") ->find();
        //dump($data);die;
        if($data){
            $date['active'] = 1;
            $res = $model -> where("email = '$email'") ->save($date);
            if($res){
                return $this -> success('激活成功@~@',U('login'),3);
            }else{
                return $this -> error('激活失败,请重新注册:(',U('register'),3);
            }
        }else{
            return $this -> error('激活失败,请重新注册:(',U('register'),3);
        }
    }
    public function index1(){
        
        $this -> display();
    }
    public function index(){
        $attack = M('attack_name') -> where('sel=1')->select() ;
        $this -> assign('attack',$attack);
        layout('Layout/layout');
        $this->display();
    }
    public function index2(){
         $this -> display();
    }
    public function index3(){
         $this -> display();
    }
}