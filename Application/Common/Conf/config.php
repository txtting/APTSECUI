<?php
define("PAGENUM", "25");

return array(
    'MODULE_ALLOW_LIST'     =>  array('Home','Api'),
    'TMPL_DENY_PHP'         =>  false,
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    //'DB_HOST'   => '10.80.5.6', // 服务器地址
    'DB_NAME'   => 'txttest', // 数据库名
    //'DB_NAME'   => 'mp', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    //'DB_PWD'    => 'byzoro', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀 
    'DEFAULT_MODULE' => 'Home',
    'DEFAULT_CONTROLLER'=>'Vir',
    'SESSION_EXPIRE' => 1440,
    //'API_IP' => '10.88.1.102:8070',
    'API_IPOFF' => '10.88.1.102:8090',
    'API_IP' => '10.94.1.201:8070',
    // 'UPDATE_DIR' => '/home/test/',
);

