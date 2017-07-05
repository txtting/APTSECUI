<?php
namespace Home\Controller;
use Think\Auth;
use Think\Controller;
use Common\Model\CommonModel;
use Home\Common\Export;

class RecordController extends CommonController {
   public function ddosLog(){
       $ddos_log = M('ddos_log_tb');
       $where = [];
       if (!empty($_GET)) {
        // var_dump($_GET);die;
        $victim_ip  = I('get.victim_ip');
        $time = I('get.date-range-picker');      

        if ($victim_ip) {
          $where['victim_ip'] = $victim_ip;
        }

        if ($time) {
          $times = explode('-', $time);
          $time_start = strtotime($times[0]);
          $time_end = strtotime($times[1]." 23:59:59");
          $where['attack_start_time'] = array('between',array($time_start, $time_end));
        }
      

      }
       // var_dump($where);
       $count = $ddos_log->where($where)->count();
       // var_dump($count);die;
       $Page  = new\Think\Page($count, 25);// 实例化分页类 传入总记录数
       $Page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
       $log_data = $ddos_log->limit($Page->firstRow.','.$Page->listRows)->where($where)->select();
       
       $type = M("virus_attack_type")->getField('type,comment');
       $type = is_array($type) ? $type : array();
       foreach ($log_data as $key => &$value) {
         $value['attack_type'] = array_key_exists($value['attack_type'], $type) ? $type[$value['attack_type']] : $value['attack_type'];
       }
       $show = $Page->show();// 分页显示输出
     
       $this->assign('log_data',$log_data);
       $this->assign('show',$show);

       layout('Layout/layout');
       $this->display();
  }


  public function log(){
       $log = M('log');
       $where = [];
       if (!empty($_GET)) {
        $level  = I('get.level');
        $time = I('get.date-range-picker');      

        if ($level) {
          $where['level'] = $level;
        }

        if ($time) {
          $times = explode('-', $time);
          $time_start = strtotime($times[0]);
          $time_end = strtotime($times[1]." 23:59:59");
          $where['time'] = array('between',array($time_start, $time_end));
        }
      }
      
      if(!session('isAdmin')){
          $where['uid'] = session('uid');
      }


      $count = $log->where($where)->count();
       $Page  = new\Think\Page($count, 25);// 实例化分页类 传入总记录数
       $Page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
       $log_data = $log->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('time desc')->select();
       $users = M('users');
       $user_data = $users->getField('id,user_login');
       foreach ($log_data as $k => &$v) {
         if (array_key_exists($v['uid'], $user_data)) {
             $v['user_login'] = $user_data[$v['uid']];
         }

         if ($v['uid'] == 0) {
            $v['user_login'] = 'root';
         }
       }
      
       $show = $Page->show();// 分页显示输出
       $this->assign('log_data',$log_data);
       $this->assign('show',$show);
       layout('Layout/layout');
       $this->display();
  }


  public function col2name($col) {
    $c = [
        'app'                                     => '模块',
        'user_login'                              => '用户名称',
        'message'                                 => '告警信息',
        'level'                                   => '等级',
        'time'                                    => '时间'
    ];

    return $col === null ? array_keys($c) : (isset($c[$col]) ? $c[$col] : "");
}

public function col2value($col, $value){
    $c = [
        'gather_time' => function($v){
            return date('Y-m-d H:i:s', $v);
        },
        'timestr' => function($v){
            return date('Y-m-d H:i:s', $v);
        },
        'recv_time' => function($v){
            return date('Y-m-d H:i:s', $v);
        },
        'level' => function($v){
            $cc = [
                "1" => "严重错误",
                "2" => "错误",
                "3" => "告警",
                "4" => "调试",
                "5" => "信息"
            ];
            return isset($cc[$v]) ? $cc[$v] : $v;
        },
        'time' => function($v){
            return date('Y-m-d H:i:s', $v);
        },
        'is_bind' => function($v){
            $cc = [
                "0" => "未绑定",
                "1" => "绑定",
                "2" => "解绑"
            ];

            return isset($cc[$v]) ? $cc[$v] : $v;
        }
    ];

    return isset($c[$col]) ? $c[$col]($value) : $value;
}

  public function actionPackage()
    {
        $status = false;
        $filePath = I('post.filepath');
        $rootPath = C("DOWN_PATH");
        if (is_dir($rootPath.$filePath))
        { 
            $cmd = "cd ". $rootPath . $filePath . "/" . "\n";
            $cmd .= "tar -zcf " . $rootPath . $filePath . ".tar.gz  * ";
            $result = system($cmd);
            if (file_exists($rootPath . $filePath . ".tar.gz"))
            {
                $status = true;
            }

            $cmd = "cd ". $rootPath . "\n";
            $cmd .= "rm " . $filePath . " -rf";
            $result = system($cmd);
        } 
        
        $this->ajaxreturn(['status' => $status, 'filename' => $filePath . ".tar.gz "]);
    }

  public function export_logset(){
        $log = M('log');
        $where = [];

        $filename = I('post.filename');
        $count = I('post.count');
        $offset = $count * 10000;
        $level  = I('post.level');
        $time = I('post.time');      

        if ($level) {
            $where['level'] = $level;
        }

        if ($time) {
            $times = explode('-', $time);
            $time_start = strtotime($times[0]);
            $time_end = strtotime($times[1]." 23:59:59");
            $where['time'] = array('between',array($time_start, $time_end));
        }
            
         $log_data = $log->field("log.app,users.user_login, log.message,log.level,log.time")->join("LEFT JOIN users ON log.uid=users.id")
                     ->limit($offset.', 10000')->where($where)->select();
        
        $colFilter = function($col){
            return $this->col2name($col);
        };

        $valueFilter = function($col, $value) {
            return $this->col2value($col, $value);
        };

       $res = Export::excel($log_data, $colFilter, $valueFilter, $filename, $count);
       $this->ajaxreturn($res);
    }


}