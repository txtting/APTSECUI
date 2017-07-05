<?php
namespace Home\Controller;
use Think\Tree;
class UserController extends CommonController {
    public function user(){
        $group = M('auth_group');
        $group_data = $group->select();
        unset($group_data[0]);
        $this->assign('group_data',$group_data);
        layout('Layout/layout');
        $this->display();
    }
    public function userOk(){
        $user = M('users');
        if (!empty($_GET)) {
            $usergroup = I('get.usergroup');
            $name = I('get.username','','htmlspecialchars');
            $time = I('get.da1');
            if ($usergroup) {
              $group = M('auth_group_access');
              $data = $group->where(array('group_id'=>$usergroup))->field('uid')->select();
                if ($data) {
                  foreach ($data as $k => $v) {
                    $temp[] = $data[$k]['uid'];
                  }
                  $map['users.id'] = array('in',$temp);
                }
            }
            if ($name) {
                $map['users.user_login'] = $name;
            }
            if ($time) {
                $start = strtotime(explode('-', $time)[0]);
                $end = strtotime(explode('-', $time)[1] ."23:59:59");
                $map['users.create_time'] = array('between',array($start,$end));
            }
            $order = I('get.sort').' '.I('get.order');
            $page = I('get.pagenum');
            $page = ($page-1)*10;
        } 
        $count  = $user
        ->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
        $user_data = $user
        ->where($map)
        ->limit($page.',10')->select();
        $auth_group_access = M('auth_group_access');
        foreach ($user_data as $key => &$value) {
            $auth_group = $auth_group_access 
                 -> where(array('uid' =>$value['id']))
                 -> join('LEFT JOIN auth_group ON auth_group_access.group_id=auth_group.id')
                 -> field('auth_group.title')
                 ->select();
            foreach ($auth_group as $k => $v) {
                $user_data[$key]['title'][] = $v['title'];
            }
            if(!empty($value['create_time'])){
                $value['create_time'] = date("Y-m-d H:i:s",$value['create_time']);
            }else{
                $value['create_time'] = '--';
            }
            if(!empty($value['last_login_time'])){
                $value['last_login_time'] = date("Y-m-d H:i:s",$value['last_login_time']);
            }else{
                $value['last_login_time'] = '--';
            }          
        }
        $res = [];
        if($user_data){
            $res['status']=ture;
        }else{
            $res['status']=false;
        }
        $res['totalNum'] = $count;
        $res['data'] = $user_data;
        $this ->ajaxReturn($res);
    }
    public function user_add(){
        $usergroup = I('post.usergroup');
        if ($_SESSION['isAdmin']=='0'&& in_array('1', $usergroup)) {
           $this->ajaxReturn(['status'=>'error','msg'=>'没有权限']);
        }
        if(IS_POST){
            $data['user_login'] = $datas['user_name'] = I('post.name','','htmlspecialchars');
            self::check_user($data['user_login']);
            $data['user_pass'] = md5(I('post.password','','htmlspecialchars'));
            $data['user_email'] = I('post.email','','htmlspecialchars');
            $data['create_time'] = time();
            $user = M('users');
            $result = $user->add($data);
            $user_group = M('auth_group_access');
            foreach ($usergroup as $v) {
              $user_group->add(array('uid'=>$result,'group_id'=>$v));
            }
            if($result){
              self::log('Web','添加用户成功',5);
              $this->ajaxReturn(['status'=>'success','msg'=>'添加成功']);
            }else{
              self::log('Web','添加用户失败',5);
              $this->ajaxReturn(['status'=>'error','msg'=>'添加失败']);
            }
        }else{
            $usergroup_data = self::get_usergroup_list();
            $this->assign('usergroup_data',$usergroup_data);
            layout('Layout/layout');
            $this->display();
        }
    }
    public function user_delete(){
        $id = I('post.id','','htmlspecialchars');
        $id = explode(',', $id);
        if (in_array(session('uid'),$id)) {
            $this->ajaxReturn(['status'=>'error','msg'=>'不能删除超级管理员']);
        }else{
            $user = M('users');
            $status = $user->where(array('id'=>array('in',$id)))->delete();
            $auth_group_access = M('auth_group_access');
            if ($status!==false) {
              $auth_group_access->where(array('uid'=>array('in',$id)))->delete();
              self::log('Web','删除用户成功',5);
              $this->ajaxReturn(['status'=>'success','msg'=>'删除成功']);
            }else {
              self::log('Web','删除用户失败',5);
              $this->ajaxReturn(['status'=>'error','msg'=>'删除失败']);
            }
        }
    }
    public function get_usergroup(){
        $group = M('auth_group_access');
        $id = I('post.id');
        $data = $group->where(array('uid'=>$id))->field('group_id')->select();
        echo json_encode($data);
    }
    public function do_user_edite(){
        if(IS_POST){
            $id = (int)I('post.id');
            $usergroup = I('post.usergroup');
            if ($_SESSION['isAdmin']=='0'&& in_array('1', $usergroup)) {
              $this->ajaxReturn(['status'=>'error','msg'=>'不能修改超级管理员']);
            }
            $data['user_login'] = $datas['user_name'] = I('post.name','','htmlspecialchars');
            $res = self::check_other_user($id,$data['user_login']);
            if ($res) {
               $this->ajaxReturn(['status'=>'1','msg'=>'用户名已存在']);
            }
            $data['user_email'] = I('post.email','','htmlspecialchars');
            $user = M('users');
            $result = $user->where(['id'=>$id])->save($data);
            $user_group = M('auth_group_access');
           if($result!==false){
              $user_group->where(['uid'=>$id])->delete();
              foreach ($usergroup as $v) {
                $result = $user_group->add(array('uid'=>$id,'group_id'=>$v));
              }
              self::log('Web','修改用户成功',5);
              $this->ajaxReturn(['status'=>'success','msg'=>'修改成功']);
           }else{
              self::log('Web','修改用户失败',5);
              $this->ajaxReturn(['status'=>'error','msg'=>'修改失败']);
           }
        }
    }
    public function user_password_edite(){
        layout('Layout/layout');
        $this->display();
    }
    public function password_edit(){
        $id = session('uid');
        $user = M('users');
        $res = $user->where(['id'=>$id])->field('user_pass')->find();
        if(IS_POST) {
          $password = I('post.password','','htmlspecialchars');
          $password_new = I('post.password_new','','htmlspecialchars');
            $password_new2 = I('post.password_new2','','htmlspecialchars');
        }
        if(md5($password) != $res['user_pass']) {
            self::log('Web','修改用户密码失败',5);
            $this->ajaxReturn(['status'=>'error','msg'=>"当前密码错误"]);
        }elseif($password_new != $password_new2) {
            self::log('Web','修改用户密码失败',5);
            $this->ajaxReturn(['status'=>'error','msg'=>"两次输入的密码不一致!"]);
        }else{
            $user_pass = md5($password_new);
            $res2 = $user -> where(['id'=>$id]) ->save(['user_pass' => $user_pass]);
            if ($res2!==false) {
              self::log('Web','修改用户密码成功',5);
              $this->ajaxReturn(['status'=>'success','msg'=>"修改成功"]);
            }else{
              self::log('Web','修改用户密码失败',5);
              $this->ajaxReturn(['status'=>'failed','msg'=>"修改失败"]);
            }
        }
    }
    private function check_other_user($id,$name){
        $user = M('users');
        $map['id'] = array('neq',$id);
        $map['user_login'] = $name;
        $res = $user->where($map)->find();
        if ($res) {
           return true;
        }else{
           return false;
        }
    }
    private function check_user($username){
        $user = M('users');
        $res = $user->where(['user_login'=>$username])->find();
        if ($res) {
           $this->ajaxReturn(['status'=>1,'msg'=>'用户名已存在']);
        }else{
           return true;
        }
    }
    public function usergroup(){
        $group = M('auth_group');
        $group_data = $group->select();
        unset($group_data[0]);
        $this->assign('group_data',$group_data);
        layout('Layout/layout');
        $this->display();
    }
    public function usergroupOk(){
        if (!empty($_GET)) {
            $map              = [];
            if(I('get.usergroup')){
                $map['id'] = I('get.usergroup');
            }
            $page             = I('get.pagenum');
            $page             = ($page-1)*10;
        } 
        $usergroup = M('auth_group');
        $count  = $usergroup -> where($map) ->count();
        $data = $usergroup->field('id,title,note')->where($map)->limit($page.', 10')->select();
        //self::log('Web','用户组管理查询',5);
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
    public function usergroup_add(){
        if (IS_POST) {
          $data['title'] = I('post.usergroup_name','','htmlspecialchars') ;
          $data['note'] = I('post.note','','htmlspecialchars');
          $arr_ids = M('menu')->field('GROUP_CONCAT(id) as ids') ->find();
          $data['rules'] = $arr_ids['ids'];
          $usergroup = M('auth_group');
          if ($usergroup->where(['title' => $data['title']])->find())
          {
            self::log('Web','添加用户组失败',5);
            $this->ajaxReturn(array('status' => 'error', 'msg' => '该用户组已存在'));
          }
          $result = $usergroup->add($data);
          if($result){
              self::log('Web','添加用户组成功',5);
              $this->ajaxReturn(array('status' => 'success', 'msg' => '添加成功'));
            }else{
              self::log('Web','添加用户组失败',5);
              $this->ajaxReturn(array('status' => 'error', 'msg' => '添加失败'));
            }
        }else{
            layout('Layout/layout');
            $this->display();
        }
    }
    public function do_usergroup_edite(){
        $usergroup = M('auth_group');
        $id = (int)I('post.id');
        $data['title'] = I('post.groupname','','htmlspecialchars');
        $data['note'] = I('post.note','','htmlspecialchars');
        $usergroup_data = $usergroup->where(array('id'=>$id))->save($data);
        if ($usergroup_data!==false) {
            self::log('Web','修改用户组成功',5);
            $this->ajaxReturn(array('status'=>'success','msg'=>'编辑成功'));
        }else{
            self::log('Web','修改用户组失败',5);
            $this->ajaxReturn(array('status'=>'error','msg'=>'编辑失败'));
        }
      
    }
    public function usergroupdel(){
        //删除前先判断组内有没有关联用户如果有就提示不能删除
        $id = I('post.id','','htmlspecialchars');
        $usergroup = M('auth_group');
        $res = M('auth_group_access')->where(array('group_id'=>array('in',$id)))->find();
        if(!is_null($res)){
            self::log('Web','删除用户组失败',5);
            $this->ajaxReturn(array('status'=>'error','msg'=>'组内有用户不能删除'));
        }
        $result = $usergroup->where(array('id'=>array('in',$id)))->delete();
        if ($result) {
            self::log('Web','删除用户组成功',5);
            $this->ajaxReturn(array('status'=>'success','msg'=>'删除成功'));
        }else{
            self::log('Web','删除用户组失败',5);
            $this->ajaxReturn(array('status'=>'error','msg'=>'删除失败'));
        }
    }
    public function authorize() {
          $this->auth_access_model = M("auth_group");
        //角色IDdie;
        $roleid = intval(I("get.id"));
        if (!$roleid) {
            $this->error("参数错误！");
        }
        $menu = new \Think\Tree();
        $menu->icon = array('│ ', '├─ ', '└─ ');
        $menu->nbsp = '&nbsp;&nbsp;&nbsp;';
        $result = $this->initMenu();
        $newmenus=array();
        $priv_data=$this->auth_access_model->where(array("id"=>$roleid))->getField("rules",true);//获取权限表数据
        //dump($priv_data);die;
        $priv_data=explode(',', $priv_data[0]);
        //var_dump($priv_data);die();
        $auth_rule = M('auth_rule');
        $data = $auth_rule->where(array('id'=>array('in',$priv_data)))->getField('name',true);
        foreach ($data as $k => $v) {
          $data[$k]=strtolower($v);
        }

        foreach ($result as $m){
            $newmenus[$m['id']]=$m;
        }
        
        foreach ($result as $n => $t) {
            $result[$n]['checked'] = ($this->_is_checked($t, $roleid, $priv_data)) ? 'checked' : '';
            $result[$n]['level'] = $this->_get_level($t['id'], $newmenus);
            $result[$n]['parentid_node'] = ($t['parentid']) ? ' class="child-of-node-' . $t['parentid'] . '"' : '';
        }
        
        $str = "<tr id='node-\$id' \$parentid_node>
                       <td style='padding-left:30px;'>\$spacer<input type='checkbox' name='menuid[]' value='\$id' level='\$level' \$checked onclick='javascript:checknode(this);'> \$name</td>
                    </tr>";
        $menu->init($result);
        $categorys = $menu->get_tree(0, $str);
        self::log('Web','权限树查询',5);
        $this->assign("categorys", $categorys);
        $this->assign("roleid", $roleid);
        layout('Layout/layout');
        $this->display();
    }

      /**
     *  检查指定菜单是否有权限
     * @param array $menu menu表中数组
     * @param int $roleid 需要检查的角色ID
     */
    private function _is_checked($menu, $roleid, $priv_data) {
        $id = $menu['id'];
        if($priv_data){
            
            if (in_array($id, $priv_data)) {
                return true;
            } else{
              return false;
          }
        }else{
          return false;
        }  
        
    }

    /**
     * 获取菜单深度
     * @param $id
     * @param $array
     * @param $i
     */
    protected function _get_level($id, $array = array(), $i = 0) {
        
            if ($array[$id]['parentid']==0 || empty($array[$array[$id]['parentid']]) || $array[$id]['parentid']==$id){
                return  $i;
            }else{
                $i++;
                return $this->_get_level($array[$id]['parentid'],$array,$i);
            }
                
    }
     /**
     * 角色授权
     * 角色授权
     */
    public function authorize_post() {
      $this->auth_access_model = M("auth_group");
      if (IS_POST) {
        $roleid = intval(I("post.roleid"));
        $sql = "用户组ID:" . $roleid;
        if(!$roleid){
          self::log('Web','用户组权限设置',3);
          $this->ajaxReturn(['status'=>'error','msg'=>'授权失败']);
        }
        if (is_array($_POST['menuid']) && count($_POST['menuid'])>0) {
          $rules = implode(",",$_POST['menuid']);
          $this->auth_access_model->where(array("id"=>$roleid))->save(array('rules'=>$rules));
          self::log('Web','用户组权限设置',5);
          $this->ajaxReturn(['status'=>'success','msg'=>'授权成功']);
        }else{
          $this->auth_access_model->where(array("id" => $roleid))->setField('rules','');
          self::log('Web','用户组权限设置',3);
          $this->ajaxReturn(['status'=>'clear','msg'=>'没有接收到数据，执行清除授权成功']);
        }
      }
    }
}