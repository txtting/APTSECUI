<?php
namespace Home\Controller;
//use Common\Controller\CommonController;


class NegroupController extends CommonController
{

    public function aaa($num,$lenth)
    {
        if ($lenth === 0) {
            return round($num);
        }

        return round($num * $lenth * 10)/($lenth * 10);
    }

    public function index()
    {
        $ne = M('VirusEquipment');
        //$res   = self::getNetGruop();
        $equipment_type = M('EquipmentType')->select();
        $etype = [];
        foreach($equipment_type as $k=>$value){
            $etype[] = $equipment_type[$k]['type_name'];
        }
        if (!empty($_GET)) {
            if (I('get.equipment_ip')) {
                $data['virus_equipment.equipment_ip'] = I('get.equipment_ip');
            }
            if (I('get.equipment_name')) {
                $data['virus_equipment.equipment_name'] = I('get.equipment_name');
            }

            if (I('get.equipment_type')) {
                $data['virus_equipment.equipment_type'] = I('get.equipment_type');
            }


         } 
            $count = $ne->where($data)->count();// 查询满足要求的总记录数
            $Page  = new \Think\Page($count, 25);// 实例化分页类 传入总记录数
            $Page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
            
            $equipment_data = $ne->limit($Page->firstRow . ',' . $Page->listRows)->
                where($data)->select();

        
        $show = $Page->show();// 分页显示输出
        $this->assign('equipment_type',$etype);
        $this->assign('equipment', $equipment_data);
        $this->assign('show', $show);
        $this->assign('groups', $res);
        layout('Layout/layout');
        $this->display();
    }



   public function  netAdd()
    {
        $data['equipment_ip'] = I('post.equipment_ip');
        //self::check_net($data['serial_number']);
        $data['equipment_name']          = I('post.equipment_name');
        $data['equipment_type']          = I('post.equipment_type');
        $equipment = M('VirusEquipment');

        $res       = $equipment->add($data);
        if ($res){
            A('Home/Common')->log('Web',session('username').'添加设备|客户端IP:'.get_client_ip().'|success',5);
            $this->ajaxReturn(array('status' => 'success'));

        }else{
            A('Home/Common')->log('Web',session('username').'添加设备|客户端IP:'.get_client_ip().'|fail',3);
            $this->ajaxReturn(array('status' => 'failed','info' => '添加设备失败'));
        }
    }

 



    public function  netedite(){
        //dump($_POST);die;
        $id = I('post.id');
        if (I('post.equipment_name')) {
            $data['equipment_name']  = I('post.equipment_name');
        }

        if (I('post.equipment_ip')) {
            $data['equipment_ip']  = I('post.equipment_ip');
        }

        if (I('post.equipment_type')) {
            $data['equipment_type']  = I('post.equipment_type');
        }
        

        $ne           = M('VirusEquipment');

        $res = $ne->where(array('id' => $id))->save($data);
        //echo $ne_register->getLastSql();die;
        if ($res){
            A('Home/Common')->log('Web',session('username').'编辑设备|客户端IP:'.get_client_ip().'|success',5);
            echo json_encode(array('status' => 'success'));
        }else{
            A('Home/Common')->log('Web',session('username').'编辑设备|客户端IP:'.get_client_ip().'|fail',3);
            echo json_encode(array('status' => 'error'));
        }
           
    }

    public function getNet($id)
    {
        $ne_register = M('');
        $res         = $ne_register->where(array('id' => $id))->find();

        return $res;
    }

    public function delnet()
    {
        $ne = M('VirusEquipment');
        $id          = explode(',', I('post.id'));
        $res         = $ne->where(array('id' => array('in', $id)))->delete();
        if ($res){
            A('Home/Common')->log('Web',session('username').'删除设备|客户端IP:'.get_client_ip().'|success',5);
            echo json_encode(array('status' => 'success'));

        }else{
            A('Home/Common')->log('Web',session('username').'删除设备|客户端IP:'.get_client_ip().'|fail',3);
            echo json_encode(array('status' => 'error'));
        }
            
    }
    public function ne_info(){
        Layout('Layout/layout');
        $this->display();
    }
    public function nemonitor(){
        Layout('Layout/layout');
        $this->display();
    }


}   