<?php
/**
 * Created by PhpStorm.
 * User: he
 * Date: 17-7-17
 * Time: 下午5:38
 */

namespace AcmeBundle\Service;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
class RabbitBase
{

    /**
     * 场景死信收容队列
     * @var array
     */
    private static $scene_out_queue = [
        self::TEST => 'test_queue',       // 测试队列
    ];

    /**
     * 场景死信收容交换机
     * @var array
     */
    private static $scene_out_exchange = [
        self::TEST => 'test.exchange',       // 测试队列
    ];

    /**
     * 队列延迟时间 | 毫秒时间
     * @var array
     */
    private static $ttl_time = [
        self::TEST => 10000, // 86400*3
    ];

    /**
     * 场景列表
     * @var array
     */
    private static $scene_list = [
        'TEST'  => 'TEST',      // 测试队列
    ];

    const TEST = 'TEST';// 测试队列

    /**
     * 管道连接
     * @type object
     * @var AMQPStreamConnection
     */
    private $connection;

    /**
     * 交换机
     * @type object
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    private $channel;

    /**
     * 队列名
     * @var string
     */
    private $queue_name;

    /**
     * 交换机名
     * @var string
     */
    private $exchange_name;

    /**
     * 场景参数
     * @var string
     */
    private static $time_scene;

    /**
     * 是否持久化
     * @var bool
     */
    private static $is_durable = true;

    /**
     * 是否延迟
     * @var bool
     */
    private static $is_delay = false;

    /**
     * 当前交换机
     * @var string
     */
    private static $delay_exchange;

    /**
     * 当前队列
     * @var string
     */
    private static $delay_queue;

    /**
     * 延迟队列参数
     * @var array
     */
    private static $arguments = [];

    /**
     * 交换机类型
     * @var string
     */
    private static $type = 'fanout';

    /**
     * 0-9-1 SIG
     * @link http://www.rabbitmq.com/amqp-0-9-1-errata.html#section_3
     * @var string
     */
    private static $T_STRING_SHORT = 'S';

    /**
     * 0-9-1 SIG
     * @link http://www.rabbitmq.com/amqp-0-9-1-errata.html#section_3
     * @var string
     */
    private static $T_INT_LONG = 'I';

    /**
     * RabbitBase constructor.
     * @param array $config // mq配置参数
     */
    public function __construct(array $config)
    {

        $this->connection = new AMQPStreamConnection(
            $config['host']??'',
            $config['port']??'',
            $config['user']??'',
            $config['pwd']??'',
            $config['vhost']??''
        );

        if(!$this->getCloseStatus()){
            // throw new \Exception('AMQP Connection fail');
            echo 'ERROR: AMQP Connection Fail';exit;
        }

        $this->channel = $this->connection->channel();
    }

    /**
     * 设置私有属性
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name = $value;
    }

    /**
     * 获取私有属性
     * @param $name // 属性名
     * @return null
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return isset($this->$name)? $this->$name : null;
    }

    /**
     * 获取场景列表
     * @return array
     */
    public function getSceneList()
    {
        return self::$scene_list;
    }

    /*****************************************************队列服务******************************************************/
    /**
     * 打开管道
     *
     * TODO: is_delay 是true时需后面参数
     * TODO: is_delay 是true时需要 time_scene参数，否则会返回异常信息
     * TODO: queue_scene 或 exchange_scene 为null时默认使用time_scene
     *
     * @param string    $queue_name         队列名
     * @param string    $exchange_name      交换机名
     * @param bool      $is_receive         是否是处理程序
     * @param bool      $is_delay           是否延迟
     * @param string|null    $time_scene         延迟时间 参考 self::$ttl_time
     * @param string|null    $queue_scene        延迟场景队列 参考 self::$scene_out_queue
     * @param string|null    $exchange_scene     延迟场景交换机 参考 self:$scene_out_exchange
     * @throws \Exception
     * @return mixed|null|string
     */
    public function open(
         $queue_name,
         $exchange_name,
         $is_receive = false,
         $is_delay = false,
         $time_scene = null,
         $queue_scene = null,
         $exchange_scene = null
    )
    {
        $this->queue_name = $queue_name;
        $this->exchange_name = $exchange_name;
        self::$time_scene = $time_scene;
        self::$delay_exchange = empty($exchange_scene)?$time_scene:$exchange_scene;
        self::$delay_queue = empty($queue_scene)?$time_scene:$queue_scene;
        self::$is_delay = $is_delay;

        try {
            // TODO: 设置延迟参数
            self::getArguments();

            // TODO: 当开始处理管道内消息时，防止管道未创建引起异常
            if (true === $is_receive) {

                // 创建交换机
                $this->getExchangeDeclare($this->exchange_name, self::$type, self::$is_durable);

                // 创建队列
                $this->getQueueDeclare($this->queue_name, self::$is_durable, self::$arguments);

                // 队列和交换机绑定
                $this->getQueueBind($this->queue_name, $this->exchange_name);
            }
            return true;
        } catch (\Exception $e){
            return 'Info:'.$e->getMessage().' Line:'.$e->getLine().' File:'.$e->getFile();
        }
    }

