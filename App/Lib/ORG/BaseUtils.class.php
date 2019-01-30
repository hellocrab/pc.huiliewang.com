<?php

class BaseUtils {

    public static $error = '';
    protected static $clientIP;

    //过滤XSS攻击
    public static function reMoveXss($val) {
        $val = preg_replace('/([\x00-\x08])/', '', $val);
        $val = preg_replace('/([\x0b-\x0c])/', '', $val);
        $val = preg_replace('/([\x0e-\x19])/', '', $val);
        $search = 'abcdefghijklmnopqrstuvwxyz';
        $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $search .= '1234567890!@#$%^&*()';
        $search .= '~`";:?+/={}[]-_|\'\\';
        for ($i = 0; $i < strlen($search); $i++) {
            $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val);
            $val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val);
        }

        $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'base');
        $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
        $ra = array_merge($ra1, $ra2);
        $found = true;
        while ($found == true) {
            $val_before = $val;
            for ($i = 0; $i < sizeof($ra); $i++) {
                $pattern = '/';
                for ($j = 0; $j < strlen($ra[$i]); $j++) {
                    if ($j > 0) {
                        $pattern .= '(';
                        $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                        $pattern .= '|';
                        $pattern .= '|(&#0{0,8}([9|10|13]);)';
                        $pattern .= ')*';
                    }
                    $pattern .= $ra[$i][$j];
                }
                $pattern .= '/i';
                $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag
                $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
                if ($val_before == $val) {
                    $found = false;
                }
            }
        }
        return $val;
    }

    /**
     * 安全过滤数据
     * @param string	$str		需要处理的字符或数组
     * @param string	$type		返回的字符类型，支持，string,int,float,html
     * @param mixed		$default	当出现错误或无数据时默认返回值
     * @return 		mixed		当出现错误或无数据时默认返回值
     */
    public static function getStr($str, $type = 'string', $default = '') {
        //如果为空则为默认值
        if ($str === '')
            return $default;
        if (is_array($str)) {
            $_str = array();
            foreach ($str as $key => $val) {
                $_str[$key] = self::getStr($val, $type, $default);
            }
            return $_str;
        }
        //转义
        if (!get_magic_quotes_gpc())
            $str = addslashes($str);
        switch ($type) {
            case 'string': //字符处理
                $_str = strip_tags($str);
                $_str = str_replace("'", '&#39;', $_str);
                $_str = str_replace("\"", '&quot;', $_str);
                $_str = str_replace("\\", '', $_str);
                $_str = str_replace("\/", '', $_str);
                $_str = str_replace("+/v", '', $_str);
                break;
            case 'int': //获取整形数据
                $_str = intval($str);
                break;
            case 'float': //获浮点形数据
                $_str = floatval($str);
                break;
            case 'html': //获取HTML，防止XSS攻击
                $_str = self::reMoveXss($str);
                break;
            default: //默认当做字符处理
                $_str = strip_tags($str);
        }

        return $_str;
    }

    /**
     * 检查日期是否符合0000-00-00
     *
     * @param string $sDate
     * @return bool
     */
    public static function isDate($sDate) {
        if (preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/', $sDate)) {
            return strtotime($sDate) !== false;
        } else {
            return false;
        }
    }

    /**
     * 检查日期是否符合0000-00-00 00:00:00
     *
     * @param string $sTime
     * @return bool
     */
    public static function isTime($sTime) {
        if (preg_match('/^[0-9]{4}\-[][0-9]{2}\-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/', $sTime)) {
            return strtotime($sTime) !== false;
        } else {
            return false;
        }
    }

    /**
     * IsMobile函数:检测参数的值是否为正确的中国手机号码格式
     * 返回值:是正确的手机号码返回手机号码,不是返回false
     */
    public static function IsMobile($Argv) {
        if (!ctype_digit((string) $Argv))
            return false;
        $RegExp = '/^(?:13|15|17|18|14)[0-9]\d{8}$/';
        //return preg_match($RegExp,$Argv)?$Argv:false;
        if (preg_match($RegExp, $Argv))
            return true;
        return false;
    }

    /**
     * 检测是否是EMAIL
     * @param type $email
     * @return bool
     */
    public static function IsEmail($email) {
        return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
    }

    public static function IsMd5($password) {
        return preg_match("/^[a-f0-9]{32}$/", $password);
    }

    /**
     * 防注入处理(为变量加入斜杠)函数
     * @param $string 可以为字符或者数组
     * @return $string 可以为字符或者数组
     */
    public static function saddslashes($string) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = self::saddslashes($val);
            }
        } else {
            $string = self::straddslashes($string);
        }
        return $string;
    }

    public static function straddslashes($string) {
        if (!get_magic_quotes_gpc()) {
            return addslashes($string);
        } else {
            return $string;
        }
    }

    /**
     * 去掉变量斜杠函数
     * @param $string 可以为字符或者数组
     * @return $string 可以为字符或者数组
     */
    public static function sstripslashes($string) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = self::sstripslashes($val);
            }
        } else {
            $string = stripslashes($string);
        }
        return $string;
    }

    /**
     * 取消HTML特殊字符 防止XSS
     * @param $string 可以为字符或者数组
     * @return $string 可以为字符或者数组
     */
    public static function shtmlspecialchars($string) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = self::shtmlspecialchars($val);
            }
        } else {
            $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1', str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
        }
        return $string;
    }

    /**
     * 取消HTML特殊字符 防止XSS
     * @param $array 可以为字符或者数组
     * @return $array 可以为字符或者数组
     */
    public static function specialhtml($array) {
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (!is_array($value)) {
                    $array[$key] = htmlspecialchars($value);
                } else {
                    self::specialhtml($array[$key]);
                }
            }
        } else {
            $array = htmlspecialchars($array);
        }
    }

    /**
     * 标准输出
     * @param array $data
     * @param int $state
     * @param string $nonce 请求标识
     * @param string $code_str
     */
    public static function json($data, $state = 0, $nonce, $code_str = '') {
        $return = array('code' => $state, 'code_str' => $code_str, 'nonce' => $nonce, 'data' => $data);
        echo json_encode($return);
        exit;
    }

    public static function run404() {
        echo self::json(array(), 404, '', 'http error');
        exit;
    }

    /**
     * 是否是ajax提交
     * @return bool
     */
    public static function isAjax() {
        if ($_REQUEST['isAjax']) {
            return true;
        }
        if (isset($_SERVER ['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER ['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //是否ajax请求
            return true;
        } else {
            return false;
        }
    }

    /**
     * 是否是POST方法
     * @param bool $reqpostdata
     *        	是否有post字段默认true
     * @return boolean
     */
    public static function isPost($reqpostdata = true) {
        if (isset($_SERVER ['REQUEST_METHOD']) && strtolower($_SERVER ['REQUEST_METHOD']) == 'post') {
            if ($reqpostdata) {
                if (count($_POST)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

    /**
     * 用curl重写file_get_contents,规避file_get_contents的堵塞问题
     * @param string $url 请求的url
     * @param array $data 请求的参数
     * @param string $method 请求的方法
     * @param int $timeout 请求超时的时间
     * 
     */
    public static function file_get_contents_safe($url, $data = array(), $method = 'GET', $timeout = 5, $sync = True) {
        $ch = curl_init();
        $data = is_array($data) ? http_build_query($data) : $data;

        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (strtoupper($method) == 'POST') {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, True);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } else if (strtoupper($method) == 'GET') {
            curl_setopt($ch, CURLOPT_URL, empty($data) ? $url : $url . '?' . $data);
        } else { //PUT方法支持
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $sync);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, !$sync);
        $return = curl_exec($ch);
        curl_close($ch);

        return $return;
    }

    /**
     * 将键值对数组转换为指定的对象
     * @param	array	$array	键值对数组
     * @param	object	$object	待转对象
     * @return false | $object
     * */
    public static function arrayToObject($array, $object) {
        if (!is_array($array) || empty($array) || !is_object($object) || empty($object)) {
            return false;
        }

        foreach ($array as $k => $v) {
            if (property_exists($object, $k)) {
                $object->{$k} = $v;
            }
        }

        return $object;
    }

    /**
     * 时间差转为X天X小时X分X秒等形式
     * @param $int $intervalTime
     * @param $accuracy  day精确到天 hour精确到小时 minute精确到分 second精确到秒,max精确在最大一个有数据的值
     */
    public static function intervalTime2str($intervalTime, $accuracy = "hour") {
        $intervalTime = $intervalTime > 0 ? $intervalTime : 0;

        $day = floor($intervalTime / 86400);
        $hour = floor(($intervalTime - 86400 * $day) / 3600);
        $minute = floor((($intervalTime - 86400 * $day) - 3600 * $hour) / 60);
        $second = floor((($intervalTime - 86400 * $day) - 3600 * $hour) - 60 * $minute);
        $str = "";
        $s_day = ($day > 0) ? $day . "天" : "";
        $s_hour = ($hour > 0) ? $hour . "小时" : "";
        $s_minute = ($minute > 0) ? $minute . "分钟" : "";
        $s_second = ($second > 0) ? $second . "秒" : "";
        if ($accuracy == "day") {
            return $s_day;
        }
        if ($accuracy == "hour") {
            return $s_day . $s_hour;
        }
        if ($accuracy == "minute") {
            return $s_day . $s_hour . $s_minute;
        }
        if ($accuracy == "second") {
            return $s_day . $s_hour . $s_minute . $s_second;
        }
        if ($accuracy == "max") {
            if ($s_day != "")
                return $s_day;
            if ($s_hour != "")
                return $s_hour;
            if ($s_minute != "")
                return $s_minute;
            if ($s_second != "")
                return $s_second;
        }
    }

    /**
     * 双向加密
     */
    public static function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
        // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
        $ckey_length = 4;

        // 密匙
        $key = md5($key ? $key : 'zhubajie');

        // 密匙a会参与加解密
        $keya = md5(substr($key, 0, 16));
        // 密匙b会用来做数据完整性验证
        $keyb = md5(substr($key, 16, 16));
        // 密匙c用于变化生成的密文
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';
        // 参与运算的密匙
        $cryptkey = $keya . md5($keya . $keyc);
        $key_length = strlen($cryptkey);
        // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，解密时会通过这个密匙验证数据完整性
        // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
        $string_length = strlen($string);
        $result = '';
        $box = range(0, 255);
        $rndkey = array();
        // 产生密匙簿
        for ($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }
        // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度
        for ($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }
        // 核心加解密部分
        for ($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            // 从密匙簿得出密匙进行异或，再转成字符
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }
        if ($operation == 'DECODE') {
            // substr($result, 0, 10) == 0 验证数据有效性
            // substr($result, 0, 10) - time() > 0 验证数据有效性
            // substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16) 验证数据完整性
            // 验证数据有效性，请看未加密明文的格式
            if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
            // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码
            return $keyc . str_replace('=', '', base64_encode($result));
        }
    }

    /**
     * 获取字符串的编码
     */
    public static function getStrEncoding($str) {
        $encodings = array('UTF-8', 'ASCII', 'GB2312', 'GBK', 'CP936', 'HZ', 'EUC-CN', 'BIG-5', 'EUC-TW');
        foreach ($encodings as $enc) {
            if (mb_check_encoding($str, $enc))
                return $enc;
        }
        return false;
    }

    /**
     * 编码转换
     * @param $str 需要转换的字符
     * @param $out_charset 转换的编码格式
     * @param $in_charset 默认的编码格式
     * @return 字符串
     */
    public static function siconv($str, $out_charset, $in_charset = '') {
        global $_SC;

        $in_charset = empty($in_charset) ? strtoupper($_SC['charset']) : strtoupper($in_charset);
        $out_charset = strtoupper($out_charset);
        if ($in_charset != $out_charset) {
            if (function_exists('iconv') && (@$outstr = iconv("$in_charset//IGNORE", "$out_charset//IGNORE", $str))) {
                return $outstr;
            } elseif (function_exists('mb_convert_encoding') && (@$outstr = mb_convert_encoding($str, $out_charset, $in_charset))) {
                return $outstr;
            }
        }
        return $str; // 转换失败
    }

    /**
     * 产生随机数
     * @param $length 产生随机数长度
     * @param $type 返回字符串类型
     * @param $hash  是否由前缀，默认为空. 如:$hash = 'zz-'  结果zz-823klis
     * @return 随机字符串 $type = 0：数字+字母
      $type = 1：数字
      $type = 2：字符
     */
    public static function random($length, $type = 0, $hash = '') {
        if ($type == 0) {
            $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        } else if ($type == 1) {
            $chars = '0123456789';
        } else if ($type == 2) {
            $chars = 'abcdefghijklmnopqrstuvwxyz';
        }
        $max = strlen($chars) - 1;
        mt_srand((double) microtime() * 1000000);
        for ($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }

    //建议所有主键参数都使用此方法进行简单加密，防止数据被遍历
    //重写的base64_encode 用于对称加密
    public static function base64_encode($str) {
        $str_arr = str_split($str); //分成单个字符
        $mod = count($str_arr) % 3; //不够3个
        if ($mod > 0)
            $bmod = 3 - $mod; //计算需要补多少才能够3个
        for ($i = 0; $i < $bmod; $i++) {//不够3个补\0
            $str_arr[] = "\0";
        }
        //字符串转换为二进制
        foreach ($str_arr as $v) {
            $bit .= str_pad(decbin(ord($v)), 8, '0', STR_PAD_LEFT);
        }
        $len = ceil(strlen($bit) / 6);
        $base64_config = self::getBase64Config();
        //把二进制按照六位进行转换为base64索引
        for ($i = 0; $i < $len - $bmod; $i++) {
            $enstr .= $base64_config[bindec(str_pad(substr($bit, $i * 6, 6), 8, 0, STR_PAD_LEFT))];
        }
        //补=号
        for ($buf = 1; $buf <= $bmod; $buf++) {
            $enstr .= "=";
        }
        return $enstr;
    }

    //重写的base64_decode 用于对称加密
    public static function base64_decode($str) {
        $buf = substr_count($str, '='); //统计=个数
        $str_arr = str_split($str); //分成单个字符
        $base64_config = self::getBase64Config();
        //转换为二进制字符串
        foreach ($str_arr as $v) {
            $index = array_search($v, $base64_config);
            $index = $index ? $index : "\0";
            $bit .= str_pad(decbin($index), 6, 0, STR_PAD_LEFT);
        }
        $len = ceil(strlen($bit) / 8);
        //二进制转换为ASCII，在转换为字符串
        for ($i = 0; $i < $len - $buf; $i++) {
            $destr .= chr(bindec(str_pad(substr($bit, $i * 8, 8), 8, 0, STR_PAD_LEFT)));
        }
        return $destr;
    }

    //混淆的base64索引
    public static function getBase64Config() {
        return array(
            'x', 'T', 'E', 'Z', 'O', 'F', 'm', 'S', 'Q', 'r', 'X', 'N', 'L', 's', 'p', 'H', '9', 't', 'l', 'y', 'P', 'J', 'C', 'c', 'U', '3', 'u', 'a', 'A', 'd', 'D', 'f',
            'I', 'k', '5', 'w', 'B', 'g', 'h', 'z', 'V', 'R', 'e', '2', '1', 'Y', 'j', '4', 'b', 'o', '8', '6', 'i', 'W', '0', 'M', 'n', '7', 'K', 'G', 'q', 'v', '+', '/'
        );
    }

    /**
     * 验证身份证
     * @param string $id_card
     * @return bool
     */
    public static function validation_filter_id_card($id_card) {
        if (strlen($id_card) == 18) {
            return self::idcard_checksum18($id_card);
        } elseif ((strlen($id_card) == 15)) {
            $id_card = self::idcard_15to18($id_card);

            return self::idcard_checksum18($id_card);
            /**
             * 用户交接源文件身份证号
             */
        } elseif ($id_card == 'S7935588G') {//台湾
            return true;
        } elseif ((strlen($id_card)) == 10) {
            return self::hkidcard($id_card);
        } elseif ($id_card == '0442268402(B)') {
            return true;
        } else {
            return false;
        }
    }

    // 18位身份证校验码有效性检查
    public static function idcard_checksum18($idcard) {
        if (strlen($idcard) != 18) {
            return false;
        }
        $idcard_base = substr($idcard, 0, 17);
        if (self::idcard_verify_number($idcard_base) != strtoupper(substr($idcard, 17, 1))) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 将15位身份证升级到18位
     * @param string $idcard
     * @return bool|string
     */
    public static function idcard_15to18($idcard) {
        if (strlen($idcard) != 15) {
            return false;
        } else {
            // 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码
            if (array_search(substr($idcard, 12, 3), array('996', '997', '998', '999')) !== false) {
                $idcard = substr($idcard, 0, 6) . '18' . substr($idcard, 6, 9);
            } else {
                $idcard = substr($idcard, 0, 6) . '19' . substr($idcard, 6, 9);
            }
        }
        $idcard = $idcard . self::idcard_verify_number($idcard);

        return $idcard;
    }

    // 计算身份证校验码，根据国家标准GB 11643-1999
    public static function idcard_verify_number($idcard_base) {
        if (strlen($idcard_base) != 17) {
            return false;
        }
        //加权因子
        $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
        //校验码对应值
        $verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
        $checksum = 0;
        for ($i = 0; $i < strlen($idcard_base); $i++) {
            $checksum += substr($idcard_base, $i, 1) * $factor[$i];
        }
        $mod = $checksum % 11;
        $verify_number = $verify_number_list[$mod];
        return $verify_number;
    }

    /**
     * 检测时间的正确性
     * @param $date 时间格式如:2010-04-05
     * @return true or false
     */
    public static function chkdate($date) {
        if ((strpos($date, '-'))) {
            $d = explode("-", $date);
            if (checkdate($d[1], $d[2], $d[0])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * 判断是否是整数值型数组 如array(1,'234',5) 不是返回false 是返回整数值数组
     * @param array $array
     * @param bool $is_unsigned 是否必须为非负数
     * @param bool $preserve_type 是否保留原有类型
     * @param bool $is_strict 是否是严格模式 严格模式时含有不合格数据时返回false 不是严格模式时跳过
     * @return false|array
     */
    public static function getIntArray($array, $is_unsigned = true, $preserve_type = false, $is_strict = false) {
        $array = (array) $array;
        $rtn = array();
        if ($array) {
            foreach ($array as $v) {
                if (!ctype_digit((string) $v)) {
                    if ($is_unsigned === false) {
                        $v_new = preg_replace('/^-/', '', (string) $v, 1);
                        if (ctype_digit($v_new)) {
                            $rtn[] = $preserve_type ? $v : intval($v);
                            continue;
                        }
                    }
                    if ($is_strict) {
                        return false;
                    } else {
                        continue;
                    }
                } else {
                    $rtn[] = $preserve_type ? $v : intval($v);
                }
            }

            return $rtn ?: false;
        } else {
            return false;
        }
    }

    /**
     * 当前连接是否是https连接
     * @return bool
     */
    public static function isHttpsConnection() {
        return ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] !== 'off' && $_SERVER['SERVER_PORT'] == 443) || ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on');
    }

    public static function getIp($format = '000.000.000.000') {
        if (self::$clientIP === null) {
            if ($_SERVER['HTTP_REMOTE_HOST'] && $_SERVER['HTTP_X_REAL_IP'] && $_SERVER['HTTP_REMOTE_HOST'] == $_SERVER['HTTP_X_REAL_IP']) {
                $client_ip = $_SERVER['HTTP_X_REAL_IP'];
            } elseif (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
                $client_ip = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
                $client_ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
                $client_ip = getenv('REMOTE_ADDR');
            } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')
            ) {
                $client_ip = $_SERVER['REMOTE_ADDR'];
            } else {
                $client_ip = '';
            }
            preg_match("/[\d\.]{7,15}/", $client_ip, $ip_matches);
            self::$clientIP = $ip_matches[0] ? $ip_matches[0] : 'unknown';
        }
        if (!$format) {
            return self::$clientIP;
        } else {
            return sprintf('%u', ip2long(self::$clientIP));
        }
    }

    /**
     * 写入日志文件 检查文件如果存在就建立日志
     * @param string $msg
     * @param string $file
     * @return bool
     */
    public static function addLog($msg, $file = 'db_error.log', $dir = '/var/log/gandianli/dberror/') {
        $file = $dir . $file . '.' . date('Y-m-d');
        if ((is_dir($dir) || @mkdir($dir, 0755, true)) && is_writable($dir)) {
            $data = 'Date:' . date('Y-m-d H:i:s') . ' ' . $msg . "\n";
            $f = fopen($file, 'a+');
            fwrite($f, $data, strlen($data));
            fclose($f);
            return true;
        }
        return false;
    }

    /**
     * sso Token 生成 
     * @param type $prefix
     * @return type
     */
    public static function generate($prefix = 'hlw_') {
        return sprintf("{$prefix}-%04x%04x-%04x-%04x-%04x-%04x%04x%04x", mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }

    public static function getLoadConfig($config_name) {
        import('@.ORG.MyRedis');
        $m_config = M('Config');
        $redis = MyRedis::getInstance(['REDIS_HOST' => C('REDIS_HOST'), 'REDIS_PORT' => C('REDIS_PORT'), 'REDIS_AUTH' => C('REDIS_AUTH')]);

        if (!$redis->get($config_name)) {
            $resu = $m_config->where('name="'.$config_name.'"')->getField('value');
            $redis->set($config_name,$a);
            $value = $a;
        }
        
        $value = $redis->get($config_name);
        
        return $value;
    }

}
