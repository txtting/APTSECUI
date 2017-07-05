<?php
namespace Home\Controller;
use Think\Controller;

class CityController extends Controller {
    public function index(){
        $pid = $_POST['pid'];
        $city = M("city");
        $data = $city->where(['parent_id' => $pid])->select();
        $this->ajaxReturn($data);
    }
}