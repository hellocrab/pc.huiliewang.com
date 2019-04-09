<?php
/**
 * Created by PhpStorm.
 * User: he
 * Date: 17-7-17
 * Time: ����5:38
 */

namespace AcmeBundle\Service;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
class RabbitBase
{

    /**
     * �����������ݶ���
     * @var array
     */
    private static $scene_out_queue = [
        self::TEST => 'test_queue',       // ���Զ���
    ];

    /**
     * �����������ݽ�����
     * @var array
     */
    private static $scene_out_exchange = [
        self::TEST => 'test.exchange',       // ���Զ���
    ];

    /**
     * �����ӳ�ʱ�� | ����ʱ��
     * @var array
     */
    private static $ttl_time = [
        self::TEST => 10000, // 86400*3
    ];

    /**
     * �����б�
     * @var array
     */
    private static $scene_list = [
        'TEST'  => 'TEST',      // ���Զ���
    ];

    const TEST = 'TEST';// ���Զ���

    /**
     * �ܵ�����
     * @type object
     * @var AMQPStreamConnection
     */
    private $connection;

    /**
     * ������
     * @type object
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    private $channel;

    /**
     * ������
     * @var string
     */
    private $queue_name;

    /**
     * ��������
     * @var string
     */
    private $exchange_name;

    /**
     * ��������
     * @var string
     */
    private static $time_scene;

    /**
     * �Ƿ�־û�
     * @var bool
     */
    private static $is_durable = true;

    /**
     * �Ƿ��ӳ�
     * @var bool
     */
    private static $is_delay = false;

    /**
     * ��ǰ������
     * @var string
     */
    private static $delay_exchange;

    /**
     * ��ǰ����
     * @var string
     */
    private static $delay_queue;

    /**
     * �ӳٶ��в���
     * @var array
     */
    private static $arguments = [];

    /**
     * ����������
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
     * @param array $config // mq���ò���
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
     * ����˽������
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name = $value;
    }

    /**
     * ��ȡ˽������
     * @param $name // ������
     * @return null
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return isset($this->$name)? $this->$name : null;
    }

    /**
     * ��ȡ�����б�
     * @return array
     */
    public function getSceneList()
    {
        return self::$scene_list;
    }

    /*****************************************************���з���******************************************************/
    /**
     * �򿪹ܵ�
     *
     * TODO: is_delay ��trueʱ��������
     * TODO: is_delay ��trueʱ��Ҫ time_scene����������᷵���쳣��Ϣ
     * TODO: queue_scene �� exchange_scene ΪnullʱĬ��ʹ��time_scene
     *
     * @param string    $queue_name         ������
     * @param string    $exchange_name      ��������
     * @param bool      $is_receive         �Ƿ��Ǵ������
     * @param bool      $is_delay           �Ƿ��ӳ�
     * @param string|null    $time_scene         �ӳ�ʱ�� �ο� self::$ttl_time
     * @param string|null    $queue_scene        �ӳٳ������� �ο� self::$scene_out_queue
     * @param string|null    $exchange_scene     �ӳٳ��������� �ο� self:$scene_out_exchange
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
            // TODO: �����ӳٲ���
            self::getArguments();

            // TODO: ����ʼ����ܵ�����Ϣʱ����ֹ�ܵ�δ���������쳣
            if (true === $is_receive) {

                // ����������
                $this->getExchangeDeclare($this->exchange_name, self::$type, self::$is_durable);

                // ��������
                $this->getQueueDeclare($this->queue_name, self::$is_durable, self::$arguments);

                // ���кͽ�������
                $this->getQueueBind($this->queue_name, $this->exchange_name);
            }
            return true;
        } catch (\Exception $e){
            return 'Info:'.$e->getMessage().' Line:'.$e->getLine().' File:'.$e->getFile();
        }
    }

    /**
     * �������
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

            // TODO: Implement ������ʱ���ݶ��кͽ�����
            if(empty(self::$time_scene)){
                $this->createOutQueue(
                    self::$scene_out_queue[self::$time_scene]??'',
                    self::$scene_out_exchange[self::$time_scene]??''
                );
            }

            // TODO�� Implement ����������
            $this->getExchangeDeclare($this->exchange_name, self::$type, self::$is_durable);

            // TODO�� Implement ��������
            $this->getQueueDeclare($this->queue_name, self::$is_durable, self::$arguments);

            // TODO�� Implement ���кͽ�������
            $this->getQueueBind($this->queue_name, $this->exchange_name);

            // TODO: Implement ������Ϣ������
            $this->getBasicPublish($data, $this->queue_name);
            return $this->close();

        } catch (\Exception $e){
            return 'Info:'.$e->getMessage().' Line:'.$e->getLine().' File:'.$e->getFile();
        }

    }

    /**
     * �������
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

    /*****************************************************˽�з���******************************************************/

    /**
     * �ر�����
     * @return bool
     */
    private function close()
    {
        $this->closeConnection();
        $this->closeChannel();
        return !$this->getCloseStatus();
    }

    /**
     * ������ʱ���кͽ�����
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

            // TODO: �����ӳٽ�����
            $this->getExchangeDeclare($exchange_name, self::$type, self::$is_durable);

            // TODO: �����ӳٶ���
            $this->getQueueDeclare($queue_name, self::$is_durable);

            // TODO: ���кͽ�������
            $this->getQueueBind($queue_name, $exchange_name);
        }

    }

    /**
     * ���ó�ʱת�ƶ��в���
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
     * �����ӳٶ���queue
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
     * �����ӳٶ���exchange
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
     * �ر�����
     * @return mixed|null
     */
    private function closeConnection()
    {
        return $this->connection->close();
    }

    /**
     * �رս���������
     * @return mixed
     */
    private function closeChannel()
    {
        return $this->channel->close();
    }

    /**
     * ��ȡ�ܵ�����
     * @return AMQPStreamConnection
     */
    public function getConnect()
    {
        return $this->connection;
    }

    /**
     * ��ȡ������
     * @return \PhpAmqpLib\Channel\AMQPChannel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * ��ȡ����״̬
     * @return bool
     */
    private function getCloseStatus()
    {
        return (bool)$this->connection->isConnected();
    }

    /**
     * ����һ�����У��������򴴽�
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
     * ����һ��������
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
     * �������
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
     * ��Ϣת������
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
     * �󶨶��е�������
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
     * ��ȡ��������Ϣ��
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
     * ��ȡ����������
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