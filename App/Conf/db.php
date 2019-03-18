<?php

if (strpos($_SERVER['SERVER_ADDR'], '192.168.0.195') !== FALSE) {//测试环境
    return array(
        'DB_TYPE' => 'mysqli',
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'pinping',
        'DB_USER' => 'root',
        'DB_PWD' => '123456',
        'DB_PREFIX' => 'mx_',
    );
} else if (strpos($_SERVER['SERVER_ADDR'], '192.168') !== FALSE) { //本地环境
    return array(
        'DB_TYPE' => 'mysqli',
        'DB_HOST' => '192.168.0.123',
        'DB_PORT' => '3306',
        'DB_NAME' => 'pinping',
        'DB_USER' => 'root',
        'DB_PWD' => '123456',
        'DB_PREFIX' => 'mx_',
    );
} else {//线上环境
    return array(
        'DB_DEPLOY_TYPE' => 1, // 设置分布式数据库支持
        'DB_RW_SEPARATE' => true, // 分布式数据库的读写是否分离
        'DB_TYPE' => 'mysqli', // 数据库类型
        'DB_HOST' => '172.18.69.141,172.18.150.202', // 数据库服务器地址
        'DB_NAME' => 'pinping', // 数据库名称
        'DB_USER' => 'root,root,root', // 数据库用户名
        'DB_PWD' => 'bffebfb01900fe3af8a8633d3b0b7be2,bffebfb01900fe3af8a8633d3b0b7be2', // 数据库密码
        'DB_PORT' => '3306,3306', // 数据库端口
        'DB_PREFIX' => 'mx_', // 数据表前缀
        'DB_MASTER_NUM' => 1
    );
}