    /**
     * 加入队列
     * @param array $data
     * @throws \Exception
     * @return bool|string
     */
    public function send(array $data)
    {

        try{

            if (empty($this->queue_name) || empty($this->exchange_name)) {
                throw new \Exception('arguments queue name or exchange name error');
            }

            // TODO: Implement 创建超时收容队列和交换机
            if(empty(self::$time_scene)){
                $this->createOutQueue(
                    self::$scene_out_queue[self::$time_scene]??'',
                    self::$scene_out_exchange[self::$time_scene]??''
                );
            }

            // TODO： Implement 创建交换机
            $this->getExchangeDeclare($this->exchange_name, self::$type, self::$is_durable);

            // TODO： Implement 创建队列
            $this->getQueueDeclare($this->queue_name, self::$is_durable, self::$arguments);

            // TODO： Implement 队列和交换机绑定
            $this->getQueueBind($this->queue_name, $this->exchange_name);

            // TODO: Implement 加入消息到队列
            $this->getBasicPublish($data, $this->queue_name);
            return $this->close();

        } catch (\Exception $e){
            return 'Info:'.$e->getMessage().' Line:'.$e->getLine().' File:'.$e->getFile();
        }

    }

    /**
     * 处理队列
     * @param string $queue
     * @param null $callback
     * @param string $consumer_tag
     * @param bool $no_local
     * @param bool $no_ack
     * @param bool $exclusive
     * @param bool $nowait
     * @param null $ticket
     * @param array $arguments
     */
    public function receive(
        $queue = '',
        $callback = null,
        $consumer_tag = '',
        $no_local = false,
        $no_ack = false,
        $exclusive = false,
        $nowait = false,
        $ticket = null,
        $arguments = array()
    )
    {

        $this->channel->basic_consume(
            $queue,
            $consumer_tag,
            $no_local,
            $no_ack,
            $exclusive,
            $nowait,
            $callback,
            $ticket,
            $arguments
        );

    }

    /**
     *
     * Wait for some expected AMQP methods and dispatch to them.
     * Unexpected methods are queued up for later calls to this PHP
     * method.
     */
    public function wait()
    {
        while(count($this->channel->callbacks)) {
            $this->channel->wait();
        }
    }

    /*****************************************************私有服务******************************************************/

    /**
     * 关闭连接
     * @return bool
     */
    private function close()
    {
        $this->closeConnection();
        $this->closeChannel();
        return !$this->getCloseStatus();
    }

    /**
     * 创建超时队列和交换机
     * @param string $queue_name
     * @param string $exchange_name
     * @throws \Exception
     */
    private function createOutQueue( $queue_name = '',  $exchange_name = '')
    {

        if(empty($queue_name) || empty($exchange_name)){
            throw new \Exception('queue name or exchange name is empty');
        }

        if(true === self::$is_delay){

            // TODO: 创建延迟交换机
            $this->getExchangeDeclare($exchange_name, self::$type, self::$is_durable);

            // TODO: 创建延迟队列
            $this->getQueueDeclare($queue_name, self::$is_durable);

            // TODO: 队列和交换机绑定
            $this->getQueueBind($queue_name, $exchange_name);
        }

    }

    /**
     * 设置超时转移队列参数
     * @throws \Exception
     */
    private static function getArguments()
    {

        if(true === self::$is_delay){

            if(!empty(self::$delay_queue) && !empty(self::$delay_exchange)){
                self::$arguments = array(
                    "x-message-ttl" => array(self::$T_INT_LONG, self::$ttl_time[self::$time_scene]),
                );
                self::setDelayExchange();
                self::setDelayQueue();
            } else {
                throw new \Exception(__METHOD__."delay arguments error");
            }
        }

    }

    /**
     * 设置延迟队列queue
     * @throws \Exception
     */
    private static function setDelayQueue()
    {

        $p = ["x-dead-letter-routing-key" => array(
            self::$T_STRING_SHORT,
            self::$scene_out_queue[self::$delay_queue])
        ];
        if(true === self::$is_delay && !empty(self::$delay_queue)){
            self::$arguments = empty(self::$arguments)?:array_merge(self::$arguments, $p);
        } else {
            throw new \Exception(__METHOD__.'delay arguments error');
        }

    }

