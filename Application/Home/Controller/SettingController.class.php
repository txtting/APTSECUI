<?php
namespace Home\Controller;
class SettingController extends CommonController {
    public function index(){
        $attack = M('attack_name') -> where('sel=1')->select() ;
        $this -> assign('attack',$attack);
        layout('Layout/layout');
        $this->display();
    }
    public function safereportset(){
        $attack = M('attack_name') -> where('sel=1')->select() ;
        $this -> assign('attack',$attack);
        layout('Layout/layout');
        $this->display();
    }
    public function attack_change_nosel(){
        $where = [];
        $where['id'] = array('in',I('post.ids'));
        $res = M('attack_name') -> where($where)->save(['sel'=>0]);
        if($res>0){
            $this->ajaxReturn(['status'=>'success','msg'=>'去除成功']);
        }else{
            $this->ajaxReturn(['status'=>'error','msg'=>'去除失败']);
        } $this->ajaxReturn(['status'=>'error','msg'=>'去除失败']);
    }
    public function attack_change_sel(){
        $ids = M('attack_name') -> where('sel=0')->getField('id',true);
        $ids = implode(',',$ids);
        $where = [];
        $where['id'] = array('in',$ids);
        $res = M('attack_name') -> where($where)->setField('sel',1);
        if($res>0){
            $this->ajaxReturn(['status'=>'success','msg'=>'撤销成功']);
        }else{
            $this->ajaxReturn(['status'=>'error','msg'=>'撤销失败']);
        }
    }
    public function ugevent(){
        layout('Layout/layout');
        $this->display();
    }
    public function ugeventOK(){
        if (I('get.da1')) {
            $time = I('get.da1');
            $start = strtotime(explode('-', $time)[0]);
            $end = strtotime(explode('-', $time)[1].' 23:59:59');
            $map['time'] = array('between',array($start,$end));
        }
        if (I('get.name')) {
            $map['name'] = I('get.name');
        }
        if (I('get.phone')) {
            $map['phone'] = I('get.phone');
        }
        if (I('get.email')) {
            $map['email'] = I('get.email');
        }
        $model = M('emergency_push_contact');
        $count = $model->where($map)->count();
        $order = array('time'=>'desc');
        $page  = (I('get.pagenum')-1)*10;
        $data = $model->where($map)->order($order)->limit($page.',10')->select();
        foreach ($data as $key => &$value) {
            if(!empty($value['time'])){
                $value['time'] = date("Y-m-d H:i:s",$value['time']);
            }
        }
        //self::log('Web','紧急事件推送联系人查询',5);
        $res = [];
        if($data){
            $res['status']=ture;
        }else{
            $res['status']=false;
        }
        $res['totalNum'] = $count;
        $res['data'] = $data;
        $this ->ajaxReturn($res);
    }
    public function ugevent_add(){
        $data['name']   = I('post.name');
        $data['time']   = time();
        $where['email'] = $data['email'] = I('post.email');
        $where['phone'] = $data['phone'] = I('post.phone');
        $where['_logic'] = 'OR';
        $res = M('emergency_push_contact')->where($where)->select();
        if($res){
            $this -> ajaxReturn(['status'=>'error','msg'=>'手机号码或email地址已存在']);
        }
        $res = M('emergency_push_contact')->add($data);
        if($res>0){
            self::log('Web','添加紧急事件推送联系人',5);
            $this -> ajaxReturn(['status'=>'success','msg'=>'添加成功']);
        }else{
            $this -> ajaxReturn(['status'=>'error','msg'=>'添加失败']);
        }
    }
    public function ugevent_edite(){
        $id = I('post.id');
        $data['name']   = I('post.name');
        $data['time']   = time();
        $data['email'] = I('post.email');
        $data['phone'] = I('post.phone');
        $res1 = self::check_other_user($id,'email',$data['email']);
        $res2 = self::check_other_user($id,'phone',$data['phone']);
        if($res1||$res2){
            $this -> ajaxReturn(['status'=>'error','msg'=>'手机号码或email地址已存在']);
        }
        $res = M('emergency_push_contact')->where("id=$id")->save($data);
        if($res>0){
            self::log('Web','修改紧急事件推送联系人成功',5);
            $this -> ajaxReturn(['status'=>'success','msg'=>'修改成功']);
        }else{
            self::log('Web','修改紧急事件推送联系人失败',5);
            $this -> ajaxReturn(['status'=>'error','msg'=>'修改失败']);
        }
    }
    public function ugevent_del(){
        $id = I('post.id','','htmlspecialchars');
        $id = explode(',', $id);
        $model = M('emergency_push_contact');
        $res = $model->where(array('id'=>array('in',$id)))->delete();
        if ($res!==false) {
            self::log('Web','删除紧急事件推送联系人成功',5);
            $this->ajaxReturn(['status'=>'success','msg'=>'删除成功']);
        }else {
            self::log('Web','删除紧急事件推送联系人失败',5);
            $this->ajaxReturn(['status'=>'error','msg'=>'删除失败']);
        }
    }
    private function check_other_user($id,$key,$val){
        $user = M('emergency_push_contact');
        $map['id'] = array('neq',$id);
        $map[$key] = $val;
        $res = $user->where($map)->find();
        if ($res) {
            return true;
        }else{
            return false;
        }
    }
    public function sphinx(){
        header("content-type:text/html;charset=utf-8");
        $db =M();
        $cl = new \Org\Sphinx\SphinxClient ();
       
        $cl->SetServer ('127.0.0.1', 9312); //连接sphinx服务
        $cl->SetConnectTimeout ( 3 ); //超时时间
        $cl->SetArrayResult ( true );  //以数组形式返回获得的结果
        $cl->SetMatchMode ( SPH_MATCH_ANY);  //分词，收集分词任何部分检索的结果
        
        $cl->setLimits(0,12); //限制获取记录条数
        //（前12个记录信息）
        //索引源名称
        $index_name = "dizhi";
        $key = "市场服务";
        //$res = $cl->Query ( '被检索的关键字', "索引名称" );
        $res = $cl->Query ( $key, $index_name );
        //格式输出
        echo '<pre>';
        var_dump($res);die;
    }
    
}