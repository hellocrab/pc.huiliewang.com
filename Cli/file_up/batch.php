<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/7
 * Time: 16:59
 */
// 个数
$rows = isset($argv[1]) ? $argv[1] : 21; //总条数
$page = isset($argv[2]) ? $argv[2] : 3; //进程数
$limit = (int)ceil($rows / $page);
$indexPath = realpath(__DIR__ . '/index.php');
for ($i = 1; $i <= $page; $i++) {
    $cmd = "nohup php  {$indexPath} " . $limit . " " . $i;
    echo $cmd, PHP_EOL;
    popen($cmd, "r");
}