<?php

if (strpos($_SERVER['SERVER_ADDR'], '192.168') !== FALSE) {
    return array(
        'DB_TYPE' => 'mysqli',
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'pinping',
        'DB_USER' => 'root',
        'DB_PWD' => '123456',
        'DB_PREFIX' => 'mx_',
    );
} else {
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
//return array(
//    'DB_TYPE' => 'mysqli',
//    'DB_HOST' => 'localhost',
//    'DB_PORT' => '3306',
//    'DB_NAME' => 'pinping',
//    'DB_USER' => 'root',
//    'DB_PWD' => 'root',
//    'DB_PREFIX' => 'mx_',
//);