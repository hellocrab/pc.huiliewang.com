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
     * @desc ��ʼ��������
     * @var array
     */
    protected $config = [
        'host' => 'localhost', 'port' => 5672, 'user' => 'guest', 'pass' => 'guest', 'vhost' => '/'
    ];

    /**
     * @desc ����·��
     * @var string
     */
    protected $exchange = 'exchange021';
    /**
     * @desc ��������
     * @var string
     */
    protected $queueName = 'queue021';
    /**
     * @desc �Ƿ�־û�
     * @var bool
     */
    private static $isDurable = true;
    /**
     * @desc ��ǰ����
     * @var AMQPStreamConnection
     */
    protected $connection;
    /**
     * @desc ��ǰ������
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    protected $channel;
    /**
     * @desc �ص�����
     * @var mixed
     */
    private static $callBack;
    /**
     * ����������
     * @var string
     */
    private static $type = 'direct';


    /**
     *  ���ó�ʼ������
     * RabbitMqBase constructor.
     * @param array $config ������������
     * @param string $exchangeName ����������
     * @param string $queueName ��������
     */
    public function __construct($config = [], $exchangeName = '', $queueName = '') {
        //������������
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
            echo '�����쳣';
            return;
        }
        $this->channel = $this->connection->channel();
    }


    /**
     * @desc ������Ϣ�ص�����
     * @param $callBack
     */
    public function setCallBack($callBack) {
        self::$callBack = $callBack;
    }

    /**
     * �ر�����
     * @return bool
     */
    private function close() {
        $this->connection->close();
        $this->channel->close();
        return !$this->connection->isConnected();
    }


    /**
     * @desc ������Ϣ[�ӳ���Ϣ]
     * @param $mess
     * @param int $expiration ����ʱ�� ����
     */
    public function deadMessage($mess = '', $expiration = 3000) {
        try {
            //������������,��cache����  ʹ�����Ȼ������һ��
            $this->channel->exchange_declare("delay_{$this->exchange}", self::$type, false, false, false);
            $this->channel->exchange_declare("cache_{$this->exchange}", self::$type, false, false, false);
            //���ö��еĹ���ʱ��
            $tale = new AMQPTable();
            // ��ʾ���ں����ĸ�exchange����
            $tale->set('x-dead-letter-exchange', "delay_{$this->exchange}");
            $tale->set('x-dead-letter-routing-key', "delay_{$this->exchange}_key");
//        $tale->set('x-message-ttl', intval($ttl));

            $this->channel->queue_declare("cache_{$this->queueName}", false, self::$isDurable, false, false, false, $tale);
            $this->channel->queue_bind("cache_{$this->queueName}", "cache_{$this->exchange}", "cache_{$this->exchange}_key");

            $this->channel->queue_declare("delay_{$this->queueName}", false, self::$isDurable, false, false, false);
            $this->channel->queue_bind("delay_{$this->queueName}", "delay_{$this->exchange}", "delay_{$this->exchange}_key");

            //��Ϣ
            if (!empty($mess) && is_array($mess)) {
                $mess = json_encode($mess);
            }
            $msg = new AMQPMessage($mess, [
                'expiration' => intval($expiration),
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]);
            //�������
            $this->channel->basic_publish($msg, "cache_{$this->exchange}", "cache_{$this->exchange}_key");
        } catch (\Exception $e) {
            echo $e->getMessage();
            return;
        }
        echo date('Y-m-d H:i:s') . " [x] Sent 'Hello World!' " . PHP_EOL;

        $this->close();
    }

    /**
     * @desc  ��Ϣ����
     * @throws \ErrorException
     */
    public function deadReceive() {
        try {
            $this->channel->exchange_declare($this->exchange, self::$type, false, false, false);
            $this->channel->exchange_declare("cache_{$this->exchange}", self::$type, false, false, false);

            $this->channel->queue_declare("delay_{$this->queueName}", false, true, false, false, false);
            $this->channel->queue_bind("delay_{$this->queueName}", "delay_{$this->exchange}", "delay_{$this->exchange}_key");

            echo ' [*] Waiting for message. To exit press CTRL+C ' . PHP_EOL;

            //ֻ��consumer�Ѿ�����ȷ������һ��messageʱqueue�ŷ����µ�message����
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