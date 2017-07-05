<?php
namespace Home\Controller;
class AlarmController extends CommonController {
    public function index(){
        layout('Layout/layout');
        $this->display();
    }
}