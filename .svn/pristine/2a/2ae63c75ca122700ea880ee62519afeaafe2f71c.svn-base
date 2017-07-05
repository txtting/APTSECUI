<?php
set_time_limit(0);
$dir = '/home/test';
$dsn="mysql:dbname=mp;host=127.0.0.1";
$db_user='root';
$db_pass='byzoro';
$pdo=new PDO($dsn,$db_user,$db_pass);
while (1) {
	$handle=opendir($dir);
   while($file=readdir($handle))
   {
     if($file !="." && $file !=".." && pathinfo($file,PATHINFO_EXTENSION) == 'txt')
     {
        $dirfile = $dir."/".$file;
        $xml = parse_xml($dirfile);
        $ip = $xml['ip'];
        $name = $xml['name'];
        $time = $xml['time'];
        $content = '';
        foreach ($xml['statistics-obj'] as $k => $v) {
        	$content .= $xml['statistics-obj'][$k]['name'].':';
        	$content .= 'rpps-'.$xml['statistics-obj'][$k]['rpps'].' ';
        	$content .= 'tpps-'.$xml['statistics-obj'][$k]['tpps'].' ';
        	$content .= 'rbps-'.$xml['statistics-obj'][$k]['rbps'].' ';
        	$content .= 'tbps-'.$xml['statistics-obj'][$k]['tbps'].'#';
        };
        
        $sql = "INSERT INTO `flow` (`ip` ,`name` ,`content` , `time`) VALUES (:ip, :name,:content,:time)";
        $stmt = $pdo->prepare($sql);
        $res = $stmt->execute(array(':ip'=>$ip,':name'=>$name,':content'=>$content,':time'=>$time)); 
		//$sql="insert into flow (ip,name,content,time) values ($ip,$name,$content,$time)";
		//$res=$pdo->exec($sql);
		if ($res) {
			del_file($dirfile);
		}
     }
   }
}

function parse_xml($file){
	$xml = simplexml_load_file($file);
	$json_xml = json_encode($xml);
    return json_decode($json_xml,true);
}

function del_file($file){
	@unlink($file);
	return true;
}
