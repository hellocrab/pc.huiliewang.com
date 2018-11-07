<?php

use com\hlw\ks\interfaces\TestServiceClient;

class TestAction extends Action{
    
    
    public function test()
    {
        import('@.ORG.ApiClient');
        ApiClient::init($appid, $secret);
        $testService  = new TestServiceClient(null);
        ApiClient::build($testService);
        echo $testService->test('12345');
    }
}
