<?php

if (strpos($_SERVER['SERVER_ADDR'], '192.168.1.177') !== FALSE) {//测试环境
    return array(
        'REDIS_HOST' => 'localhost',
        'REDIS_PORT' => '6379',
    );
}  else if (strpos($_SERVER['SERVER_ADDR'], '192.168') !== FALSE) { //本地环境
    return array(
        'REDIS_HOST' => '192.168.1.177',
        'REDIS_PORT' => '6379',
    );
} else {//线上环境
    return array(
        'REDIS_HOST' => '192.168.116.3',
        'REDIS_PORT' => '6379',
//        'REDIS_AUTH' => '123456'
    );
}