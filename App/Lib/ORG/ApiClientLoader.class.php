<?php

class ApiClientLoader
{

    /**
     * flag for is register loader
     * 
     * @var boolean
     */
    private static $is_register_loader = FALSE;

    /**
     * sdk lib dir
     * 
     * @var array
     */
    private static $sdk_path = array();

    /**
     * loaded file crc
     * 
     * @var string
     */
    private static $loaded_file_crc = array();

    /**
     * sdk config
     * 
     * @var array
     */
    private static $sdk_config = array();

    /**
     * init register loader and sdk
     * 
     * @param string|array $sdk_lib
     */
    public static function init($sdk_lib) {

        if (self::$is_register_loader == FALSE) {
            self::$is_register_loader = TRUE;
            if(ENV == 'local'){
               define('THRIFT_SDK_ROOT', realpath(__DIR__ . '/../../../../../')); 
            } else {
                define('THRIFT_SDK_ROOT', '/home/wwwroot/');
            }
            
            
            define('THRIFT_LIB_DIR', realpath(__DIR__ . '/3rd'));
            spl_autoload_register(array(__CLASS__, 'loadClass'));
        }

        self::appendSdk($sdk_lib);
    }

    /**
     * append sdk lib
     * 
     * @param string|array $sdk_lib
     */
    public static function appendSdk($sdk_lib) {

        if (!is_array($sdk_lib)) {
            $sdk_lib = array($sdk_lib);
        }

        foreach ($sdk_lib as $lib) {


            $path = realpath(THRIFT_SDK_ROOT . '/' . $lib);
            if ($path == '') {
                continue;
            }

            if (in_array($path, self::$sdk_path)) {
                continue;
            }

            array_push(self::$sdk_path, $path);
        }
    }

    /**
     * autoloader function
     * 
     * @param string $class
     */
    public static function loadClass($class) 
    {
        
        $class = ltrim($class, '\\');
        
        // thrift lib
        if (strpos($class, 'Thrift\\') !== FALSE) {
            $file = THRIFT_LIB_DIR . '/' . str_replace(
                            array('\\', '_'), DIRECTORY_SEPARATOR, $class) . '.php';
            if (file_exists($file)) {
                include $file;
                return;
            }
        }

        // thrift sdk
        if ($pos = strrpos($class, '\\')) {
            switch (TRUE) {
                // service
                case preg_match('#(.+)(if|client|processor|rest)$#i', $class, $ns):
                case preg_match('#(.+)_[a-z0-9]+_(args|result)$#i', $class, $ns):
                    $base = str_replace('\\', '/', $ns[1]) . '.php';
                    break;
                // type
                default:
                    $dir = substr($class, 0, $pos);
                    $base = str_replace('\\', '/', $dir) . '/Types.php';
                    break;
            }

            foreach (self::$sdk_path as $sdk) {
                $file = "{$sdk}/php/{$base}";

                // check file is loaded
                $crc = crc32($file);
                if (in_array($crc, self::$loaded_file_crc)) {
                    return;
                }

                if (file_exists($file)) {
                    include $file;
                    self::$loaded_file_crc[] = $crc;
                    return;
                }
            }
        }
    }

    /**
     * load api config
     * 
     * @param string $class
     * @throws Exception
     * @return array
     */
    public static function loadConfig($class) {

        foreach (self::$sdk_path as $sdk) {
            $sdk_name = basename($sdk);
            // skip loaded config
            if (isset(self::$sdk_config[$sdk_name])) {
                continue;
            }

            $xml_path = $sdk . '/define/register-services.xml';
            // TODO APC Cache
            // load xml
            $xml = simplexml_load_file($xml_path);
            if ($xml === FALSE) {
				return json_encode(['code'=>0,'msg'=>'加载失败，请重试。【'.$sdk_name.'】']);
				exit;
                throw new Exception("Api Config Load Failed ({$sdk_name})", -1);
            }

            $children = $xml->children();
            foreach ($children as $child) {
                $cls = ltrim((string) $child->phpclass, '\\');

                foreach ($child->url as $url) {
                    $attr = $url->attributes();
                    $u = (string) $attr['value'];

                    foreach ($url->method as $method) {
                        self::$sdk_config[$sdk_name][$cls][$u][] = (string) $method;
                    }
                }
            }
            unset($xml);
        }

        foreach (self::$sdk_config as $sdk_name => $sdk_config) {
            if (isset($sdk_config[$class])) {
                return $sdk_config[$class];
            }
        }

        throw new Exception("Register Service Config For \"{$class}\" Not Found.", -1);
    }

}
