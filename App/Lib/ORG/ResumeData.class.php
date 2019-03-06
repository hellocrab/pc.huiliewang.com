<?php
class ResumeData {

    protected $extension = 'doc,mht,mht,htm,html,docx'; //允许的扩展名
    protected $wordObj = null;

    /**
     * 获取简历文件路径
     * @param	String	$file	 要导入的文件路径
     * @return	Array
     */
    public function getData($file) {
        $data = array();
        if (!$file)
            return false;
        $tA = explode(',', $this->extension);
        if (!in_array($file['ext'], $tA))
            return false;
        $data = array();
        if ($file['ext'] == 'doc' || $file['ext'] == 'htm' || $file['ext'] == 'html' || $file['ext'] == 'docx') {
            if (!($data = $this->docToMht($file['path'],$file['basePath'],$file['filename']))) {
                return false;
            }
            $data = $this->_getDocData($data);
        }
        $query = $this->_checkedClumn($data);
        if (!$query)
            return false;
        return $data;
    }

    /**
     * 检查简历是否完整
     */
    private function _checkedClumn($data) {

        $query = false;
//         $requiredColun = array('name', 'tel', 'gender', 'birthday', 'education',
//         				'residence', 'work_year', 'email', 'household_register',
//                         'work_industry', 'work_address', 
//                         'work_postion'); //必须包含的字符串
        $requiredColun = array('name', 'tel', 'gender', 'birthday', 'education', 'residence', 'work_year', 'work_address', 'work_postion'); //必须包含的字符串

        if ($data) {
            foreach ($requiredColun as $v) {
                if (empty($data[$v])) {
                    return false;
                }
            }
        }

        return true;
    }
    
    
    
