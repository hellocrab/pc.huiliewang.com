<?php

class ApiClientProxy {

    private $_appid;
    private $_secret;
    private $_class;
    private $_timeout;
    private $_map;

    /**
     * create api client with service class name
     *
     * @param string $appid
     * @param string $secret
     * @param float $timeout
     * @param string $class
     * @param array $map
     */
    public function __construct($appid, $secret, $timeout, $class, array $map) {
        $this->_appid = $appid;
        $this->_secret = $secret;
        $this->_timeout = $timeout;
        $this->_class = $class;
        $this->_map = $map;
    }

    /**
     * request remote api service
     *
     * @param string $host
     * @param int $port
     * @param string $timeout
     * @param string $headers
     * @param string $uri
     * @param string $clientClass
     * @param string $clientMethod
     * @param array $arguments
     * @throws Exception
     * @return mixed
     */
    private function request($host, $port, $timeout = 0, array $headers = array(), $uri, $clientClass, $clientMethod, array $arguments) {

        require_once __DIR__. "/ApiClientHttpClient.class.php";
        $socket = new ApiClientHttpClient($host, $port, $uri);
        $transport = new Thrift\Transport\TBufferedTransport($socket, 1024, 1024);
        $protocol = new Thrift\Protocol\TBinaryProtocol($transport);
        $client = new $clientClass($protocol);

        // add request timeout
        if ($timeout > 0) {
            $socket->setTimeoutSecs($timeout);
        }

        // add request header
        if ($headers) {
            $socket->addHeaders($headers);
        }

        $transport->open();
        try {
            $result = call_user_func_array(array($client, $clientMethod), $arguments);
        } catch (Exception $e) {
            // catch unknown result
            $message = $e->getMessage();
            if (strlen($message) > 14 && substr($message, -14) == 'unknown result') {
                $result = NULL;
            } else {
                throw $e;
            }
        }
        $transport->close();

        return $result;
    }

    /**
     * create signature
     *
     * @param string $appid
     * @param string $secret
     * @param string $timestamp
     * @return string
     */
    private function createSignature($appid, $secret, $timestamp) {
        return md5($appid . $secret . $timestamp);
    }

    /**
     * magic method for api method invoke
     *
     * @param string $method
     * @param array $arguments
     * @throws Exception
     * @return mixed
     */
    public function __call($method, $arguments) {
        $cfg = array();
        foreach ($this->_map as $url => $methods) {
            if (in_array($method, $methods)) {
                $info = parse_url($url);
                $cfg = array(
                    $info['host'],
                    isset($info['port']) ? $info['port'] : '80',
                    isset($info['path']) ? $info['path'] : '/');
            }
        }
        if ($cfg == NULL) {
            $methodException = new Exception('Api Client Method Not Exists', -1);
            throw $methodException;
        }

        list($host, $port, $uri) = $cfg;

        $timestamp = time();
        $sign = $this->createSignature(
                $this->_appid, $this->_secret, $timestamp);
        $headers = array(
            'HLW_APPID' => $this->_appid,
            'HLW_SIGNATURE' => $sign,
            'HLW_TIMESTAMP' => $timestamp,
            'HLW_SEQ' => uniqid());

        return $this->request(
                        $host, $port, $this->_timeout, $headers, $uri, $this->_class, $method, $arguments);
    }

}
