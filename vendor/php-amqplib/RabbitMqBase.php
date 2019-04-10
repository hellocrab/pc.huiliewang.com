<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/9
 * Time: 9:01
 */

namespace RabbitMq;

require_once __DIR__ . '/../../vendor/autoload.php';
date_default_timezone_set('PRC');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use  PhpAmqpLib\Wire\AMQPTable;

class RabbitMqBase
{
    /**
     * @desc 初始链接配置
     * @var array
     */
    protected $config = [
        'host' => 'localhost', 'port' => 5672, 'user' => 'guest', 'pass' => 'guest', 'vhost' => '/'
    ];

    /**
     * @desc 交换路由
     * @var string
     */
    protected $exchange = 'exchange021';
    /**
     * @desc 队列名称
     * @var string
     */
    protected $queueName = 'queue021';
    /**
     * @desc 是否持久化
     * @var bool
     */
    private static $isDurable = true;
    /**
     * @desc 当前连接
     * @var AMQPStreamConnection
     */
    protected $connection;
    /**
     * @desc 当前交换机
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    protected $channel;
    /**
     * @desc 回掉函数
     * @var mixed
     */
    private static $callBack;
    /**
     * 交换机类型
     * @var string
     */
    private static $type = 'direct';


    /**
     *  配置初始化链接
     * RabbitMqBase constructor.
     * @param array $config 连接配置数组
     * @param string $exchangeName 交换进名字
     * @param string $queueName 队列名字
     */
    public function __construct($config = [], $exchangeName = '', $queueName = '') {
        //链接配置设置
        isset($config['host']) && $this->config['host'] = $config['host'];
        isset($config['port']) && $this->config['port'] = $config['port'];
        isset($config['user']) && $this->config['user'] = $config['user'];
        isset($config['pass']) && $this->config['pass'] = $config['password'];
        isset($config['vhost']) && $this->config['vhost'] = $config['vhost'];
        $queueName && $this->queueName = $queueName;
        $exchangeName && $this->exchange = $exchangeName;

        try {
            $this->connection = new AMQPStreamConnection(
                $this->config['host'],
                $this->config['port'],
                $this->config['user'],
                $this->config['pass'],
                $this->config['vhost']
            );
        } catch (\Exception $e) {
            echo $e->getMessage();
            return;
        }
        if (!$this->connection->isConnected()) {
            echo '链接异常';
            return;
        }
        $this->channel = $this->connection->channel();
    }


    /**
     * @desc 设置消息回掉函数
     * @param $callBack
     */
    public function setCallBack($callBack) {
        self::$callBack = $callBack;
    }

    /**
     * 关闭连接
     * @return bool
     */
    private function close() {
        $this->connection->close();
        $this->channel->close();
        return !$this->connection->isConnected();
    }


    /**
     * @desc 发布消息[延迟消息]
     * @param $mess
     * @param int $expiration 过期时间 毫秒
     */
    public function deadMessage($mess = '', $expiration = 3000) {
        try {
            //声明两个队列,给cache发送  使其过期然后定向到另一个
            $this->channel->exchange_declare("delay_{$this->exchange}", self::$type, false, false, false);
            $this->channel->exchange_declare("cache_{$this->exchange}", self::$type, false, false, false);
            //设置队列的过期时间
            $tale = new AMQPTable();
            // 表示过期后由哪个exchange处理
            $tale->set('x-dead-letter-exchange', "delay_{$this->exchange}");
            $tale->set('x-dead-letter-routing-key', "delay_{$this->exchange}_key");
//        $tale->set('x-message-ttl', intval($ttl));

            $this->channel->queue_declare("cache_{$this->queueName}", false, self::$isDurable, false, false, false, $tale);
            $this->channel->queue_bind("cache_{$this->queueName}", "cache_{$this->exchange}", "cache_{$this->exchange}_key");

            $this->channel->queue_declare("delay_{$this->queueName}", false, self::$isDurable, false, false, false);
            $this->channel->queue_bind("delay_{$this->queueName}", "delay_{$this->exchange}", "delay_{$this->exchange}_key");

            //消息
            if (!empty($mess) && is_array($mess)) {
                $mess = json_encode($mess);
            }
            $msg = new AMQPMessage($mess, [
                'expiration' => intval($expiration),
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]);
            //加入队列
            $this->channel->basic_publish($msg, "cache_{$this->exchange}", "cache_{$this->exchange}_key");
        } catch (\Exception $e) {
            echo $e->getMessage();
            return;
        }
        echo date('Y-m-d H:i:s') . " [x] Sent 'Hello World!' " . PHP_EOL;

        $this->close();
    }

    /**
     * @desc  消息接收
     * @throws \ErrorException
     */
    public function deadReceive() {
        try {
            $this->channel->exchange_declare($this->exchange, self::$type, false, false, false);
            $this->channel->exchange_declare("cache_{$this->exchange}", self::$type, false, false, false);

            $this->channel->queue_declare("delay_{$this->queueName}", false, true, false, false, false);
            $this->channel->queue_bind("delay_{$this->queueName}", "delay_{$this->exchange}", "delay_{$this->exchange}_key");

            echo ' [*] Waiting for message. To exit press CTRL+C ' . PHP_EOL;

            //只有consumer已经处理并确认了上一条message时queue才分派新的message给它
            $this->channel->basic_qos(null, 1, null);
            $this->channel->basic_consume("delay_{$this->queueName}", '', false, false, false, false, self::$callBack);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }
        $this->close();
    }
}