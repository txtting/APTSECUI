<?php
namespace Home\Controller;
class TrackController extends CommonController {
    public function index(){
        layout('Layout/layout');
        $this->display();
    }
}