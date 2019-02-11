<?php

if (strpos($_SERVER['SERVER_ADDR'], '192.168.116.20') !== FALSE) {//测试环境
    return array(
        'REDIS_HOST' => 'localhost',
        'REDIS_PORT' => '6379',
//        'REDIS_AUTH' => '123456'
    );
} else if (strpos($_SERVER['SERVER_ADDR'], '192.168.116.31') !== FALSE) { //本地环境
    return array(
        'REDIS_HOST' => '192.168.116.20',
        'REDIS_PORT' => '6379',
//        'REDIS_AUTH' => '123456'
    );
} else if (strpos($_SERVER['SERVER_ADDR'], '192.168') !== FALSE) { //本地环境
    return array(
        'REDIS_HOST' => '192.168.116.33',
        'REDIS_PORT' => '6379',
//        'REDIS_AUTH' => '123456'
    );
} else {//线上环境
    return array(
        'REDIS_HOST' => '192.168.116.3',
        'REDIS_PORT' => '6379',
//        'REDIS_AUTH' => '123456'
    );
}