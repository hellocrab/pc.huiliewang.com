<?php
/**
 * 
 */
class ApiClient {

    private static $appid;
    private static $secret;
    private static $timeout;

    public static function init($appid, $secret, $timeout = 20, $sdk_lib = array('hlwApiSdk'))
    {
        self::$appid = $appid;
        self::$secret = $secret;
        self::$timeout = $timeout;
        \ApiClientLoader::init($sdk_lib);
    }

    /**
     * build api client instance
     *
     * @param mixed $instance
     * @param array $map
     * @throws Exception
     */
    public static function build(&$instance, array $map = array())
    {
        $class = get_class($instance);
        if ($class === FALSE) {
            throw new Exception('Instance Is Not Object.', -1);
        }
        if ($class) {
            $class = str_replace('.', '\\', $class);
        }

        if ($map == NULL) {
            $map = \ApiClientLoader::loadConfig($class);
        }

        $instance = new \ApiClientProxy(self::$appid, self::$secret, self::$timeout, $class, $map);
    }

}
