<?php
if (strpos($_SERVER['SERVER_ADDR'], '192.168.116.27') !== FALSE) {//测试环境
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
        'DB_HOST' => '192.168.116.27',
        'DB_PORT' => '3306',
        'DB_NAME' => 'pinping',
        'DB_USER' => 'root',
        'DB_PWD' => '123456',
        'DB_PREFIX' => 'mx_',
    );
} else {//线上环境
    return array(
        'DB_TYPE' => 'mysqli',
        'DB_HOST' => '10.30.88.15',
        'DB_PORT' => '3306',
        'DB_NAME' => 'pinping',
        'DB_USER' => 'SAP',
        'DB_PWD' => 'bffebfb01900fe3af8a8633d3b0b7be2',
        'DB_PREFIX' => 'mx_',
    );
}
