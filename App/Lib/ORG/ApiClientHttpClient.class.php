<?php

use Thrift\Transport\THttpClient;
use Thrift\Exception\TApplicationException;

class ApiClientHttpClient extends THttpClient {

    const MAX_READ_LENGTH = 134217728;

    private $isFirstRead = TRUE;

    public function read($len) {
        // check header code
        if ($this->isFirstRead) {
            $this->isFirstRead = FALSE;
            $headers = $this->parseHeader();
            if ($headers['HLW_CODE'] !== '0') {

                throw new TApplicationException(
                $this->parseBody(), $headers['HLW_CODE']);
            }
        }

        // check each read length
        if ($len > self::MAX_READ_LENGTH) {
            throw new TApplicationException(
            'read message too long. ' . $len, -1);
        }

        return parent::read($len);
    }

    private function parseHeader() {
        $raw = stream_get_meta_data($this->handle_);

        $headers = array();
        foreach ($raw['wrapper_data'] as $line) {
            if (!strstr($line, ':')) {
                continue;
            }

            list($key, $val) = explode(':', $line, 2);
            switch ($key) {
                case 'HLW_CODE':
                case 'HLW_SEQ':
                    break;
                default: // skip other
                    continue;
            }
            $headers[trim($key)] = trim($val);
        }


        return $headers;
    }

    private function parseBody() {
        return stream_get_contents($this->handle_);
    }

}
