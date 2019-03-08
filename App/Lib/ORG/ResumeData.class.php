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
            if (!($data = $this->docToMht($file['path'], $file['basePath'], $file['filename']))) {
                return false;
            }
            $data = $this->_getDocData($data);
        }
        return $data;
    }

    /**
     * word转成mht
     * 
     * @return	boolean
     */
    public function docToMht($file, $path, $filename) {
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
            if (strpos($text, $this->encode('智联招聘')) && !strpos($text, $this->encode('智联卓聘'))) {
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
            '所任职位：' => 'curPosition',
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
            '专业：' => 'majorName'
        ];

        $zlzp_config = [
            '期望工作地区：' => 'intentCity',
//            '期望月薪：' => ''
            '目前状况：' => 'curStatus',
//            '期望工作性质：' =>
            '期望从事职业：' => 'job_class',
            '期望从事行业：' => 'industry',
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
        $dbDataInfo = [];
        $dbJobData = [];
        $dbProjectData = [];
        $dbEduData = [];
        $dbLanguageData = [];

        foreach ($data['text'] as $k => $v) {
            $search = array(" ", " ", "    ", "\n", "\r", "\t", "\s", "&gt; ", "　　");
            $replace = array("", "", "", "", "", "", "", "", "");
            $text = trim(str_replace($search, $replace, $v));
            $text = strip_tags($text);
//            var_dump($text);
            if ($data['mode'] == 1) {//智联招聘
                $baseinfo_tag = 1;

                if ($baseinfo_tag == 1) {
                    if (strpos($text, $this->encode('更新时间：')) !== FALSE && (strpos($text, $this->encode('手机：')) !== FALSE || strpos($text, $this->encode('当前状态：')) !== FALSE)) {
                        //姓名 手机
                        preg_match('/\d{4}(\-|\/|\.)\d{1,2}(\-|\/|\.)\d{1,2}/', $text, $match);
                        $_text = explode($match[0], $text);
                        if (strpos($_text[1], $this->encode('手机：')) !== FALSE) {
                            $_info = explode($this->encode('手机：'), $_text[1]);
                            $dbData['name'] = $this->decode($_info[0]);
                            $dbData['telephone'] = $_info[1];
                        } elseif (strpos($_text[1], $this->encode('当前状态：')) !== FALSE) {
                            $_info = explode($this->encode('当前状态：'), $_text[1]);
                            $dbData['name'] = $this->decode($_info[0]);
                        }
                    }

                    if (strpos($text, $this->encode('年工作经验')) !== FALSE && strpos($text, $this->encode('岁')) !== FALSE) {
                        //性别 岁数 学历
                        $_text = explode($this->encode('年工作经验'), $text);
                        $dbData['edu'] = $this->decode($_text[1]);
                        $_info = explode(')', $_text[0]);
                        $dbData['startWorkyear'] = date('Y', time()) - $_info[1];
                        $_inf = explode($this->encode('岁'), $_info[0]);
                        $_birth = $_inf[1];
                        $_birth = str_replace($this->encode('月'), '', $_birth);
                        $_birth = str_replace('(', '', $_birth);
                        $_birth = explode($this->encode('年'), $_birth);

                        $dbData['birthYear'] = $_birth[0];
                        $dbData['birthMouth'] = $_birth[1];
                        $dbData['birthday'] = strtotime($_birth[0] . '-' . $_birth[1]);

                        if (strpos($_inf[0], $this->encode('男')) !== false) {
                            $dbData['sex'] = 1;
                        }

                        if (strpos($_inf[0], $this->encode('女')) !== false) {
                            $dbData['sex'] = 2;
                        }
                    }

                    if (strpos($text, $this->encode('现居住地：')) !== FALSE) {
                        $_city = explode('|', $text);
                        $dbData['location'] = $this->getCityCode($this->decode(str_replace($this->encode('现居住地：'), '', $_city[0])));
                    }

                    if (strpos($text, 'E-mail') !== FALSE) {
                        $_email = explode($this->encode('E-mail'), $text);
                        $dbData['email'] = str_replace($this->encode('：'), '', $_email[1]);
                    }
                }

                if ($text == $this->encode('求职意向')) {
                    $baseinfo_tag = 0;
                    $callInfo_tag = 1;
                    continue;
                }

                //求职意向
                if ($callInfo_tag == 1) {
                    if (strpos($text, $this->encode('期望工作地区：')) !== FALSE || strpos($text, $this->encode('目前状况：')) !== FALSE || strpos($text, $this->encode('期望从事职业：')) !== FALSE || strpos($text, $this->encode('期望从事行业：')) !== FALSE) {
                        $dbData[$zlzp_config[$this->decode($text)]] = $this->decode(strip_tags($data['text'][$k + 1]));
                    }
                }

                //自我评价
                if ($text == $this->encode('自我评价')) {
                    $callInfo_tag = 0;
                    $dbData['introduce'] = $dbDataInfo['evaluate'] = $this->decode(strip_tags($data['text'][$k + 1]));
                    continue;
                }

                //工作经历
                if ($text == $this->encode('工作经历')) {
                    $job_tag = 1;
                    continue;
                }

                if ($job_tag == 1) {
                    preg_match('/\d{4}(\-|\/|\.)\d{1,2}(\-|\.)/', $this->decode($text), $match);
                    preg_match('/\d{4}(\-|\/|\.)\d{1,2}(\-|\.)\d{4}(\-|\/|\.)\d{1,2}/', $text, $match_all);
                    $_tag = strpos($text, $this->encode('至今'));
                    if (($match[0] && $tag !== FALSE) || $match_all) {
                        $job_id++;
                        if (!empty($match_all)) {
                            $time = explode($match_all[2], $match_all[0]);
                            $dbJobData[$job_id]['starttime'] = strpos($time[0], '.') !== FALSE ? strtotime(str_replace('.', '-', $time[0])) : strtotime($time[0]);
                            $dbJobData[$job_id]['endtime'] = strpos($time[1], '.') !== FALSE ? strtotime(str_replace('.', '-', $time[1])) : strtotime($time[1]);
                            $_company_name = str_replace($match_all[0], '', $text);
                            $_company_name = explode('(', $_company_name);
                            $dbJobData[$job_id]['company'] = $this->decode($_company_name[0]);
                        } else {
                            $_starttime = str_replace($match[2], '', $match[0]);
                            $dbJobData[$job_id]['starttime'] = strpos($_starttime, '.') !== FALSE ? strtotime(str_replace('.', '-', $_starttime)) : strtotime($_starttime);
                            $dbJobData[$job_id]['endtime'] = -9999;
                            $_company_name = str_replace($match[0], '', $text);
                            $_company_name = str_replace($this->encode('至今'), '', $_company_name);
                            $_company_name = explode('(', $_company_name);
                            $dbJobData[$job_id]['company'] = $this->decode($_company_name[0]);
                        }

                        //职位
                        $job_po = explode('|', strip_tags(trim($data['text'][$k + 1])));
                        $dbJobData[$job_id]['jobPosition'] = $this->decode($job_po[0]);
                    }

                    //工作描述
                    if ($text == $this->encode('工作描述：')) {
                        $dbJobData[$job_id]['duty'] = $this->decode(strip_tags($data['text'][$k + 1]));
                    }
                }

                //项目经历
                if ($text == $this->encode('项目经历')) {
                    $job_tag = 0;
                    $project_tag = 1;
                    continue;
                }

                if ($project_tag == 1) {
                    preg_match('/\d{4}(\-|\/|\.)\d{1,2}(\-|\.)/', $this->decode($text), $match);
                    preg_match('/\d{4}(\-|\/|\.)\d{1,2}(\-|\.)\d{4}(\-|\/|\.)\d{1,2}/', $text, $match_all);
                    $_tag = strpos($text, $this->encode('至今'));
                    if (($match[0] && $tag !== FALSE) || $match_all) {
                        $project_id++;
                        if (!empty($match_all)) {
                            $time = explode($match_all[2], $match_all[0]);
                            $dbProjectData[$project_id]['starttime'] = strpos($time[0], '.') !== FALSE ? strtotime(str_replace('.', '-', $time[0])) : strtotime($time[0]);
                            $dbProjectData[$project_id]['endtime'] = strpos($time[1], '.') !== FALSE ? strtotime(str_replace('.', '-', $time[1])) : strtotime($time[1]);
                            $_project_name = str_replace($match_all[0], '', $text);
                            $_project_name = explode('(', $_project_name);
                            $dbProjectData[$project_id]['proName'] = $this->decode($_project_name[0]);
                        } else {
                            $_starttime = str_replace($match[2], '', $match[0]);
                            $dbProjectData[$project_id]['starttime'] = strpos($_starttime, '.') !== FALSE ? strtotime(str_replace('.', '-', $_starttime)) : strtotime($_starttime);
                            $dbProjectData[$project_id]['endtime'] = -9999;
                            $_project_name = str_replace($match[0], '', $text);
                            $_project_name = str_replace($this->encode('至今'), '', $_project_name);
                            $_project_name = explode('(', $_project_name);
                            $dbProjectData[$project_id]['proName'] = $this->decode($_project_name[0]);
                        }
                    }

                    //责任描述：
                    if ($text == $this->encode('责任描述：')) {
                        $dbProjectData[$project_id]['responsibility'] = $this->decode(strip_tags($data['text'][$k + 1]));
                    }

                    //项目描述：
                    if ($text == $this->encode('项目描述：')) {
                        $dbProjectData[$project_id]['proDes'] = $this->decode(strip_tags($data['text'][$k + 1]));
                    }
                }

                //教育经历
                if ($text == $this->encode('教育经历')) {
                    $project_tag = 0;
                    $edu_tag = 1;
                    continue;
                }

                if ($edu_tag == 1) {
                    preg_match('/\d{4}(\-|\/|\.)\d{1,2}(\-|\.)/', $this->decode($text), $match);
                    preg_match('/\d{4}(\-|\/|\.)\d{1,2}(\-|\.)\d{4}(\-|\/|\.)\d{1,2}/', $text, $match_all);
                    $_tag = strpos($text, $this->encode('至今'));
                    if (($match[0] && $tag !== FALSE) || $match_all) {
                        $edu_id++;
                        if (!empty($match_all)) {
                            $time = explode($match_all[2], $match_all[0]);
                            $dbEduData[$edu_id]['starttime'] = strpos($time[0], '.') !== FALSE ? strtotime(str_replace('.', '-', $time[0])) : strtotime($time[0]);
                            $dbEduData[$edu_id]['endtime'] = strpos($time[1], '.') !== FALSE ? strtotime(str_replace('.', '-', $time[1])) : strtotime($time[1]);
                            $_edu_name = str_replace($match_all[0], '', $text);
                            $_edu_name = explode('(', $_edu_name);
                            $dbEduData[$edu_id]['schoolName'] = $this->decode($_edu_name[0]);
                        } else {
                            $_starttime = str_replace($match[2], '', $match[0]);
                            $dbEduData[$edu_id]['starttime'] = strpos($_starttime, '.') !== FALSE ? strtotime(str_replace('.', '-', $_starttime)) : strtotime($_starttime);
                            $dbEduData[$edu_id]['endtime'] = -9999;
                            $_edu_name = str_replace($match[0], '', $text);
                            $_edu_name = str_replace($this->encode('至今'), '', $_edu_name);
                            $_edu_name = explode('(', $_edu_name);
                            $dbEduData[$edu_id]['schoolName'] = $this->decode($_edu_name[0]);
                        }
                    }
                }
            } elseif ($data['mode'] == 3) { //猎聘
                if ($pos = strpos($text, $this->encode('目前求职状态'))) {
                    $text = substr($text, $pos);
                    $text = explode($plix, $text);
                    $dbData[$liepin_conifg[$this->decode($text[0])]] = $this->decode($text[1]);
                } elseif (strpos($text, $this->encode('姓名：')) !== FALSE 
                        || strpos($text, $this->encode('教育程度：')) !== FALSE 
                        || strpos($text, $this->encode('所在行业：')) !== FALSE 
                        || strpos($text, $this->encode('公司名称：')) !== FALSE 
                        || strpos($text, $this->encode('期望行业：')) !== FALSE 
                        || strpos($text, $this->encode('期望职位：')) !== FALSE
                        || strpos($text, $this->encode('所任职位：')) !== FALSE) {
                    $dbData[$liepin_conifg[$this->decode($text)]] = $this->decode(strip_tags($data['text'][$k + 1]));
                } elseif (strpos($text, $this->encode('性别：')) !== FALSE) {
                    $_sex = $this->decode(strip_tags($data['text'][$k + 1]));
                    $dbData[$liepin_conifg[$this->decode($text)]] = $_sex == '女' ? 2 : 1;
                } elseif (strpos($text, $this->encode('年龄：')) !== FALSE) {
                    $_age = $this->decode(strip_tags($data['text'][$k + 1]));
                    $dbData['birthYear'] = date('Y', time()) - $_age;
                    $dbData['birthday'] = strtotime($dbData['birthYear']);
                } elseif (strpos($text, $this->encode('手机号码：')) !== FALSE || strpos($text, $this->encode('电子邮件：')) !== FALSE) {
                    $dbData[$liepin_conifg[$this->decode($text)]] = strip_tags(trim($data['text'][$k + 1]));
                } elseif (strpos($text, $this->encode('所在地：')) !== FALSE || strpos($text, $this->encode('期望地点：')) !== FALSE) {
                    $dbData[$liepin_conifg[$this->decode($text)]] = $this->getCityCode($this->decode(strip_tags(trim($data['text'][$k + 1]))));
                } elseif (strpos($text, $this->encode('目前年薪：')) !== FALSE) {
                    if (is_numeric(strip_tags(trim($data['text'][$k + 1])))) {
                        $dbData[$liepin_conifg[$this->decode($text)]] = strip_tags(trim($data['text'][$k + 1]));
                    } else {
                        $dbData[$liepin_conifg[$this->decode($text)]] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }
                }

                //工作经历
                if (strpos($text, $this->encode('工作经历')) !== FALSE && strpos($text, $this->encode('工作经历')) === 0) {
                    $job_tag = 1;
                    continue;
                }

                if ($job_tag == 1) {
                    $a = explode('-', $text);
                    if (!is_array($text) && preg_match('/^\d{4}(\-|\.)((0([1-9]))|(1(0|1|2)))$/', $a[0])) {
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

                    if (!is_array($text) && (strpos($text, $this->encode('汇报对象：')) !== FALSE || strpos($text, $this->encode('所在地区：')) !== FALSE || strpos($text, $this->encode('汇报对象：')) !== FALSE || strpos($text, $this->encode('下属人数：')) !== FALSE)) {
                        $_job_position = explode('|', $text);
                        foreach ($_job_position as $_jp) {
                            if (strpos($_jp, $this->encode('汇报对象：')) !== FALSE) {
                                $dbJobData[$job_id]['position'][$liepin_conifg['汇报对象：']] = $this->decode(str_replace($this->encode('汇报对象：'), '', $_jp));
                            } elseif (strpos($_jp, $this->encode('所在地区：')) !== FALSE) {
                                $dbJobData[$job_id]['position'][$liepin_conifg['所在地区：']] = $this->getCityCode($this->decode(str_replace($this->encode('所在地区：'), '', $_jp)));
                            } elseif (strpos($_jp, $this->encode('所在部门：')) !== FALSE) {
                                $dbJobData[$job_id]['position'][$liepin_conifg['所在部门：']] = $this->decode(str_replace($this->encode('所在部门：'), '', $_jp));
                            } elseif (strpos($_jp, $this->encode('下属人数：')) !== FALSE) {
                                $dbJobData[$job_id]['position'][$liepin_conifg['下属人数：']] = $this->decode(str_replace($this->encode('下属人数：'), '', $_jp));
                            }
                        }
                    }

                    if (!is_array($text) && strpos($text, $this->encode('工作职责和业绩：')) !== FALSE) {
                        $dbJobData[$job_id]['position']['responsibility'] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }
                }

                if (strpos($text, $this->encode('项目经历')) !== FALSE && strpos($text, $this->encode('项目经历')) === 0) {
                    $job_tag = 0;
                    $project_tag = 1;
                    continue;
                }

                if ($project_tag == 1) {
                    if (!is_array($text) && preg_match_all('/\d{4}(\-|\/|\.)\d{1,2}/', $text, $match)) {
                        $project_id++;
                        $dbProjectData[$project_id]['starttime'] = strpos($match[0][0], '.') !== FALSE ? strtotime(str_replace('.', '-', $match[0][0])) : strtotime($match[0][0]);
                        if (strpos($text, $this->encode('至今')) !== false) {
                            $dbProjectData[$project_id]['endtime'] = -9999;
                        } else {
                            $dbProjectData[$project_id]['endtime'] = strpos($match[0][1], '.') !== FALSE ? strtotime(str_replace('.', '-', $match[0][1])) : strtotime($match[0][1]);
                        }
                        $dbProjectData[$project_id]['proName'] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }

                    if (!is_array($text) && strpos($text, $this->encode('项目职务：')) !== FALSE) {
                        $dbProjectData[$project_id]['proOffice'] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }

                    if (!is_array($text) && strpos($text, $this->encode('所在公司：')) !== FALSE) {
                        $dbProjectData[$project_id]['proCompany'] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }
                    if (!is_array($text) && strpos($text, $this->encode('项目简介：')) !== FALSE) {
                        $dbProjectData[$project_id]['proDes'] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }
                    if (!is_array($text) && strpos($text, $this->encode('项目职责：')) !== FALSE) {
                        $dbProjectData[$project_id]['responsibility'] = $this->decode(strip_tags(trim($data['text'][$k + 1])));
                    }
                }

                if (!is_array($text) && strpos($text, $this->encode('教育经历')) !== FALSE && strpos($text, $this->encode('教育经历')) === 0) {
                    $project_tag = 0;
                    $edu_tag = 1;
                    continue;
                }

                if ($edu_tag == 1) {
                    //学校经历
                    if (!is_array($text) && !empty(strip_tags(trim($text)))) {
                        $a = preg_match('/\d{4}(\-|\/|\.)\d{1,2}(\-|\.)\d{4}(\-|\/|\.)\d{1,2}/', $text, $match);
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

                if (!is_array($text) && strpos($text, $this->encode('语言能力')) !== FALSE && strpos($text, $this->encode('语言能力')) === 0) {
                    $edu_tag = 0;
                    $language_tag = 1;
                    continue;
                }

                if ($language_tag == 1) {
                    if (!is_array($text) && !empty(strip_tags(trim($text))) && $this->encode('自我评价') === FALSE) {
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
                        $dbData['introduce'] = $dbDataInfo['evaluate'] = $this->decode(strip_tags(trim($text)));
                        $introduce_tag = 0;
                    }
                }
            }
        }
//        var_dump(['data' => $dbData, 'job' => $dbJobData, 'project' => $dbProjectData, 'edu' => $dbEduData, 'language' => $dbLanguageData]);
//        exit;
//        var_dump(['data' => $dbData, 'job' => $dbJobData ,'edu' => $dbEduData , 'language' => $dbLanguageData]);
        return ['data' => $dbData, 'info' => $dbDataInfo, 'job' => $dbJobData, 'project' => $dbProjectData, 'edu' => $dbEduData, 'language' => $dbLanguageData];
    }

    private function getCityCode($name = ''){
        if($name) $name = BaseUtils::getStr($name);
        $city_id = M('city')->where(['name' => $name])->field('city_id')->find();
        return $city_id['city_id'];
    }
            
    function decode($str, $prefix = "&#") {
        $a = explode($prefix, $str);
        foreach ($a as $dec) {
            if (strpos($dec, ';') === FALSE) {
                $utf .= $dec;
                continue;
            }

            $_decs = explode(';', $dec);
            if (!empty($_decs[1])) {
                $_dec = (int) trim($_decs[0]);
                $insert_tag = 1;
            } else {
                $_dec = (int) trim($_decs[0]);
            }

            if ($_dec == 0 || !$_dec) {
                $utf .= $dec;
                continue;
            }

            if (!is_numeric($_dec)) {
                $utf .= $dec;
                continue;
            }

            if ($_dec < 10) {
                $utf .= $dec;
                continue;
            }

            if ($_dec < 128) {
                $utf .= chr($_dec);
            } else if ($_dec < 2048) {
                $utf .= chr(192 + (($_dec - ($_dec % 64)) / 64));
                $utf .= chr(128 + ($_dec % 64));
            } else {
                $utf .= chr(224 + (($_dec - ($_dec % 4096)) / 4096));
                $utf .= chr(128 + ((($_dec % 4096) - ($_dec % 64)) / 64));
                $utf .= chr(128 + ($_dec % 64));
            }
            if ($insert_tag) {
                $utf .= $_decs[1];
            }
//            var_dump($_dec);
//            var_dump($utf.'|');
        }
        return trim($utf);
    }

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