    /**
     * word转成mht
     * 
     * @return	boolean
     */
    public function docToMht($file,$path,$filename) {
        if (!file_exists($file))
            return false;
        try {
            $relPath = realpath($file);
            $basePath = realpath($path);
            $filename && $filename = explode('.', $filename);
            if ($filename) {
                $htmlName = '/' . $filename[0] . '.html';
            }
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $envPath = env('OFFICE_PATH');

                $cmd = "{$envPath}soffice.exe --convert-to html:HTML --outdir $dir $source";
            } else {
                $result = shell_exec('libreoffice --invisible --convert-to html ' . $relPath . ' --outdir ' . $basePath);
                if (!$result) {
                    return false;
                }
            }



            $text = file_get_contents($basePath . $htmlName);
            if (strpos($text, $this->encode('智联招聘') &&!strpos($text, $this->encode('智联卓聘')))) {
                $mode = 1; //智联招聘
                $str = strip_tags($text, "<b><p>");
                $str = preg_replace('/s/', '', $str);
                $str = str_replace('', '', $str);
                $str = str_replace("\r\n", "", $str);
                $str = str_replace("\n", "", $str);
                $str = str_replace("\t", "", $str);
                $str = str_replace("&nbp;", "", $str);
                $str = str_replace("</p>", "", $str);
                $str = explode('<p cla="monormal">', $str);
            } elseif (strpos($text, $this->encode('智联卓聘'))) {
                $mode = 2; //智联卓聘
                $str = strip_tags($text, "<b><p>");
                $str = preg_replace('/\n/is', '', $str);
                $str = preg_replace('/ |　/is', '', $str);
                $str = preg_replace('/&nbsp;/is', '', $str);
                $str = preg_replace("/style=.+?['|\"]/i", '', $str); //去除样式  
                $str = preg_replace("/class=.+?['|\"]/i", '', $str); //去除样式  
                $str = preg_replace("/id=.+?['|\"]/i", '', $str); //去除样式     
                $str = preg_replace("/lang=.+?['|\"]/i", '', $str); //去除样式      
                $str = preg_replace("/width=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/height=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/border=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/face=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/face=.+?['|\"]/", '', $str); //去除样式只允许小写正则匹配没有带 i 参数
                $pos = strpos($str, '&#31616;&#21382;ID');
                $str = substr($str, $pos);
                if ($pos = strpos($str, 'varhighLight=["java"]')) {
                    $len = strlen(substr($str, $pos));
                    $str = substr($str, 0, -$len);
                }
            } elseif (strpos($text, 'lietou-static.com')) {
                $mode = 3; //猎聘
                $str = strip_tags($text,"<b><p>");
                $str = preg_replace('/\n/is', '', $str);
                $str = preg_replace('/ |　/is', '', $str);
                $str = preg_replace('/&nbsp;/is', '', $str);
                $str = preg_replace("/style=.+?['|\"]/i", '', $str); //去除样式  
                $str = preg_replace("/class=.+?['|\"]/i", '', $str); //去除样式  
                $str = preg_replace("/id=.+?['|\"]/i", '', $str); //去除样式     
                $str = preg_replace("/lang=.+?['|\"]/i", '', $str); //去除样式      
                $str = preg_replace("/width=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/height=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/border=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/face=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/align=.+?['|\"]/", '', $str); 
                $str = explode('</p>', $str);
            } else {
//                $mode = ; //智联卓聘
                $str = strip_tags($text, "<b><p>");
                $str = preg_replace('/\n/is', '', $str);
                $str = preg_replace('/ |　/is', '', $str);
                $str = preg_replace('/&nbsp;/is', '', $str);
                $str = preg_replace("/style=.+?['|\"]/i", '', $str); //去除样式  
                $str = preg_replace("/class=.+?['|\"]/i", '', $str); //去除样式  
                $str = preg_replace("/id=.+?['|\"]/i", '', $str); //去除样式     
                $str = preg_replace("/lang=.+?['|\"]/i", '', $str); //去除样式      
                $str = preg_replace("/width=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/height=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/border=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/face=.+?['|\"]/i", '', $str); //去除样式   
                $str = preg_replace("/face=.+?['|\"]/", '', $str); //去除样式只允许小写正则匹配没有带 i 参数
                $pos = strpos($str, '&#31616;&#21382;ID');
                $str = substr($str, $pos);
                if ($pos = strpos($str, 'varhighLight=["java"]')) {
                    $len = strlen(substr($str, $pos));
                    $str = substr($str, 0, -$len);
                }
            }
            return array(
                'mode' => $mode,
                'text' => $str
            );
        } catch (Exception $e) {
            return false;
        }
        return false;
    }

    /**
     * 获取word类容
     */
    private function _getDocData($data) {
        $liepin_conifg = [
            '目前求职状态' => 'curStatus', // 目前求职状态
            '姓名：' => 'name',
            '性别：' => 'sex',
            '手机号码：' => 'telephone',
            '电子邮件：' => 'email',
            '教育程度：' => 'edu',
            '所在地：' => 'location',
            '所在行业：' => 'now_industry',
            '公司名称：' => 'curCompany',
            '目前年薪：' => 'curSalary',
            '期望行业：' => 'industry',
            '期望职位：' => 'expect_job_type_text',
            '期望地点：' => 'intentCity',
            '公司描述：' => 'companyDes',
            '汇报对象：' => 'report_to',
            '下属人数：' => 'underling_num',
            '所在地区：' => 'city_text',
            '所在部门：' => 'department',
            '工作职责和业绩：' => 'responsibility',
            '专业：' =>'majorName'
        ];

        $plix = $this->encode('：');
        
        $otherConfig = array(
            '工作经历',
            '项目经历',
            '项目经验',
            '教育经历',
            '在校学习情况',
            '在校实践经验',
            '所获奖项',
            '社会经验',
            '校内职务',
            '培训经历',
            '证书 ',
            '语言能力',
            '专业技能',
            '兴趣爱好',
            '自我评价',
            '其他信息',
            '附加信息',
            '附件',
            '技能特长',
            '语言/技能/证书',
            '其它信息',
        );
        
        $dbData = [];
        $dbJobData = [];
        $dbEduData = [];
        $dbLanguageData = [];
        
        //工作经历
//        var_dump($data['text']);
        
        foreach ($data['text'] as $k => $v) {
            $search = array(" ", " ", "    ", "\n", "\r", "\t", "\s", "&gt; ", "　　");
            $replace = array("", "", "", "", "", "", "", "", "");
            $text = trim(str_replace($search, $replace, $v));
            $text = strip_tags($text);
//            var_dump($text);
            if ($data['mode'] == 3) { //猎聘
                if ($pos = strpos($text, $this->encode('目前求职状态'))) {
                    $text = substr($text, $pos);
                    $text = explode($plix, $text);
                    $dbData[$liepin_conifg[$this->decode($text[0])]] = $this->decode($text[1]);
                } elseif (strpos($text, $this->encode('姓名：')) !== FALSE 
                        || strpos($text, $this->encode('教育程度：')) !== FALSE 
                        || strpos($text, $this->encode('所在行业：')) !== FALSE 
                        || strpos($text, $this->encode('公司名称：')) !== FALSE 
                        || strpos($text, $this->encode('期望行业：')) !== FALSE 
                        || strpos($text, $this->encode('期望职位：')) !== FALSE) {
                    $dbData[$liepin_conifg[$this->decode($text)]] = $this->decode(strip_tags($data['text'][$k + 1]));
                } elseif (strpos($text, $this->encode('性别：')) !== FALSE) {
                    $_sex = $this->decode(strip_tags($data['text'][$k + 1]));
                    $dbData[$liepin_conifg[$this->decode($text)]] = $_sex == '女' ? 2 : 1;
                } elseif (strpos($text, $this->encode('手机号码：')) !== FALSE || strpos($text, $this->encode('电子邮件：')) !== FALSE) {
                    $dbData[$liepin_conifg[$this->decode($text)]] = strip_tags(trim($data['text'][$k + 1]));
                } elseif (strpos($text, $this->encode('所在地：')) !== FALSE || strpos($text, $this->encode('期望地点：')) !== FALSE) {
                    $dbData[$liepin_conifg[$this->decode($text)]] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                } elseif (strpos($text, $this->encode('目前年薪：')) !== FALSE) {
                    if (is_numeric(strip_tags(trim($data['text'][$k + 1])))) {
                        $dbData[$liepin_conifg[$this->decode($text)]] = strip_tags(trim($data['text'][$k + 1]));
                    } else {
                        $dbData[$liepin_conifg[$this->decode($text)]] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }
                }

                //工作经历
                if (strpos($text, $this->encode('工作经历')) !== FALSE) {
                    $job_tag = 1;
                    continue;
                }

                if ($job_tag == 1) {
                    $a = explode('-', $text);
                    if (!is_array($text) && preg_match('/^\d{4}(\-|.)((0([1-9]))|(1(0|1|2)))$/', $a[0])) {
                        $job_id++;
                        $dbJobData[$job_id]['starttime'] = strpos($a[0], '.') !== FALSE ? strtotime(str_replace('.', '-', $a[0])) : strtotime($a[0]);
                        if (strpos($a[1], $this->encode('至今')) !== false) {
                            $dbJobData[$job_id]['endtime'] = -9999;
                        } else {
                            $dbJobData[$job_id]['endtime'] = strpos($a[1], '.') !== FALSE ? strtotime(str_replace('.', '-', $a[1])) : strtotime($a[1]);
                        }
                        $dbJobData[$job_id]['addtime'] = time();
                        $dbJobData[$job_id]['company'] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }

                    //profile1
                    if (!is_array($text) && strpos($text, $this->encode('公司性质：')) !== FALSE && strpos($text, $this->encode('公司规模：')) !== FALSE) {
                        $_profile = explode('|', $text);
                        foreach ($_profile as $_p) {
                            
                        }
                    }

                    if (!is_array($text) && strpos($text, $this->encode('公司描述：')) !== FALSE) {
                        $dbJobData[$job_id][$liepin_conifg['公司描述：']] = $this->decode(str_replace($this->encode('公司描述：'), '', $text));
                        $p_name = explode('</b>', trim($data['text'][$k + 1]));
                        $dbJobData[$job_id]['position']['position'] = $this->decode(strip_tags($p_name[0]));
                    }

                    if (!is_array($text) && (strpos($text, $this->encode('汇报对象：')) !== FALSE 
                            || strpos($text, $this->encode('所在地区：')) !== FALSE 
                            || strpos($text, $this->encode('汇报对象：')) !== FALSE
                            || strpos($text, $this->encode('下属人数：')) !== FALSE)) {
                        $_job_position = explode('|', $text);
                        foreach ($_job_position as $_jp) {
                            if (strpos($_jp, $this->encode('汇报对象：')) !== FALSE) {
                                $dbJobData[$job_id]['position'][$liepin_conifg['汇报对象：']] = $this->decode(str_replace($this->encode('汇报对象：'), '', $_jp));
                            } elseif (strpos($_jp, $this->encode('所在地区：')) !== FALSE) {
                                $dbJobData[$job_id]['position'][$liepin_conifg['所在地区：']] = $this->decode(str_replace($this->encode('所在地区：'), '', $_jp));
                            } elseif (strpos($_jp, $this->encode('所在部门：')) !== FALSE) {
                                $dbJobData[$job_id]['position'][$liepin_conifg['所在部门：']] = $this->decode(str_replace($this->encode('所在部门：'), '', $_jp));
                            } elseif (strpos($_jp, $this->encode('下属人数：')) !== FALSE) {
                                $dbJobData[$job_id]['position'][$liepin_conifg['下属人数：']] = $this->decode(str_replace($this->encode('下属人数：'), '', $_jp));
                            }
                        }
                    }
                    
                    if (!is_array($text) && strpos($text, $this->encode('工作职责和业绩：')) !== FALSE) {
//                        $dbJobData[$job_id]['position']['responsibility'] = 
                        
                        if($k == 73){
                            var_dump(strip_tags(trim($data['text'][$k + 1])));
                            exit;
                        }
                        var_dump($k);var_dump($this->decode(strip_tags(trim($data['text'][$k + 1])))) ;
                        
                    }
                }

                if (strpos($text, $this->encode('项目经历')) !== FALSE) {
                    $job_tag = 0;
                    $project_tag = 1;
                    continue;
                }

                if ($project_tag == 1) {
                    
                }

                if (!is_array($text) && strpos($text, $this->encode('教育经历')) !== FALSE) {
                    $project_tag = 0;
                    $edu_tag = 1;
                    continue;
                }

                if ($edu_tag == 1) {
                    //学校经历
                    $edu_id = 0;
                    if (!is_array($text) && !empty(strip_tags(trim($text)))) {
                        $a = preg_match('/\d{4}(\-|\/|.)\d{1,2}(\-|.)\d{4}(\-|\/|.)\d{1,2}/', $text, $match);
                        if ($a) {
                            $datae_match = explode($match[2], $match[0]);
                            $dbEduData[$edu_id]['starttime'] = strtotime(str_replace('.', '-', $datae_match[0]));
                            $dbEduData[$edu_id]['endtime'] = strtotime(str_replace('.', '-', $datae_match[1]));
                            $_school_name = str_replace($this->encode('（'), "", $text);
                            $_school_name = str_replace($this->encode('）'), "", $_school_name);
                            $_school_name = str_replace($match[0], "", $_school_name);
                            $dbEduData[$edu_id]['schoolName'] = $this->decode($_school_name);
                            
                        }
                    }
                    
                    if (!is_array($text) && strpos($text, $this->encode('专业：')) !== FALSE) {
                        $dbEduData[$edu_id]['majorName'] = $this->decode(str_replace($this->encode('专业：'), '', $text));
                    }

                    if (!is_array($text) && strpos($text, $this->encode('学历：')) !== FALSE) {
                        switch ($this->decode(str_replace($this->encode('学历：'), '', $text))) {
                            case '高中' : $_degree = 1;
                                break;
                            case '中专' : $_degree = 2;
                                break;
                            case '大专' : $_degree = 3;
                                break;
                            case '本科' : $_degree = 4;
                                break;
                            case '硕士' : $_degree = 5;
                                break;
                            case '博士' : $_degree = 6;
                                break;
                            case 'MBA/EMBA' : $_degree = 7;
                                break;
                            default : $_degree = 0;
                        }
                        $dbEduData[$edu_id]['degree'] = $_degree;
                    }

                    if (!is_array($text) && strpos($text, $this->encode('是否统招：')) !== FALSE) {
                        $dbEduData[$edu_id]['recruitment'] = $this->decode(str_replace($this->encode('是否统招：'), '', $text)) == '是' ? 1 : 0;
                    }
                    $edu_id++;
                }
                
                if (!is_array($text) && strpos($text, $this->encode('语言能力')) !== FALSE) {
                    $edu_tag = 0;
                    $language_tag = 1;
                    continue;
                }

                if ($language_tag == 1) {
                    if (!is_array($text) && !empty(strip_tags(trim($text))) && $this->encode('自我评价') === FALSE) {
                        $language_id = 0;
                        $_language = explode($this->encode('、'), strip_tags(trim($text)));
                        foreach ($_language as $_l) {
                            $dbLanguageData[$language_id]['language'] = $this->decode($_l);
                            $language_id++;
                        }
                    }
                }

                if (!is_array($text) && strpos($text, $this->encode('自我评价')) !== FALSE) {
                    $language_tag = 0;
                    $introduce_tag = 1;
                    continue;
                }
                
                if ($introduce_tag == 1) {
                    if (!is_array($text) && !empty(strip_tags(trim($text)))) {
                        $dbData['introduce'] = $this->decode(strip_tags(trim($text)));
                        $introduce_tag = 0;
                    }
                }
            }
        }


        var_dump($dbData);
        var_dump($dbJobData);
        var_dump($dbEduData);
        var_dump($dbLanguageData);
        exit;
    }

    function decode($str, $prefix = "&#") {
        $str = str_replace($prefix, "", $str);
        $a = explode(";", $str);
        foreach ($a as $dec) {
            if($dec == 0 || !$dec){
                continue;
            }
            
            if(!is_numeric($dec)){
                continue;
            }
            
            if($dec < 10){
                continue;
            }
//            var_dump($dec);exit;
            if ($dec < 128) {
                $utf .= chr($dec);
            } else if ($dec < 2048) {
                $utf .= chr(192 + (($dec - ($dec % 64)) / 64));
                $utf .= chr(128 + ($dec % 64));
            } else {
                $utf .= chr(224 + (($dec - ($dec % 4096)) / 4096));
                $utf .= chr(128 + ((($dec % 4096) - ($dec % 64)) / 64));
                $utf .= chr(128 + ($dec % 64));
            }
                        var_dump($dec);
            var_dump($utf.'|');
        }
//        return $utf;
    }

    
    
