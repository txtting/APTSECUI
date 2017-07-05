<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        echo "this is a api";
    }
    public function tojson(){
        $arr = array(
             'name' => 'xiaohong',
             'age' => '18',
             'sex' => 'nan',
            );
        $json = json_encode($arr,true);
        echo $json."<br>";
        dump($json);
    }
    public function jsontoarr(){
        $json = '{"name":"hong","age":"19","sex":"nan"}';
        $obj = json_decode($json);
        dump($obj);
        echo $obj->name."<br>";
        echo $obj->age."<br>";
        echo $obj->sex."<br>";
        $arr = json_decode($json,true);
        echo $arr['name']."<br>";
        echo $arr['age']."<br>";
        echo $arr['sex']."<br>";
    } 
    public function testRequest($url=''){
        //1.url地址
        //$url = 'http://www.baidu.com';
        //2.携带参数,发送数据,并请求
        //request($url,$https=true,$method='get',$data=null)
        //$content = request($url,false);
        $content = file_get_contents($url);
        $str = '';
        $str  .= $content;
        //file_put_contents('./baidu1.html',$content);
        return $str;
    }
    //天气查询
    public function tianqi(){
        //url地址
        $city = '北京';
        $url = 'http://api.map.baidu.com/telematics/v2/weather?location='.$city.'.&ak=B8aced94da0b345579f481a1294c9094';
        //发送请求
        $tianqi = request($url,false);
        dump($tianqi);
        //处理返回值
        //解析xml代码 解析结果为从一个字符串变为一个对象
        $tianqiobj = simplexml_load_string($tianqi);
        echo $tianqiobj -> status."<br>";
        echo $tianqiobj -> currentCity."<br>";
        echo $tianqiobj ->results -> result[0] -> date."<br>";
        echo $tianqiobj ->results -> result[0] -> weather."<br>";
        echo $tianqiobj ->results -> result[0] -> wind."<br>";
        echo $tianqiobj ->results -> result[0] -> temperature."<br>";
    }
    //电话号码归属地信息 http://cx.shouji.360.cn/phonearea.php?number=18330199321
    public function phoneInfo(){
        $num = '18330199321';
        $url = "http://cx.shouji.360.cn/phonearea.php?number=$num";
        $json = request($url,false);
        //data: {province: "河北", city: "石家庄", sp: "移动"}
        $arr = json_decode($json,true);
        dump($arr);
        echo $arr['data']['province']."<br>"; 
        echo $arr['data']['city']."<br>"; 
        echo $arr['data']['sp']."<br>"; 
    }
    //查快递
    public function kuaidi(){
        $typeName = 'yuantong';
        $postid = '881868845256464782';
        $url = "http://www.kuaidi100.com/query?type=$typeName&postid=$postid";
        $content = request($url,false);
        $content = json_decode($content);
        //dump($content);
        echo $typeName.":您的快递相隔千里正在和你相遇<br/>";
        foreach ($content -> data as $key => $value) {
            echo $value -> time ."<br/>";
            echo $value -> context ."<br/>";
        }
    }
    //邮件案例
    public function sendYou(){
        $sendToAddr = array(
                //"362754893@qq.com",
                "953217568@qq.com",
               //"christomail@163.com",
                //"zhuffz@163.com",
            );

        //$url = "http://10.102.26.2/cooker/index.php/Api/User/index.html";
        $str = $this->getdiv();
        
        //$str = '<img src="cid:logoimg" title="tu"></img>';
        //$tu = "http://127.0.0.1/cooker/576c08496909b.jpg";
        $tu = "./Public/css/assets/images/score/1.jpg";
        //$fj = "./Public/Uploads/report_forms_2017.pdf";
        //$fj = "http://127.0.0.1/cooker/Public/Uploads/report_forms_2017.pdf";
        //echo $str;
        //die;
        //$content = "<img src='http://127.0.0.1/cooker/'>aaa</img>";
        //dump($content);die;
        //$res = sendMail("收到没",$str,$sendToAddr,$fj,"附件.pdf",$tu);
        $res = sendMail("收到没",$str,$sendToAddr,$tu);
        dump($res);
    }
    public function test3(){
        $url = "http://byzoro.apt.com/overview/lastAttacksNum?days=7&interval=1";
        $content = request($url,false);
        $content = json_decode($content);
        dump($content);
    }
    public function getWebTag($tag_id,$url=false,$tag='div',$data=false){
        if($url !== false){
            $data = file_get_contents( $url );
        }
        $charset_pos = stripos($data,'charset');
        if($charset_pos) {
            if(stripos($data,'charset=utf-8',$charset_pos)) {
                $data = iconv('utf-8','utf-8',$data);
            }else if(stripos($data,'charset=gb2312',$charset_pos)) {
                $data = iconv('gb2312','utf-8',$data);
            }else if(stripos($data,'charset=gbk',$charset_pos)) {
                $data = iconv('gbk','utf-8',$data);
            }
        }
        
        preg_match_all('/<'.$tag.'/i',$data,$pre_matches,PREG_OFFSET_CAPTURE);    //获取所有div前缀
        preg_match_all('/<\/'.$tag.'/i',$data,$suf_matches,PREG_OFFSET_CAPTURE); //获取所有div后缀
        $hit = strpos($data,$tag_id);
        if($hit == -1) return false;    //未命中
        $divs = array();    //合并所有div
        foreach($pre_matches[0] as $index=>$pre_div){
            $divs[(int)$pre_div[1]] = 'p';
            $divs[(int)$suf_matches[0][$index][1]] = 's';    
        }
        
        //对div进行排序
        $sort = array_keys($divs);
        asort($sort);
        
        $count = count($pre_matches[0]);
        foreach($pre_matches[0] as $index=>$pre_div){
            //<div $hit <div+1    时div被命中
            if(($pre_matches[0][$index][1] < $hit) && ($hit < $pre_matches[0][$index+1][1])){
                $deeper = 0;
                //弹出被命中div前的div
                while(array_shift($sort) != $pre_matches[0][$index][1] && ($count--)) continue;
                //对剩余div进行匹配，若下一个为前缀，则向下一层，$deeper加1，
                //否则后退一层，$deeper减1，$deeper为0则命中匹配，计算div长度
                foreach($sort as $key){
                    if($divs[$key] == 'p') $deeper++;
                    else if($deeper == 0) {
                        $length = $key-$pre_matches[0][$index][1];
                        break;
                    }else {
                        $deeper--;
                    }
                }
                $hitDivString = substr($data,$pre_matches[0][$index][1],$length).'</'.$tag.'>';
                break;
            }
        }
        return $hitDivString;
    }
    public function getdiv(){
        return $this ->getWebTag('id="sendmail"','http://10.102.26.2/APTSecUI/index.php/Api/User/index','div');
    	//return $this ->getWebTag('id="sendmail"','http://10.102.26.2/APTSecUI/index.php/Setting/index','div');
    }
}