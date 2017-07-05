<?php
function subtext($text, $length)
{
    if (mb_strlen($text, 'utf8') > $length)
        return mb_substr($text, 0, $length, 'utf8') . '...';

    return $text;
}
function authcheck($rule,$t,$f='没有权限'){
	$uid = session('uid');
	if ($uid == 1) {
		return $t;
	}   
    $auth = new \Think\Auth();
    return $auth->check($rule,$uid)?$t:$f;
}

function formatPeriod($second){
    $str = "";

    $day = floor($second / 86400);
    if ($day > 0) {
    	$str .= $day . '天';
    	$second = $second % 86400;
    }

    $hour = floor($second / 3600);
    if ($hour > 0) {
    	$str .= $hour . '小时';
    	$second = $second % 3600;
    }

    $min = floor($second / 60);
    if ($min > 0) {
    	$str .= $min . '分钟';
    	$second = $second % 60;
    }

    if ($second) {
    	$str .= $second . '秒';
    }
    return $str;
}