//      function decode($str, $prefix = "&#") {
//    $a = explode($prefix, $str);
//        foreach ($a as $dec) {
//            if(strpos($dec, ';') === FALSE){
//                $utf .= $dec;
//                continue;
//            }
//
//            $_dec = str_replace(';', '', $dec);
//            if ($_dec == 0 || !$_dec) {
//                $utf .= $dec;
//                continue;
//            }
//
//            if (!is_numeric($_dec)){
//                $utf .= $dec;
//                continue;
//            }
//            
//            if($_dec < 10){
//                $utf .= $dec;
//                continue;
//            }
//            
//            if ($_dec < 128) {
//                $utf .= chr($_dec);
//            } else if ($_dec < 2048) {
//                $utf .= chr(192 + (($_dec - ($_dec % 64)) / 64));
//                $utf .= chr(128 + ($_dec % 64));
//            } else {
//                $utf .= chr(224 + (($_dec - ($_dec % 4096)) / 4096));
//                $utf .= chr(128 + ((($_dec % 4096) - ($_dec % 64)) / 64));
//                $utf .= chr(128 + ($_dec % 64));
//            }
//            var_dump($_dec);
//            var_dump($utf.'|');
//        }
////        return $utf;
//    }
    
    
    /**
     * 将字符串转换为ascii码
     * @param type $c 要编码的字符串
     * @param type $prefix 前缀，默认：&#
     * @return string
     */
    function encode($c, $prefix = "&#") {
        $len = strlen($c);
        $a = 0;
        while ($a < $len) {
            $ud = 0;
            if (ord($c{$a}) >= 0 && ord($c{$a}) <= 127) {
                $ud = ord($c{$a});
                $a += 1;
            } else if (ord($c{$a}) >= 192 && ord($c{$a}) <= 223) {
                $ud = (ord($c{$a}) - 192) * 64 + (ord($c{$a + 1}) - 128);
                $a += 2;
            } else if (ord($c{$a}) >= 224 && ord($c{$a}) <= 239) {
                $ud = (ord($c{$a}) - 224) * 4096 + (ord($c{$a + 1}) - 128) * 64 + (ord($c{$a + 2}) - 128);
                $a += 3;
            } else if (ord($c{$a}) >= 240 && ord($c{$a}) <= 247) {
                $ud = (ord($c{$a}) - 240) * 262144 + (ord($c{$a + 1}) - 128) * 4096 + (ord($c{$a + 2}) - 128) * 64 + (ord($c{$a + 3}) - 128);
                $a += 4;
            } else if (ord($c{$a}) >= 248 && ord($c{$a}) <= 251) {
                $ud = (ord($c{$a}) - 248) * 16777216 + (ord($c{$a + 1}) - 128) * 262144 + (ord($c{$a + 2}) - 128) * 4096 + (ord($c{$a + 3}) - 128) * 64 + (ord($c{$a + 4}) - 128);
                $a += 5;
            } else if (ord($c{$a}) >= 252 && ord($c{$a}) <= 253) {
                $ud = (ord($c{$a}) - 252) * 1073741824 + (ord($c{$a + 1}) - 128) * 16777216 + (ord($c{$a + 2}) - 128) * 262144 + (ord($c{$a + 3}) - 128) * 4096 + (ord($c{$a + 4}) - 128) * 64 + (ord($c{$a + 5}) - 128);
                $a += 6;
            } else if (ord($c{$a}) >= 254 && ord($c{$a}) <= 255) { //error
                $ud = false;
            }
            $scill .= $prefix . $ud . ";";
        }
        return $scill;
    }

}