    /**
     * 设置延迟队列exchange
     * @throws \Exception
     */
    private static function setDelayExchange()
    {

        $p = ["x-dead-letter-exchange" => array(self::$T_STRING_SHORT, self::$scene_out_exchange[self::$delay_exchange])];
        if(true === self::$is_delay && !empty(self::$delay_exchange)){
            self::$arguments = empty(self::$arguments)?:array_merge(self::$arguments, $p);
        } else {
            throw new \Exception(__METHOD__.'delay arguments error');
        }

    }

    /**
     * 关闭连接
     * @return mixed|null
     */
    private function closeConnection()
    {
        return $this->connection->close();
    }

    /**
     * 关闭交换机连接
     * @return mixed
     */
    private function closeChannel()
    {
        return $this->channel->close();
    }

    /**
     * 获取管道连接
     * @return AMQPStreamConnection
     */
    public function getConnect()
    {
        return $this->connection;
    }

    /**
     * 获取交换机
     * @return \PhpAmqpLib\Channel\AMQPChannel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * 获取连接状态
     * @return bool
     */
    private function getCloseStatus()
    {
        return (bool)$this->connection->isConnected();
    }

    /**
     * 声明一个队列，不存在则创建
     * @param string $queue
     * @param bool $passive
     * @param bool $durable
     * @param bool $exclusive
     * @param bool $auto_delete
     * @param bool $nowait
     * @param null $arguments
     * @param null $ticket
     * @return mixed|null
     */
    private function getQueueDeclare(
        $queue = '',
        $durable = true,
        $arguments = null,
        $passive = false,
        $exclusive = false,
        $auto_delete = false,
        $nowait = false,
        $ticket = null
    )
    {
        return $this->channel->queue_declare(
            $queue, $passive, $durable, $exclusive, $auto_delete, $nowait, $arguments, $ticket
        );
    }

    /**
     * 声明一个交换机
     * @param $exchange
     * @param $type
     * @param bool $passive
     * @param bool $durable
     * @param bool $auto_delete
     * @param bool $internal
     * @param bool $nowait
     * @param null $arguments
     * @param null $ticket
     * @return mixed|null
     */
    private function getExchangeDeclare(
        $exchange,
        $type,
        $durable = true,
        $passive = false,
        $auto_delete = false,
        $internal = false,
        $nowait = false,
        $arguments = null,
        $ticket = null
    )
    {
        return $this->channel->exchange_declare(
            $exchange,
            $type,
            $passive,
            $durable,
            $auto_delete,
            $internal,
            $nowait,
            $arguments,
            $ticket
        );
    }

    /**
     * 加入队列
     * @param $msg
     * @param string $exchange
     * @param string $routing_key
     * @param bool $mandatory
     * @param bool $immediate
     * @param null $ticket
     */
    private function getBasicPublish(
        $msg,
        $exchange = '',
        $routing_key = '',
        $mandatory = false,
        $immediate = false,
        $ticket = null
    )
    {

        self::message($msg, $this->queue_name);

        return $this->channel->basic_publish($msg,
            $exchange,
            $routing_key,
            $mandatory,
            $immediate,
            $ticket
        );
    }

    /**
     * 消息转换对象
     * @param $msg
     * @param string $queue
     */
    private static function message(&$msg, string $queue)
    {
        if(is_array($msg)) {
            $msg['queue'] = $queue;
            $msg = serialize($msg);
        }

        if(self::$is_durable) {
            $msg = new AMQPMessage($msg, ['delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]);
        } else {
            $msg = new AMQPMessage($msg);
        }
    }

    /**
     * 绑定队列到交换机
     * @param $queue
     * @param $exchange
     * @param string $routing_key
     * @param bool $nowait
     * @param null $arguments
     * @param null $ticket
     * @return mixed|null
     */
    private function getQueueBind(
        $queue,
        $exchange,
        $routing_key = '',
        $nowait = false,
        $arguments = null,
        $ticket = null
    )
    {
        return $this->channel->queue_bind(
            $queue,
            $exchange,
            $routing_key,
            $nowait,
            $arguments,
            $ticket
        );
    }

    /**
     * 获取队列内信息数
     * @deprecated
     * @return int
     */
    public function getMessageNumber()
    {
        return (int)$this->getQueueDeclare(
            $this->queue_name,
            self::$is_durable)->method()->message_count();
    }

    /**
     * 获取消费者数量
     * @deprecated
     * @return int
     */
    public function getConsumerNumber()
    {
        return (int)$this->getQueueDeclare(
            $this->queue_name,
            self::$is_durable)->method()->consumer_count();
    }

}