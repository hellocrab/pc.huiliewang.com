<?php
/* *
* $Author ：PHPYUN开发团队
*
* 官网: http://www.phpyun.com
*
* 版权所有 2009-2017 宿迁鑫潮信息技术有限公司，并保留所有权利。
*
* 软件声明：未经授权前提下，不得用于商业运营、二次开发以及任何形式的再次发布。
*/
class ParseAction extends Action
{
    //电话
    public  $template_tel = array(  "手机号", "手机号码","电话号码", "手机","固话","座机", "tel", "phone", "mobile", "telephone", "电话", "宿舍电话");
    //邮箱
    public $template_mail =  array("邮件", "邮箱", "邮箱号", "邮箱号码", "邮箱地址", "电子邮件", "电子邮箱", "e-mail", "email", "mail", "mailbox");
    //公司
    public $template_companyname = array("公司", "公司名称", "企业名称", "单位名称");
    //性别
    public $sex = array("男", "女");
    //学历
    public $template_education = array("最高学历", "教育程度", "学历", "学历层次", "学历等级");
    //学校
    public $template_school = array("毕业院校", "毕业学校", "学校", "学院", "教育经历");

    //具体学校
    public $template_college = array("大学", "学校", "院校", "技校", "学院");

    //出生日期
    public $template_birthday = array("出生年月", "出生日期");
    public $template_year = array("年龄");
    //所在地
    public $template_location = array("现居住地", "现居住城市", "所在地", "居住地", "地址", "目前所在地","所在城市");
    //期望行业
    public $template_trade  =   array("职业发展意向", "期望从事行业","期望行业","希望行业");
    public $template_name  =   array("姓名");
    //学历
    public $template_xueli = array("初中", "高中", "中技", "中专", "大专", "本科", "硕士","MBA/EMBA","博士", "博后");
    //期望工作地
    public $template_workadress = array("工作地点", "期望工作地区", "工作地区", "目标地点", "期望地点","期望地");
    //求职状态
    public $template_current  = array("目前状态", "目前状况", "目前职业概况", "求职状态", "目前求职状态");
    //当前职位
    public $template_work = array("职位", "目前职业", "当前职位", "所任职位");
    //期望职位
    public $template_work_cn = array("期望职业", "期望职位", "目标职能", "期望从事职业","期望从事职位");



    public $template_salary = array("期望薪资", "期望年资");
    public $arr_edu = array("14"=>"大专", "15"=>"本科","16"=>"硕士","205"=>"MBA","206"=>"EMBA","17"=>"博士","204"=>"博士后");

    public $template_company = array("有限责任公司", "股份有限公司","有限公司");
    public $template_companydes = array("公司描述");
    public $template_companyduty = array("工作职责和业绩","工作职责","工作描述");
    public $template_position = array("专员", "总监","经理","主管","分析师","经纪人","行长","柜员","厂长","工程师","医生","主任","助理","顾问","教授","教师","校长","部长","教练","公务员","干部","设计师","分析师","司机","业务员","管理员","实习生","研究员");

    //项目所在公司
    public $object_company = array("所在公司","所在单位","所在企业");

    //项目业绩
    public $object_yj = array("项目业绩");
    public $object_zw = array("项目职务");
    public $object_name = array("项目职务");
    //项目职责
    public $object_duty = array("项目职责");
    //项目描述
    public $object_des = array("项目描述","责任描述");
    public $department = array("所在部门");


    public $work_exp = array('startDateStr'=>'','endDateStr'=>'','edate'=>'','companyName'=>'','posName'=>'','content'=>'','companyDes'=>'','workDes'=>'','department'=>'');
    public $object_exp = array('subCompany'=>'','edate'=>'','startDateStr'=>'','endDateStr'=>'','proName'=>'','projectOffice'=>'','subCompany'=>'','projectPerfromnance'=>'','projectRole'=>'','content'=>'','proDes'=>'','proPerTip'=>'');

    public $edu_exp = array('content'=>'','edate'=>'','startDateStr'=>'','endDateStr'=>'','schoolName'=>'','majorName'=>'','degree'=>'');


//    public $object_duty = array("项目职责");

    public $base_content = array("name"=>"","sex"=>"","birthday"=>"","email"=>"","telphone"=>"","edu"=>"","exp"=>"","living"=>"","hy"=>"","job_classid"=>"","provinceid"=>"","wage_current"=>"","wage_hope"=>"","workExp"=>"","object_content"=>"","eduExps"=>"","content"=>"");

    /*
     * 简历上传
     */
    function index()
    {
        if($_FILES){
            $file = $_FILES['file'];
            $type =  end(explode('.', $file['name']));
            $path = $_SERVER['DOCUMENT_ROOT']."/Uploads/resume_file/".time().".".$type;
//            $upload_path_name1 = "/Uploads/resume_file/".time().".".$type;
//            $upload_path_name = $_SERVER['DOCUMENT_ROOT'].$upload_path_name1;

            $upload_path_name1 = "./Uploads/resume_file/".$file['name'];
            $_upload_path_name1 = iconv('utf-8','GBK',$upload_path_name1);
            $upload_path_name = $_SERVER['DOCUMENT_ROOT'].$_upload_path_name1;

            $complete_path = time().".".$type;
            if(move_uploaded_file($file['tmp_name'],$upload_path_name)){
//                $cv_file = $path;
//                $secret_key = "LR1snHUsXWzLHehzcZRbk9aENhZ0Nk0000047aff"; #您的secret_key
//
//                $data = $this->youyun_api($secret_key, $cv_file);
//                $data = json_decode($data,true);
//
//                echo $this->youyun_api($secret_key, $cv_file);exit();

                if($type=="doc" || $type=="docx"){
                    $url = "http://www.chuntianlaile.com/wordMht.php";
                    $path = "@".$path;
                    $post_data = array("file"=>$path);
                    $ch = curl_init();
                    curl_setopt($ch , CURLOPT_URL , $url);
                    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch , CURLOPT_POST, 1);
                    curl_setopt($ch , CURLOPT_POSTFIELDS, $post_data);
                    $output = curl_exec($ch);
                    curl_close($ch);
                    $output = json_decode($output,true);
                    $resume_url = $output['url'];
                    $content = str_replace("\r","",str_replace("?"," ",$output['str']));
                    $content = str_replace("\n\n","\n",str_replace("<br />","\n",$content));
                }elseif ($type=="html" || $type=="htm" || $type=="txt"){
                    $handle = fopen($_SERVER['DOCUMENT_ROOT']."/resume_file/".$complete_path, "rb");
                    $content = stream_get_contents($handle);
                    $resume_url = "";
                    $content = str_replace("&nbsp;","",strip_tags($this->remove_html($content)));
                    $encode = mb_detect_encoding($content, array('ASCII','UTF-8','GB2312','GBK','BIG5'));
                    $content = mb_convert_encoding($content, "UTF-8", $encode);
                }

                //上传的简历文件保存在session会话中
                $_SESSION['file_name'] = $file['name'];
                $_SESSION['file_size'] = intval(intval($file['size'])/1024);
                $_SESSION['upload_path'] = $upload_path_name1;
                echo '{"file_name":"'.$file['name'].'","file_size":"'.intval(intval($file['size'])/1024).'"}';
                $this->parse_action($content,$resume_url);
            }else{
                echo 2;
            }
            exit();
        }
        if($_POST['content']){
            $this->parse_action($_POST['content']);
        }
    }
//人才编辑模块的简历上传
    function index_add(){
        $eid = intval($_GET['eid']);
        if($_FILES){
            $file = $_FILES['file'];
            $type =  end(explode('.', $file['name']));
            $path = $_SERVER['DOCUMENT_ROOT']."/Uploads/resume_file/".time().".".$type;

            $upload_path_name1 = "/Uploads/resume_file/".$file['name'];
            $_upload_path_name1 = iconv('utf-8','GBK',$upload_path_name1);
            $upload_path_name = $_SERVER['DOCUMENT_ROOT'].$_upload_path_name1;
            if(move_uploaded_file($file['tmp_name'],$upload_path_name)){
                //保存简历上传的文件路径
                $data['eid'] = intval($eid);
                $data['file_name'] = $file['name'];
                $data['file_uptime'] = date('Y-m-d');
                $data['file_size'] = intval(intval($file['size'])/1024);
                $data['upload_path'] = $upload_path_name1;
                M('resume_ability')->add($data);
                echo 1;
            }else{
                echo 2;
            }
            exit();
        }
    }

    function closest_word($input, $words) {
        $shortest = -1;
        foreach ($words as $word) {
            $lev = levenshtein($input, $word);
            if ($lev == 0) {
                $closest = $word;
                $shortest = 0;
                break;
            }
            if ($lev <= $shortest || $shortest < 0) {
                $closest = $word;
                $shortest = $lev;
            }
        }
        return $closest;
    }



    function test(){
        $this->str = $_POST['str'];
        $this->display();
        if($this->isPost()){
            $str = $_POST['str'];
            $this->parse_action($str);
        }
    }



    public function job51(){
//        header("Content-type: text/html; charset=utf-8");
//        echo str_replace("|","",$this->replaceAll("职　位："));exit();
//        if($this->strpos_line($this->template_work_cn,"")){
//            echo 3;exit();
//        }else{
//            echo 4;exit();
//        }
//        header("Content-type: text/html; charset=utf-8");
//        include APP_PATH."Common/job.cache.php";
//        echo $this->closest_word("技术部经理",$job_name);exit();
//        echo str_replace("|","",$this->replaceAll("行　业"));exit();
        $str = "人力资源总监候选人程女士推荐报告
推荐评价
1、有近15年丰富的人力资源管理经验，了解并熟悉掌握业务，成为企业核心经营、管理层的一部分，了解并参与基本的业务活动；
2、掌握人力资源，确保基本的HR管理和实践相互协调，有多年的的中高端招聘经验及团队管理；
3、性格乐观、思想活跃、有首创革新精神，上进心强，个性稳重，具高度责任感，具有较强的执行力，并具极丰富的人际关系技巧。
一、基本信息

姓    名：程女士
性    别：女
年    龄：37
工作年限：14年
期望地：北京
现所在地：北京
最高学历：本科
婚姻状况：已婚
目前薪资：保密
期望薪资：面议

二、教育经历

时间 
毕业院校
专业
学历
1999.09 - 2003.07
天津大学
工业外贸
本科

工作经历

时间:2012年11月-至今
公司：琳玛(上海)贸易有限公司 

岗位：招聘总监、hrd
汇报对象：CEO | 下属人数：10 | 所在地区：北京 | 所在部门：人力资源部
工作职责和业绩：	1、全面负责公司所有岗位的招聘工作，并根据现有编制及业务发展需求，协调、统计各部门的招聘需求，编制年度人员招聘计划；  
2、开发、维护、评估、分析各招聘渠道，并充分利用招聘相关数据进行有效分析招聘进度及相关招聘难点；
1、根据公司发展战略，全面统筹规划公司的人力资源战略；
2、根据公司的业务发展目标，制定人力资源规划，采取多种方式拓展人员招聘渠道，规范招聘流程，并参与对关键岗位应聘人员的面试筛选；
3、根据业务发展需要，通过挖掘、分析培训需求，制定并组织实施员工培训计划，组织技能考核鉴定，监督培训效果评估，合理控制培训费用；
4、根据公司的业务导向，制定绩效考核管理制度，落实考核指标并监督执行，统计考评结果，管理考评文件，做好考评后的绩效改进、沟通及不合格员工的辞退；
5、跟踪业界薪酬水平，结合国家福利政策，制定激励性的薪酬福利制度及方案；
6、根据公司战略与历史发展，结合行业特点，塑造、维护、发展和传播积极进取的企业文化；
7、依据公司的用人规定，负责员工劳动合同的签订和管理工作；
8、负责部门人员的队伍建设，选拔、培训、考核本部门员工负责组织制定人力资源整体战略规划和组织规划；
9、负责企业负责工作分析、岗位说明书与定岗定编工作，提出机构设置和岗位职责设计方案，对公司组织结构设计提出改进方案等；
10、根据公司战略搭建完善公司内部员工沟通体系，多渠道确保沟通渠道顺畅有效；
11、建立企业内宣机制，通过组织内部管理问题诊断，产出方案并推动改进，推动组织健康发展；
12、各种类型的企业文化沟通工作，运用新载体，对内/外进行传播；
13、进行内部舆情监控及反馈、员工沟通与反馈运营、专题策划等；
14、支持和配合团队企业文化活动工作的宣传、实施等；
15、处理员工离职引发的各种纠纷及后续事宜，与公司法律顾问进行有效沟通与联系，并与政府机关建立有效联系等。
招聘总监：
1、全面负责公司所有岗位的招聘工作，并根据现有编制及业务发展需求，协调、统计各部门的招聘需求，编制年度人员招聘计划；
2、开发、维护、评估、分析各招聘渠道，并充分利用招聘相关数据进行有效分析招聘进度及相关招聘难点；
3、建立和完善公司的招聘流程和招聘体系；
4、利用各种招聘渠道发布招聘广告，寻求招聘机构；
5、执行招聘、甄选、面试、选择、安置工作；
6、.进行聘前测试和简历甄别工作；
7、建立后备人才选拔方案和人才储备机制。

时间:2009年12月-2012年11月
公司：辉彩贸易有限公司

岗位：人力资源总监
汇报对象：总经理 | 下属人数：10 | 所在地区：广州 | 所在部门：总经办
工作职责和业绩：
1、全面统筹规划公司人力资源开发和战略管理，拟定公司人力资源规划方案，并监督和推进各项计划的实施；参与公司战略和组织变革，根据公司发展的不同阶段，设计和规划公司人力资源战略，从而进一步完善和提高公司人力资源管理机制和体系； 
2、制定公司人力资源方针政策和各项规章制度；根据公司战略发展的需要，组织制定公司人力资源发展的长期、中期规划和年度计划，并监督各项计划的实施；致力于提高整体综合管理水平，控制人力资源成本； 
3、完善公司人力资源招聘管理制度，制定招聘计划并组织实施，配合各部门用人需求，合理安排人力资源，及时补充紧缺岗位；组织猎聘优秀管理团队，实施人才发展储备计划，指导员工职业生涯规划；制定员工培训计划，定期检查培训实施情况，打造优秀的培训师队伍； 
4、拟订人力资源成本预算，监督控制预算的执行；定期向总经理提供有关人力资源战略、组织建设、行政管理等方面的专项建议，并致力于提高公司综合管理水平； 
5、参与制定公司绩效考核管理方案，提高公司组织管理绩效水平；建立适合本公司的薪酬体系，使公司薪酬对内体现公平公正和激励，对外体现竞争力； 拟定（制定）公司福利政策，办理社会保障福利；制订和完善各项人事管理制度，并贯彻实施，尤其应确保考评奖惩制度，薪酬制度积极有效，充分发挥激励员工， 优胜劣汰的作用； 
6、建立内部信任、畅通的沟通渠道，构建和维护良好的员工关系体系；实施员工关怀，促进员工发展，推动和传播公司理念和企业文化；及时处理公司管理过程中的重大人力资源问题； 
7、塑造、维护、发展和传播优秀的企业文化；通过人力资源的文化认同，形成企业的凝聚力及核心竞争力积极建立和培育企业文化，组织各项内部宣传和集体活动，提高员工的自豪感， 与企业长期发展的使命感，激发员工更好地工作； 
8、负责公司管理模式执行情况的检查工作，汇总各部门的反馈意见，整理分析后向总经理汇报，掌握行政系统工作情况和公司行政管理工作的运作情况，适时向总经理汇报；
9、负责接待重要来宾或客户，组织员工活动；负责指导各部门完成所定的行政工作目标。
时间:2003年1月-2009年12月
公司：广州利海集团有限公司  

岗位：人事专员、人事行政经理、人事行政总监
汇报对象：总裁 | 下属人数：60 | 所在地区：广州 | 所在部门：人力行政中心
工作职责和业绩：	
1、参与制定企业重大战略目标和战略规划制订及经营计划、方针、策略的确定；
2、对企业经营过程中发生的一切重大事项及时向总裁办反映，并提出建议，当好总裁办的参谋与助手；
3、协助总裁办追踪、查催各部门应办事项；
4、协助总裁办核实各类报表及签署各类合同；
5、协调各部门内部的关系，并作好与其他部门间的沟通工作，建立健全公司统一、高效的组织体系和工作体系；
6、组织安排好总裁办会议，做好会议记录并检查各项决议、决定的贯彻执行情况，及时了解和反馈信息；
7、负责全面主持公司人力行政运营管理工作。监督执行公司领导层决议的各项规程、工作指令的义务管理责任，并享有对公司人力行政工作的指导、协调、监督、管理的权力，监控、统筹管理外地项目人力行政工作；
8、负责公司人力行政规章制度建设、各部门管理制度汇总、工作流程设立、编制公司项目管理手册、员工手册、贯标认证管理手册及相关程序文件；拟定部门工作计划、工作责任状及部门员工个人责任状、工作指导与督促；负责公司重要人力行政发文的起草、公司会议纪要的起草、办公例会的召开及解决问题汇总；负责公司人才招聘、面试、员工培训、薪酬评定、绩效考核、企业岗位职责权系说明书；负责公司印章证照的保管和使用、相关技术人员挂靠证件工作等建筑行业资质办理；建立固定资产帐册等用于行政后勤生活服务的财产帐册；负责公司后勤保障（保卫、食堂、车辆等）管理工作；负责公司建立档案管理工作；处理公司劳动关系仲裁；公司重要职位离任审计；协助贯标管理者代表有效运作实施；其它上级领导安排的工作事宜。

项目经历
2012.11 - 至今人力资源管理
项目职务：	招聘总监、高级人力资源经理
所在公司：	琳玛(上海)贸易有限公司
项目简介：	负责招聘模块的管理工作以及其它人资模块的日常管理工作。每年的招聘量约在1200人左右，其中含临时员工、兼职、在校实习生、低端岗位，办公室基础职员及主管经理级员工，以及亲自负责重点中高端岗位和分公司及区域总监级别等。开发各种招聘渠道（重点招聘网站如三大网站、LINKED、台湾104，香港JOBDB、BOSS直聘、MONSTER亚太区招聘网站、专业网站如：上海广告门、成都及重庆地区网站、昆明第三代理方等；招聘模式则采用过品牌集体领导小组面试，召开大型的公司招聘会进行现场模拟演练等）及筛选优质猎头服务。
项目职责：	负责管理其它模块工作。如员工关系方面，在离职员工方面做到了再次聘用或转换聘用。（重新考核进行其它品牌或是对于优秀的提离职员工进行沟通协调可重新竞聘其它岗位等）在离职赔偿方面为一年为公司节省了几十万的赔偿等。绩效考核带领团队与其它部门共同梳理了考核指标及目标，并按此进行执行考核。组织全体员工共同倡导企业文化，开展各项有关的活动。组织参加每年六叶草的公益活动，组织落实企业每年的国内国外旅游等。
";

        $this->parse_action($str);
    }

    public function zhilian(){
        $str = "简历名称：
长沙/房地产/商管/招商/运营/前策/总经理/总监/10年以上
智联招聘
期望从事职业：
房地产开发/经纪/中介

简历更新时间：
2018.04.26

ID：q1ikZlOh9nCJzURtWeE7rg                                                                       
周湉笑 


男     38岁 (1980年7月)     14年工作经验     本科     已婚 
现居住地：长沙 | 户口：长沙 | 群众 

手机：15111066388
E-mail：53752930@qq.com 

求职意向                                                               
期望工作地区：
长沙,重庆
期望月薪：
15000-25000元/月
目前状况：
我目前处于离职状态，可立即上岗
期望工作性质：
全职
期望从事职业：
房地产开发/经纪/中介
期望从事行业：房地产/建筑/建材/工程
自我评价                                                               
诚信 务实 自信 上进 
工作经历                                                               
2017.04 - 2018.02   湖南富兴集团有限公司   (11个月) 
商管公司总经理 | 15000-25000元/月 
房地产/建筑/建材/工程 | 企业性质：民营 | 规模：1000-9999人 
工作描述：
负责富兴地产长沙商管公司富兴嘉城、富兴旺角和富兴福城等三个项目的前期业态规划、业态定位、文件资料制定以及项目招商和后期运营等工作，总体商业面积约为10万平米，涵盖超市、影院、餐饮、健身、教育、休闲主要业态。汇报对象为 1.长沙地方公司董事长 2.集团商管中心
2013.04 - 2017.03   湖南长海投资置业控股集团有限公司   (4年) 
招商总监 | 15000-25000元/月 
房地产/建筑/建材/工程 | 企业性质：民营 | 规模：500-999人 
工作描述：
新长海集团是一家大型房地产开发企业，公司现有商业部分主要是按照经开区规划，与中茂城、金科一起打造星沙的城市CBD，项目共分三期共计60万方的商业体量，目前已进入二期建设完毕，三期筹备阶段。在此公司工作期间，一方面严谨计划、严格执行、精细管理、优越控制，各方面能力得到显著提高，另一方面，积极学习、勇于拼搏，多次取得了超越计划的业绩指标。主要职责主要是：1.对现现有招商区域作出年度和月度的招商任务计划和分配，并带领团队按计划完成招商任务 ；2.对建设中的项目作出业态定位规划并通过总裁审核，并对招商节点重点安排，重点跟进主力商业，并协助团队成员进行意向客户的储备 ；3.对已正常运营的商家的日常经营作出监督和协调，保障租金收缴率。目前的工作业绩主要表现在两个方面1.独立完成了三大主力店的招商即火宫殿（2310㎡）徐记海鲜（2630㎡）和KTV(2200㎡) 并因此获得公司“优秀员工”称号 ；2.协助团队成员完成包括网咖、中型社区超市、时尚餐饮等其它配套商户的招商。3.运营管理过程中客户关系处理得当，客户矛盾在调和中得到化解，风险控制牢固，租金收缴任务及时完成。汇报对象为分管商业运营的集团副总裁。
2009.04 - 2013.04   湖南步步高商业连锁股份有限公司   (4年 1个月) 
招商运营经理 | 6001-8000元/月 
零售/批发 | 企业性质：上市公司 | 规模：1000-9999人 
工作描述：
在公司百货事业部，一直从事百货处长工作。主要职责为营运管理和招商，具体如下：1.门店新张前的品牌落位规划及经营调整规划的制定2.根据公司整体要求制定所辖区域合同预算3.品牌招商洽谈及营业后的促销活动谈判4.营业员管理，日常营运管理，技能技巧的培训5.促销活动的开展，货品、陈列等等相关跟进步步高集团是一家在零售业全面发展的上市公司，在步步高工作的四年里，正是步步高由传统百货向大型购物中心转型的时刻。主要工作任务和业绩主要表现在：按照公司需要，完成了百货耒阳店、株洲店和长沙开元店的业态调整，并对在经营商户进行日常管理和协调，对销售业绩负责；最后一年半时间在长沙金星路店负责开店，主管百货五楼男装男鞋包和运动休闲类别，参与业态规划、品牌落位、品牌谈判等各项开业前准备工作，开业后，带领楼层主管，与团队一起负责所辖楼层的招商和运营情况，负责经营品牌的调整等。在工作过程中，所管辖的每一个门店品类，业绩水平均得到大幅的提升，占店业绩比例在原有基础上均提升5%以上，汇报对象为门店总经理。
2005.07 - 2009.03   长沙通程控股股份有限公司   (3年 9个月) 
招商运营经理 | 4001-6000元/月 
零售/批发 | 企业性质：上市公司 | 规模：1000-9999人 
工作描述：
在公司百货事业部，主要负责通程百货星沙店的日常运营、招商调整工作以及客户和供应商关系处理工作并对销售业绩负责，汇报对象为门店总经理。主要职责为营运管理和招商，具体如下：1.主要对门店 运动休闲区 的业绩负责2.促销活动3.营运管理
项目经历                                                              
2017.01 - 2018.02 富兴嘉城/富兴旺角/富兴福城 
责任描述：
富兴福城的商业规划、落位、市场调查等 富兴旺角的招商节点制定、团队建设、招商工作等 富兴嘉城的招商调整、运营推广、租金收缴等
项目描述：
总体体量为10万平方的街区型商业。 

教育经历                                                              
2015.09 - 2017.09   湖南大学   工商管理   本科 
2000.09 - 2003.07   长沙教育学院   汉语言文学   大专 
语言能力                                                               
英语： 读写能力良好 | 听说能力良好 

";
        $this->parse_action($str);
    }

    public function exp(){
        header("Content-type: text/html; charset=utf-8");

        $str = "目前求职状态：在职，看看新机会 ， 随时可以打电话联系我。
	
主动应聘职位： 无 
简历编号信息： 2fe827f1Vb3c03626
简历更新时间： 2018-03-10 01:07:14 
/
	
个人信息 

姓名： 
孙璐 
性别： 
男 
/
手机号码：
17620994215 
年龄： 
24

电子邮件：
luke_sun@foxmail.com
教育程度： 
硕士 

工作年限： 
1 年以上 
婚姻状况： 
保密 

所在地： 
广州-天河区 





目前职业概况： 
所在行业： 
基金/证券/期货/投资 
公司名称： 
广发证券股份有限公司 
所任职位： 
投资银行业务 
目前年薪： 
保密 

职业发展意向： 
期望行业： 
基金/证券/期货/投资 
期望职位： 
投资银行业务;PE/VC投资;资产管理 
期望地点： 
北京;上海;深圳 
期望年薪： 
勿推企业： 
面议 
广发证券股份有限公司 复星 

工作经历 

2017.08-2018.02 
广发证券股份有限公司 

公司性质：国内上市公司 | 公司规模： 2000-5000人 | 公司行业：基金/证券/期货/投资 
公司描述：广发证券成立于1991年9月8日，是国内首批综合类证券公司。2010年2月12日，公司在深圳证券交易所成功上市，股票代码：000776.sz；2013年公司再度被评为A类AA级证券公司，位列目前行业最高评级。公司营业网点遍布全国各主要经济区域。截至2013年12月31日，公司现有证券营业部238个，数量位列全国第二。自1994年开始，公司主要经营指标已连续19年稳居国内十大券商行列。 　　公司旗下拥有五家全资子公司，分别是广发期货有限公司、广发控股（香港）有限公司、广发信德投资管理有限公司、广发乾和投资有限公司和广发证券资产管理（广东）有限公司，并持股广东金融高新区股权交易中心有限公司、广发基金管理有限公司和易方达基金管理有限公司，间接全资持有广发金融交易（英国）有限公司（伦敦金属交易所LME第一类交易会员），形成了以证券业务为核心、业务跨越境内外的金融控股集团架构。截至2013年12月31日，公司注册资本59.19亿元，合并报表资产总额1173.49亿元，归属于母公司股东的所有者权益346.50亿元；2013年合并报表实现营业收入82.07亿元，实现利润总额34.77亿元，实现归属于母公司股东的净利润为28.13亿元。资本实力及盈利能力在国内证券行业持续领先，总市值居国内上市证券公司前列。 　 公司被誉为资本市场上的“博士军团”，以人为本的管理理念，专业的人才团队，支撑了公司的持续发展。“知识图强、求实奉献”是公司的核心理念，“稳健经营、规范管理”是公司的经营原则。公司高度重视健全内部管理体制，完善风险防范机制，初步形成了具有自身特色的合规管理体系，经受住了多次市场重大变化的考验。 　　公司成长过程中，通过自身积累发展和多次市场化收购兼并行动，规模不断壮大，主要经营指标多年名列行业前茅，是中国市场最具影响力的证券公司之一。公司将不断努力，追求卓越，向实现中国领先、亚太一流的证券金融集团的战略目标迈进！... 

投资银行业务实习生 1300元/月 


所在地区：广州-白云区 | 所在部门：投资银行部 

工作职责和业绩： 
- 参与海纳生物IPO项目，在项目现场进行尽职调查，完成发行人行业及业务分析、重要财务指标核算、关联方调查、供销数据及资料处理、专利商标核查、董监高和股东无违规调查等工作，协助同事完成招股说明书、反馈回复材料和半年度报告- 参与广州长隆私募债项目受托管理，完成半年度报告初稿，主要包括发行人概况，重要财务指标计算及更新，业务概况等部分，协同同事与发行人进行交流沟通，完成数据核对及终稿的修改- 参与某IPO项目，进行内部控制调查，主要包括面向穿行测试和银行流水核对，同时完成相关部分底稿整理
2016.10-2017.04 
上海复星高科技(集团)有限公司 

公司性质：国内上市公司 | 公司规模： 500-999人 | 公司行业：基金/证券/期货/投资 
公司描述：上海复星高科技（集团）有限公司始建于1992年，是中国最大的综合类民营企业。2007年7月16日，复星集团在香港联交所主板整体成功上市（00656.HK）。目前，复星主要拥有医药、房地产开发、钢铁、矿业、零售、服务业及战略投资业务，总资产近千亿，各产业在相关行业内均处于领先地位。 复星扎根中国，投资于中国成长的根本动力，主要业务均长期受益于中国巨大的人口带来的消费需求、投资需求，持续的城市化、服务全球的制造业带来的持续增长等中国动力。 经过近18年的成长，复星凭借持续发现和把握中国投资机会的能力，持续优化管理提升企业价值的能力和持续建设多渠道融资体系对接优质资本的能力，形成了以认同复星文化的企业家团队为核心，以上述三大核心能力为基础的价值创造链的正向循环。2009年，复星国际实现净利润46.5亿元人民币。 目前，复星已稳居中国企业前100强，并连续四年名列中国民营企业纳税总额首位。位列福布斯全球2000强第1391位、中国企业500强净利润第81位、中国企业集团纳税500强第37位。 复星集团亦获得“CRF2010杰出雇主”。... 

私募股权投资实习研究员 10800元/月 


所在地区：新加坡 | 所在部门：东南亚投资部 

工作职责和业绩： 
- 参与OneChampionship（体育IP）B轮投资项目，对目标公司进行实际探查，访谈公司高管及相关行业从业人员（签约运动员、体育场馆、电视台从业人员、咨询顾问等），并观摩现场赛事和组织过程，整理相关记录- 参与aCommerce（电商服务商）项目的前期尽调，独立完成投资价值分析报告初稿，包括主营业务分析、团队及员工分析、财务数据整合、相关市场桌面研究、主要客户与合作伙伴等部分- 辅助参于CXA（互联网员工福利和保险平台）项目B轮融资，分析投资项目财务数据、相关市场背景、竞争者及基于中国市场的前景预测，修改校正估值数据，为目标公司的估值和投资决策提供支持- 多次参与立项会，预审会，投决会，参与投决材料、月度投资报告和相关会议纪要的书写，提高了团队工作效率
2016.04-2016.06 
北京鑫智联信息技术有限公司 

公司性质：私营·民营企业 | 公司规模： 50-99人 | 公司行业：专业服务(咨询/财会/法律/翻译等) 
公司描述：北京鑫智联信息技术公司是以管理咨询、IT咨询、电商实施、软件开发、外包服务等业务为核心的咨询服务公司。 -核心团队全部来自于全球顶尖的咨询公司、世界500强企业，核心顾问均有超过20年的管理、技术咨询经验，服务过的客户包括各大央企、国企、私营企业等。 -目前客户主要集中在通讯、制造、金融、能源等行业。 -公司位于北京，项目分布在北京、上海、广州、深圳等各大城市。 期待您的加入... 

咨询顾问助理 


所在地区：深圳 | 所在部门：管理咨询项目组 

工作职责和业绩： 
- 研究阿里巴巴、京东、苏宁等电商平台的发展趋势及支付方式及金融的演变趋势，完成桌面研究报告，对传音公司电商和电子支付建设提出可行性建议- 研究并归纳总结当下手机厂商的主流销售模式，并结合非洲国家背景进行可行性分析和落地实施建议，完成该部分的咨询建议报告初稿- 研究并归纳总结肯尼亚、尼日利亚及南非的支付及金融现状，为其他咨询顾问提供支持 
2015.07-2015.09 
方正证券股份有限公司 

公司性质：国有企业 | 公司规模： 10000人以上 | 公司行业：基金/证券/期货/投资 
公司描述：方正证券股份有限公司（以下简称“方正证券”或“公司”）是中国首批综合类证券公司，上海证券交易所、深圳证券交易所首批会员，于2010年改制为股份有限公司，并于2011年在上海证券交易所上市（股票代码：601901）。 公司目前已设立投行、期货、直投、合资基金、另类投资、香港金控等六家子公司，并持有盛京银行股份有限公司5.17%的股权。2014年8月，公司完成对中国民族证券有限责任公司的收购，民族证券成为方正证券的第七家子公司，公司总股本扩增至82.32亿股。 通过多年积累，方正证券及其子公司取得了多项业务资格，范围涵盖：证券经纪、期货经纪、投资银行、证券自营、资产管理、研究咨询、IB业务、QFII业务、融资融券、直投业务、证券投资基金业务、场外市场业务、质押式报价回购业务、代销金融产品业务、受托管理保险资金业务、私募基金托管业务、新三板做市业务、收益凭证业务、OTC业务、私募客户资产托管业务、互联网证券业务试点及证监会核准的其他业务。 方正证券致力于为高端机构投资者及有理财、投资与增值服务需求的客户搭建全方位、多层次的金融服务体系，并凭借深厚的产品研发实力、卓越的市场服务水平及广泛的业务渠道，拥有了业内领先的综合金融服务终端。 配合公司五大业务板块、多项业务发展需要，公司设立了辐射全国的财富管理中心和电子商务平台、电话理财中心，重要渠道已覆盖国内大型投资基金、金融机构、知名企业投资者和海外大型QFII等。公司现拥有证券营业部295家，区域分公司10家，期货营业部26家，分布在全国28个省（市、自治区）的重要中心城市。 在证券行业创新发展的大背景下，公司倡导卓越领先的金融服务理念，以“通道与非通道并重、散户与机构并重、大力发展资本中介业务、内涵与外延增长并重；推进公司各项业务均衡发展，良性互动，全面发展高端与机构业务”为基本战略，致力于成为行业领先的大型综合类证券公司。... 

实习研究员 


所在地区：深圳 | 所在部门：证券研究所 

工作职责和业绩： 
- 对新三板分层及转板制度进行预测分析，并参与书写两篇相关研究报告，完成其中关于归纳纳斯达克市场发展历史及制度特点、台湾兴柜市场制度特点、新三板与两者对比及展望部分的书写- 收集并整理新三板及挂牌股票，编辑书写日报、周报和月报，并在微信平台和核心客户群发布 

项目经历 

2017.08–2017.12 
海纳生物IPO项目 

项目职务： 
投行项目实习生 

所在公司： 
广发证券股份有限公司 

项目简介：
广东海纳川生物科技股份有限公司是利用现代生物技术解决动物健康问题的高新技术企业，围绕食品安全和健康养殖提供综合解决方案。公司研发、生产、销售安全、绿色、高效的生物饲料及药物饲料添加剂产品。该项目旨在帮助海纳生物在创业板挂牌上市。 

项目职责：
在项目现场进行尽职调查，完成发行人行业及业务分析、重要财务指标核算、关联方调查、供销数据及资料处理、专利商标核查、董监高和股东无违规调查等工作 

项目业绩：
- 独立完成海纳生物2017半年度报告初稿，并协助同事完成后续修改- 协助同事完成招股说明书、反馈回复材料及相关底稿的整理 
2016.10–2016.12 
OneChampionship（体育IP）B轮投资项目 

项目职务： 
私募股权投资实习研究员 

所在公司： 
上海复星高科技(集团)有限公司 

项目简介：
ONE Championship是亚洲的综合格斗赛事组织，目前是全亚洲最有潜力的体育赛事IP，赛事已做到国际化，播出范围遍布全世界118个国家。本次B轮融资旨在将ONE Championship引入战略投资者，已实现其业务更深更广的发展 

项目职责：
执行项目尽调，协助同事完成投资分析报告及其他上会材料，支持项目组完成该项目 

项目业绩：
- 对目标公司进行实际探查，访谈公司高管及相关行业从业人员（签约运动员、体育场馆、电视台从业人员、咨询顾问等），并完成相关访谈纪要- 并观摩现场赛事和组织过程，结合其他渠道公开信息，分析对比国内市场及竞品- 协助同事完成投资分析报告及其他上会材料 

教育经历 

新加坡国立大学 （ 2016.08-2017.09 ） 
专业：金融数学 
学历：硕士 
是否统招：是 
	
中山大学 （ 2012.09-2016.06 ） 
专业：金融学 
学历：本科 
是否统招：是 

语言能力 

英语(CET6、读写精通)、普通话 

自我评价 

- 学习能力强，乐于接受挑战。对TMT、金融行业充满兴趣，对新兴行业能怀着好奇心学习，对行业热点有一定的了解和判断。- 有较强的研究分析能力，在私募股权投资，投行、咨询和行研都做过实习，因此对财务分析，金融模型和股权投资知识有一定的掌握；- 为人友善，善于交际，能很好地融入团队。性情温和，广交朋友，不论是与在学校同学，社团朋友，还是实习同事，都建立了良好的关系；- 金融、理工科复合背景，有较强的数理能力；- 形象气质较好，有礼仪工作经验和舞台表演经验。 

附加信息 

- 多次荣获获得中山大学校级、院级奖学金；- 荣获金斧子杯全国首届新三板价值分析大赛冠军。 

";
        $data = $this->parse_action($str);
        var_dump($data);exit();

    }


    function parse_action($str="",$url){
        header("Content-type: text/html; charset=utf-8");
        if($_POST['content']){
            $str = $_POST['content'];
        }
        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";

        $recity_name = array_flip($city_name);
        $rejob_name = array_flip($job_name);
        $reindustry_name = array_flip($industry_name);
        $char1 = substr_count($str,"|");
        $char2 = substr_count($str,"?");

        preg_match("/([a-z0-9\-_\.]+@[a-z0-9]+\.[a-z0-9\-_\.]+)+/i",$str,$email);
        if($email){
            $this->base_content['email'] =   $email[0];
        }

        $arr = explode("\n",$str);
        $str_n = str_replace("年",".",$str);
        $str_n = str_replace("月","",$str_n);
        $preg = "/19\d{2}(\/|.)\d{1,2}/";
        preg_match_all($preg,$str_n,$result);

//        if($result){
//            $birthday = $this->replaceAll($result[0][0]);
//            $birthday = str_replace("|","-",$birthday);
//            if(strtotime($birthday)){
//                $this->base_content['birthday'] = $birthday;
//            }
//        }


        foreach ($arr as $key=>$list){
            if($this->myTrim($list)){
                if($this->strpos_line($this->template_name,str_replace("|","",$this->replaceAll($list))) && empty($this->base_content['name'])){
                    $li = str_replace("|","",$this->replaceAll($list));
                    if(in_array($li,$this->template_name)){
                        $this->base_content['name'] = $arr[$key+1];
                    }else{
                        $lis = array_values(array_filter(explode("|",$this->replaceAll($list))));

                        $this->base_content['name'] = $this->son_parse($lis,$this->template_name);
                    }
                }

                if(empty($this->base_content['name'])){
                    if($this->isChineseName(str_replace("|","",$this->replaceAll($list)))){
                        $this->base_content['name'] =str_replace("|","",$this->replaceAll($list));
                    }
                }


                if($this->strpos_line($this->template_year,str_replace("|","",$this->replaceAll($list))) && empty($this->base_content['birthday'])){

                    $li = str_replace("|","",$this->replaceAll($list));
                    if(in_array($li,$this->template_year)){
                        $this->base_content['birthday'] = (date("Y")-$this->findNum($arr[$key+1]))."-01";
                    }else{
                        $lis = array_values(array_filter(explode("|",$this->replaceAll($list))));

                        $birthday = $this->son_parse($lis,$this->template_year);
                        $this->base_content['birthday'] = (date("Y")-$this->findNum($birthday))."-01";
//                        $this->base_content['birthday'] = (date("Y")-$this->findNum($this->remove_line($list,$this->template_year)))."-01";
                    }

                }

                if(strpos($this->myTrim($list),"岁") !== false && empty($this->base_content['birthday'])){
                    $li = explode("岁",$this->myTrim($list));
                    if($li[0]){
                        $birthday = substr($li[0],-3);
                        $birthday = $this->findNum($birthday);
                        $this->base_content['birthday'] = (date("Y")-$birthday)."-01";
                    }
                }

                if(strpos($this->myTrim($list),"性别") !== false && empty($this->base_content['sex'])){

                    $li = $this->split_line($this->myTrim($list),"性别");
                    $this->base_content['sex'] = $li[1];
                }

                if($this->strpos_line($this->sex,$this->myTrim($list)) && empty($this->base_content['sex'])){
                    $li = $this->split_line($list,$this->sex);
                    if(strlen($li[0])<4){
                        $this->base_content['sex'] = $li[0];
                    }
                }


                if($this->strpos_line($this->template_tel,$this->myTrim($list)) && empty($this->base_content['telphone'])){
                    $li = $this->split_line($list,$this->template_tel);
                    if($this->isTel($li[1])){
                        $this->base_content['telphone'] = $li[1];
                    }

                }


                if($this->strpos_line($this->template_education,str_replace("|","",$this->replaceAll($list))) && empty($this->base_content['edu'])){
                    $li = str_replace("|","",$this->replaceAll($list));
                    if(in_array($li,$this->template_education)){
                        $this->base_content['edu'] = $this->myTrim($arr[$key+1]);
                    }else{
                        $this->base_content['edu'] = $this->closest_word($this->remove_line($list,$this->template_education),$this->template_xueli);
                    }
                }

                if($this->strpos_line($this->arr_edu,$this->myTrim($list)) && empty($this->base_content['edu'])){
                    $li = $this->split_line($list,$this->arr_edu);
                    $this->base_content['edu'] = $li[0];

                }

//                if(strpos($this->myTrim($list),"工作年限") !== false && empty($this->base_content['exp'])){
//                    $li = $this->split_line($list,"工作年限");
//                    $this->base_content['exp'] = $this->findNum($li[1])?$this->findNum($li[1]):$this->chrtonum($li[1]);
////                    $this->base_content['exp'] = $this->chrtonum($li[1]);
//                }


//                if(strpos($this->myTrim($list),"工作经验") !== false && empty($this->base_content['exp'])){
//                    $li = $this->split_line($list,"工作经验");
//                    $this->base_content['exp'] = $li[0];
//                }


                if($this->strpos_line($this->template_location,$this->replaceAll($list)) && empty($this->base_content['living'])){
                    $li = str_replace("|","",$this->replaceAll($list));
                    if(in_array($li,$this->template_location)){
                        $this->base_content['living_name'] = $arr[$key+1];
                        $this->base_content['living'] = $recity_name[$this->closest_word($arr[$key+1],$city_name)];
                    }else{
                        $list = explode("|",$this->replaceAll($list));
                        $this->base_content['living'] = $recity_name[$list[1]];
//                        $li = $this->remove_line($list[1],$this->template_location);
//                        $this->base_content['living_name'] = $li;
//                        $this->replaceAll($li);
//                        $this->base_content['living'] = $recity_name[$this->closest_word($li,$city_name)];
                    }

                }



                if($this->strpos_line($this->template_trade,str_replace("|","",$this->replaceAll($list))) && empty($this->base_content['hy'])){
                    $li = str_replace("|","",$this->replaceOther($list));

                    if(in_array($li,$this->template_trade)){

                        $li = $arr[$key+1];
                    }else{

                        $lis = array_values(array_filter(explode("|",$this->replaceOther($list))));
                        $li = $this->son_parse($lis,$this->template_trade);
//                        $li = $this->remove_line($list,$this->template_trade);
                    }

                    $li = array_filter(explode("|",$this->replaceOther($li)));
                    $hope_hy = "";
                    foreach ($li as $l){
                        $hope_hy[] = $reindustry_name[$this->closest_word($l,$industry_name)];
                    }

                    $this->base_content['hy'] =implode(",",$hope_hy);
                }


                if($this->strpos_line($this->template_work_cn,str_replace("|","",$this->replaceAll($list))) && empty($this->base_content['job_classid'])){

                    $li = str_replace("|","",$this->replaceOther($list));
                    if(in_array($li,$this->template_work_cn)){
                        $li = $arr[$key+1];
                    }else{
                        $li = $this->remove_line($list,$this->template_work_cn);
                    }

                    $li = array_filter(explode("|",$this->replaceOther($li)));

                    $hope_job = "";
                    foreach ($li as $l){
                        $hope_job[] = $rejob_name[$this->closest_word($l,$job_name)];
                    }
                    $this->base_content['job_classid'] =implode(",",$hope_job);
                }


                if($this->strpos_line($this->template_workadress,$this->replaceAll($list)) && empty($this->base_content['provinceid'])){
                    $li = str_replace("|","",$this->replaceAll($list));
                    if(in_array($li,$this->template_workadress)){
                        $this->base_content['provinceid_name'] = $arr[$key+1];
                        $li = $arr[$key+1];
                    }else{
                        $li = $this->remove_line($list,$this->template_workadress);
                        $this->base_content['provinceid_name'] = $li;
                    }
                    $li = array_filter(explode("|",$this->replaceAll($li)));
                    $hope_city = "";
                    foreach ($li as $l){
                        $hope_city[] = $recity_name[$this->closest_word($l,$city_name)];
                    }
                    $this->base_content['provinceid'] =implode(",",$hope_city);
                }

//                if($this->strpos_line($this->template_salary,$this->myTrim($list)) && empty($this->base_content['wage_hope'])){
//                    $li = $this->split_line($list,$this->template_salary);
//                    preg_match_all('/\d+/',$li[1],$arr);
//                    $this->base_content['wage_hope'] = $arr[0][0];
//                }
//
//                if(strpos($this->myTrim($list),"目前年薪") !== false && empty($this->base_content['wage_current'])){
//                    $li = $this->split_line($list,"目前年薪");
//                    preg_match_all('/\d+/',$li[1],$arr);
//                    $this->base_content['wage_current'] = $arr[0][0];
//                }
//                $base_content[] = $list;
            }
        }

        if(empty($this->base_content['telphone'])){
            preg_match_all("/1[34578]\d{9}/",$str,$mobiles);
            $this->base_content['telphone'] = $mobiles[0][0];
        }

        $str = str_replace("年工作经验","年工作年限",$str);
        $str = str_replace("工 作 经 验","工作经验",$str);
        $str = str_replace("教 育 经 历","教育经验",$str);
        $str = str_replace("项 目 经 历","项目经验",$str);
        $str = str_replace("培 训 经 历","培训经验",$str);
        $str = str_replace("\r","\n",$str);
        if(strpos($str,"\n工作经验")){
            $work_offest = strpos($str,"\n工作经验");
        }elseif(strpos($str,"\n工作经历")){
            $work_offest = strpos($str,"\n工作经历");
        }else{
            $work_offest = strlen($str);
        }

        if(strpos($str,"项目经验")){
            $object_offest = strpos($str,"项目经验");
        }elseif(strpos($str,"项目经历")){
            $object_offest = strpos($str,"项目经历");
        }else{
            $object_offest = strlen($str);
        }

        if(strpos($str,"教育经验")){
            $edu_offest = strpos($str,"教育经验");
        }elseif(strpos($str,"教育经历")){
            $edu_offest = strpos($str,"教育经历");
        }else{
            $edu_offest = strlen($str);
        }


        $txt_content['object'] = $object_offest;
        $txt_content['edu'] = $edu_offest;
        $txt_content['work'] = $work_offest;
        sort($txt_content);
        $work_content = $this->work_parse($work_offest,$txt_content,$str);
        $edu_content = $this->edu_parse($edu_offest,$txt_content,$str);
        $object_content = $this->object_parse($object_offest,$txt_content,$str);


        $this->base_content['workExp'] = $work_content;
        $this->base_content['eduExps'] = $edu_content;
        $this->base_content['proExp'] = $object_content;
        $this->base_content['content'] = $str;
        $this->base_content['url'] = $url;
//        var_dump($this->base_content);exit();
        $base_content = $this->base_content;
        $this->add_action($base_content);

        return $base_content;
        echo json_encode($base_content,JSON_UNESCAPED_UNICODE);exit();
//        return $base_content;
//
//
//
//        var_dump($object_content);exit();

    }

    function add_action($arr){

        $data['name'] = $arr['name'];
        $data['telephone'] = $arr['telphone'];
        $data['birthday'] = strtotime($arr['birthday']);
        $data['email'] = $arr['email'];
        $data['edu'] = $arr['edu'];
        $data['living'] = $arr['living'];
        $data['industry'] = $arr['hy'];
        $data['job_class'] = $arr['job_classid'];
        $data['intentCity'] = $arr['provinceid'];
        $data['curSalary'] = $arr['wage_current'];
        $data['wantSalary'] = $arr['wage_hope'];
        $data['curCompany'] = $arr['current_company'];
        $data['curPosition'] = $arr['current_job'];
        if($arr['sex']=="男"){
            $data['sex'] = 1;
        }else{
            $data['sex'] = 2;
        }
        if($data['telephone']){
            $result = M("resume")->where("telephone=%d",$data['telephone'])->find();
            if($result){
                $this->ajaxReturn(1,'该手机号已存在',0);exit();
            }
        }

        $result = M("resume")->add($data);
        if($result){
            if($arr['workExp']){
                foreach ($arr['workExp'] as $list){
                    $data = "";
                    $data['starttime'] = strtotime($list['startDateStr']);
                    $data['endtime'] = strtotime($list['endDateStr']);
                    $data['company'] = $list['companyName'];
                    $data['jobPosition'] = $list['posName'];
                    $data['depart'] = $list['department'];
                    $data['duty'] = $list['workDuty'];
                    $data['companyDes'] = $list['companyDes'];
                    $data['eid'] = $result;
                    M("resume_work")->add($data);
                }
            }

            if($arr['eduExps']){
                foreach ($arr['eduExps'] as $list){
                    $data = "";
                    $data['starttime'] = strtotime($list['startDateStr']);
                    $data['endtime'] = strtotime($list['endDateStr']);
                    $data['schoolName'] = $list['schoolName'];
                    $data['majorName'] = $list['majorName'];
                    $data['degree'] = $list['degree'];
                    $data['eid'] = $result;
                    M("resume_edu")->add($data);
                }
            }

            if($arr['proExp']){
                foreach ($arr['proExp'] as $list){
                    $data = "";
                    $data['starttime'] = strtotime($list['startDateStr']);
                    $data['endtime'] = strtotime($list['endDateStr']);
                    $data['proName'] = $list['proName'];
                    $data['proOffice'] = $list['projectOffice'];
                    $data['proDes'] = $list['objectDuty'];
                    $data['proCompany'] = $list['objectCompany'];
                    $data['eid'] = $result;
                    M("resume_project")->add($data);
                }
            }

        }
    }


    //公司解析
    function work_parse($work_offest,$txt_content,$str){

        if($work_offest==$txt_content[0]){
            $length = $txt_content[1]-$txt_content[0];
        }elseif ($work_offest==$txt_content[1]){
            $length = $txt_content[2]-$txt_content[1];
        }elseif ($work_offest==$txt_content[2]){
            $length = "";
        }
        if($length){
            $work_str = substr($str,$work_offest,$length);
        }else{
            $work_str = substr($str,$work_offest);
        }
        $work_str = str_replace("- -","-",$work_str);
        $work_str = str_replace("–","-",$work_str);
        $work_str = str_replace(" - ","-",$work_str);
        $work_str = str_replace("工作经历","",$work_str);
        $work_str = str_replace("工作经验","",$work_str);


        $work_str = str_replace("年",".",$work_str);
        $work_str = str_replace("月","",$work_str);
        $work_arr = $work_str;
        $work_arrs = "";
        $preg = "/\d{4}(\/|.)\d{1,2}-/";
        $preg1 = "/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/";
        preg_match_all($preg,$work_str,$work_var);

        if($work_var[0]){
            foreach ($work_var[0] as $key=>$li){

                $arr = explode($li,$work_arr);

                $work_arr = $li.$arr[1];
                if(strlen($arr[0])>20){
                    $work_arrs[] = $arr[0];
                }
                if(($key+1)==count($work_var[0])){
                    if(strlen($work_arr)>20){
                        $work_arrs[] =$work_arr;
                    }
                }
            }
        }

        $work_content = "";

        foreach ($work_arrs as $key=>$list){
//            var_dump($list);exit();
            $work_content[$key] = $this->work_exp;
            if(preg_match("/\d{4}(\/|.)\d{1,2}-/",$list)){

                if(preg_match("/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/",$list)){
                    preg_match_all($preg1,$list,$time_stage);
                    $work_content[$key]['edate'] = $time_stage[0][0];
                    $edate = explode("-",$work_content[$key]['edate']);
                    $work_content[$key]['startDateStr'] =$edate[0];
                    $work_content[$key]['endDateStr'] =$edate[1];

                }else{
                    preg_match_all($preg,$list,$time_stage);
                    $work_content[$key]['edate'] = $time_stage[0][0].date("Y.m");
                    $edate = explode("-",$work_content[$key]['edate']);
                    $work_content[$key]['startDateStr'] =$edate[0];
                    $work_content[$key]['endDateStr'] =$edate[1];

                }

            }


            $lists = array_values(array_filter(explode("\n",$list)));
            foreach ($lists as $k=>$li){
                if($this->strpos_line($this->template_company,str_replace("|","",$this->replaceAll($li))) && empty($work_content[$key]['companyName'])){
                    $lis = array_filter(explode("|",$this->replaceAll($li)));
                    foreach ($lis as $l){
                        if($this->strpos_line($this->template_company,str_replace("|","",$this->replaceAll($l)))){
                            $work_content[$key]['companyName'] = $l;
                        }
                    }
                }

                if(empty($work_content[$key]['companyName']) && $work_content[$key]['endDateStr']){
                    $comname = explode($work_content[$key]['endDateStr'],$li);
                    $proName = $this->trim_arr(str_replace("：","",$comname[1]));
                    if($proName[0]){
                        $work_content[$key]['companyName'] =$proName[0];
                    }else{
                        $work_content[$key]['companyName'] =$lists[$k+1];
                    }
                }

                if($this->strpos_line($this->department,str_replace("|","",$this->replaceAll($li))) && empty($work_content[$key]['department'])){
                    $lis = array_values(array_filter(explode("|",$this->replaceAll($li))));
                    $work_content[$key]['department'] = $this->son_parse($lis,$this->department);
                }


                if($this->strpos_line($this->template_position,$this->myTrim($li)) && strlen($this->myTrim($li))<50 && empty($work_content[$key]['posName'])){
                    $lis = array_values(array_filter(explode("|",$this->replaceAll($li))));
                    foreach ($lis as $l){
                        if($this->strpos_line($this->template_position,str_replace("|","",$this->replaceAll($l)))){
                            $work_content[$key]['posName'] =$l;
                        }
                    }
                }

                if($this->strpos_line($this->template_companyduty,$this->myTrim($li)) && empty($work_content[$key]['workDuty'])){

                    if(in_array(str_replace("|","",$this->replaceAll($li)),$this->template_companyduty)){
                        $work_content[$key]['workDuty'] = $lists[$k+1];
                    }else{
                        $work_content[$key]['workDuty'] = $this->remove_line($this->myTrim($li),$this->template_companyduty);
                    }
                }

                if($this->strpos_line($this->template_companydes,$this->myTrim($li))  && empty($work_content[$key]['workDes'])){
                    if(in_array($this->myTrim($li),$this->template_companydes)){
                        $work_content[$key]['workDes'] = $lists[$k+1];
                    }else{
                        $work_content[$key]['workDes'] = $this->remove_line($this->myTrim($li),$this->template_companydes);
                    }
                }
            }

            if(empty($work_content[$key]['edate'])){
                $work_content[$key] = "";
            }else{
                $startDateStr = $this->replaceAll($work_content[$key]['startDateStr']);
                $work_content[$key]['startDateStr'] = str_replace("|","-",$startDateStr);
                $endDateStr = $this->replaceAll($work_content[$key]['endDateStr']);
                $work_content[$key]['endDateStr'] = str_replace("|","-",$endDateStr);
            }

        }
//        var_dump($work_content);exit();
        $work_content = array_values(array_filter($work_content));
        $this->base_content['current_company'] = $work_content[0]['companyName'];
        $this->base_content['current_job'] = $work_content[0]['posName'];
        return array_filter($work_content);
    }


    function work_parses($work_str){

        $work_str = str_replace("- -","-",$work_str);
        $work_str = str_replace("–","-",$work_str);
        $work_str = str_replace(" - ","-",$work_str);
        $work_str = str_replace("工作经历","",$work_str);
        $work_str = str_replace("工作经验","",$work_str);


        $work_str = str_replace("年",".",$work_str);
        $work_str = str_replace("月","",$work_str);
        $work_arr = $work_str;
        $work_arrs = "";
        $preg = "/\d{4}(\/|.)\d{1,2}-/";
        $preg1 = "/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/";
        preg_match_all($preg,$work_str,$work_var);

        if($work_var[0]){
            foreach ($work_var[0] as $key=>$li){

                $arr = explode($li,$work_arr);

                $work_arr = $li.$arr[1];
                $work_arrs[] = $arr[0];
                if(($key+1)==count($work_var[0])){
                    $work_arrs[] =$work_arr;
                }
            }
        }

        $work_content = "";
        foreach ($work_arrs as $key=>$list){
//            var_dump($list);exit();
            $work_content[$key] = $this->work_exp;

            if(strpos($this->myTrim($list),"工作描述")){
                $li = explode("工作描述",$this->myTrim($list));
                $work_content[$key]['workDes'] = $li[1];
            }else{
                $work_content[$key]['workDes'] = str_replace("|","",$list);
            }

            if(preg_match("/\d{4}(\/|.)\d{1,2}-/",$list)){

                if(preg_match("/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/",$list)){
                    preg_match_all($preg1,$list,$time_stage);
                    $work_content[$key]['edate'] = $time_stage[0][0];
                    $edate = explode("-",$work_content[$key]['edate']);
                    $work_content[$key]['startDateStr'] =$edate[0];
                    $work_content[$key]['endDateStr'] =$edate[1];

                }else{
                    preg_match_all($preg,$list,$time_stage);
                    $work_content[$key]['edate'] = $time_stage[0][0].date("Y.m");
                    $edate = explode("-",$work_content[$key]['edate']);
                    $work_content[$key]['startDateStr'] =$edate[0];
                    $work_content[$key]['endDateStr'] =$edate[1];

                }
            }


            if((strpos($this->myTrim($list),"有限责任公司") || strpos($this->myTrim($list),"股份有限公司")|| strpos($this->myTrim($list),"有限公司"))){
//                echo $list;exit();
                $lists = array_filter(explode("|",$this->replaceAll($list)));

                foreach ($lists as $li){
                    if((strpos($this->myTrim($li),"有限责任公司") || strpos($this->myTrim($li),"股份有限公司") || strpos($this->myTrim($li),"有限公司")) && empty($work_content[$key]['companyName'])){
                        $work_content[$key]['companyName'] = $li;
                    }
                }

            }

            if(empty($work_content[$key]['companyName']) && $work_content[$key]['endDateStr']){
                $comname = explode($work_content[$key]['endDateStr'],$list);
                $proName = $this->trim_arr(str_replace("：","",$comname[1]));
                $work_content[$key]['companyName'] =$proName[0];
            }



            if($this->strpos_line($this->template_position,$this->myTrim($list))){
                $lists = array_filter(explode("|",$this->replaceAll($list)));
                $posName = "";
                foreach ($lists as $li){
                    if($this->strpos_line($this->template_position,$this->myTrim($li)) && empty($posName)){

                        $jobname =$this->trim_arr($li);
                        $work_content[$key]['posName'] = $jobname[0];
//                        $work_content[$key]['posName'] = $li;
                        $posName = $li;
                        $position = strpos($list,$posName);
                        $surplus = substr($list,$position);
//                        echo $surplus;exit();
                    }
                }
            }


            if($work_content[$key]['posName'] && empty($work_content[$key]['describe'])){
                $describe = explode($work_content[$key]['posName'],$list);
                $work_content[$key]['workDes'] = $describe[1];
            }

            if(empty($work_content[$key]['edate'])){
                $work_content[$key] = "";
            }else{
                $startDateStr = $this->replaceAll($work_content[$key]['startDateStr']);
                $work_content[$key]['startDateStr'] = str_replace("|","-",$startDateStr);
                $endDateStr = $this->replaceAll($work_content[$key]['endDateStr']);
                $work_content[$key]['endDateStr'] = str_replace("|","-",$endDateStr);
            }

        }

        return array_filter($work_content);
    }


    //教育解析
    function edu_parse($edu_offest,$txt_content,$str){
        if($edu_offest==$txt_content[0]){
            $length = $txt_content[1]-$txt_content[0];
        }elseif ($edu_offest==$txt_content[1]){
            $length = $txt_content[2]-$txt_content[1];
        }elseif ($edu_offest==$txt_content[2]){
            $length = "";
        }

        if($length){
            $edu_str = substr($str,$edu_offest,$length);
        }else{
            $edu_str = substr($str,$edu_offest);
        }

        if(strpos($edu_str,"培训经验")){
            $edu_str = explode("培训经验",$edu_str);
            $edu_str = $edu_str[0];
        }elseif(strpos($edu_str,"培训经历")){
            $edu_str = explode("培训经历",$edu_str);
            $edu_str = $edu_str[0];
        }

        $edu_str = str_replace("- -","-",$edu_str);
        $edu_str = str_replace("–","-",$edu_str);
        $edu_str = str_replace(" - ","-",$edu_str);
        $edu_str = str_replace("--","-",$edu_str);
        $edu_str = str_replace("教育经历","",$edu_str);
        $edu_str = str_replace("教育经验","",$edu_str);

        $edu_str = str_replace("年",".",$edu_str);
        $edu_str = str_replace("月","",$edu_str);
        $edu_arr = $edu_str;
        $edu_arrs = "";
        $preg = "/\d{4}(\/|.)\d{1,2}-/";
        $preg1 = "/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/";
        preg_match_all($preg,$edu_str,$edu_var);

        if($edu_var[0]){
            foreach ($edu_var[0] as $key=>$li){
                $arr = explode($li,$edu_arr);
                $edu_arr = $li.$arr[1];
                $edu_arrs[] = $arr[0];
                if(($key+1)==count($edu_var[0])){
                    $edu_arrs[] =$edu_arr;
                }
            }
        }


        $edu_content = "";
        foreach ($edu_arrs as $key=>$list){
            $edu_content[$key] = $this->edu_exp;
//            $edu_content[$key]['content'] = str_replace("|","",$list);
            if(preg_match("/\d{4}(\/|.)\d{1,2}-/",$list)){
                if(preg_match("/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/",$list)){
                    preg_match_all($preg1,$list,$time_stage);
                    $edu_content[$key]['edate'] = $time_stage[0][0];
                    $edate = explode("-",$edu_content[$key]['edate']);
                    $edu_content[$key]['startDateStr'] =$edate[0];
                    $edu_content[$key]['endDateStr'] =$edate[1];
                }else{
                    preg_match_all($preg,$list,$time_stage);
                    $edu_content[$key]['edate'] = $time_stage[0][0].date("Y.m");
                    $edate = explode("-",$edu_content[$key]['edate']);
                    $edu_content[$key]['startDateStr'] =$edate[0];
                    $edu_content[$key]['endDateStr'] =$edate[1];
                }
//                echo  $edu_content[$key]['endDateStr'];exit();
            }

            if($this->strpos_line($this->template_college,$this->myTrim($list))){

                $li = $this->split_line($list,$this->template_college);
                if(strlen($li[0])<30){
                    $edu_content[$key]['schoolName'] = $li[0];
                }
//                echo $edu_content[$key]['schoolName']."---".$key;exit();
            }

            if(strpos($this->myTrim($list),"专业") !== false){
                $li = $this->split_line($list,"专业");
                $edu_content[$key]['majorName'] = $li[1];
            }

            if($edu_content[$key]['schoolName'] && empty($edu_content[$key]['majorName'])){
                $arr = explode($edu_content[$key]['schoolName'],str_replace("|","",$list));
                $arr1 = $this->trim_arr($arr[1]);
                $edu_content[$key]['majorName'] =$arr1[0];

            }

            if(strpos($this->myTrim($list),"学历") !== false){
                $li = $this->split_line($list,"学历");
                $edu_content[$key]['degree'] = $li[1];
            }



            if(empty($edu_content[$key]['degree'])){
                if($this->strpos_line($this->template_xueli,$this->myTrim($list))){
                    $li = $this->split_line($list,$this->template_xueli);
                    $edu_content[$key]['degree'] = $li[0];
                }
            }


            if(empty($edu_content[$key]['edate']) || empty($edu_content[$key]['schoolName'])){
                $edu_content[$key] = "";
            }else{
                $startDateStr = $this->replaceAll($edu_content[$key]['startDateStr']);
                $edu_content[$key]['startDateStr'] = str_replace("|","-",$startDateStr);
                $endDateStr = $this->replaceAll($edu_content[$key]['endDateStr']);
                $edu_content[$key]['endDateStr'] = str_replace("|","-",$endDateStr);
            }
        }

        return array_filter($edu_content);
    }


    //项目解析
    function object_parse($object_offest,$txt_content,$str){
        if($object_offest==$txt_content[0]){
            $length = $txt_content[1]-$txt_content[0];
        }elseif ($object_offest==$txt_content[1]){
            $length = $txt_content[2]-$txt_content[1];
        }elseif ($object_offest==$txt_content[2]){
            $length = "";
        }

        if($length){
            $object_str = substr($str,$object_offest,$length);
        }else{
            $object_str = substr($str,$object_offest);
        }


        $object_str = str_replace("- -","-",$object_str);
        $object_str = str_replace("–","-",$object_str);
        $object_str = str_replace("--","-",$object_str);
        $object_str = str_replace("–","-",$object_str);
        $object_str = str_replace(" - ","-",$object_str);
        $object_str = str_replace("项目经历","",$object_str);
        $object_str = str_replace("项目经验","",$object_str);

        $object_str = str_replace("年",".",$object_str);
        $object_str = str_replace("月","",$object_str);


        $object_arr = $object_str;
        $object_arrs = "";
        $preg = "/\d{4}(\/|.)\d{1,2}-/";
        $preg1 = "/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/";
        preg_match_all($preg,$object_str,$object_var);

        if($object_var[0]){
            foreach ($object_var[0] as $key=>$li){
                $arr = explode($li,$object_arr);
                $object_arr = $li.$arr[1];
                $object_arrs[] = $arr[0];
                if(($key+1)==count($object_var[0])){
                    $object_arrs[] =$object_arr;
                }
            }
        }

        $object_content = "";
        foreach ($object_arrs as $key=>$list){
            $list = str_replace("至今",date("Y.m"),$list);
            $object_content[$key] = $this->object_exp;

//            if($this->strpos_line($this->object_des,$this->myTrim($list))){
//                $li = $this->arr_line($this->object_des,$this->myTrim($list));
//                $object_content[$key]['proDes'] = $li[1];
//            }else{
//                $object_content[$key]['proDes'] = str_replace("|","",$list);
//            }


//            $object_content[$key]['proDes'] = str_replace("|","",$list);
            if(preg_match("/\d{4}(\/|.)\d{1,2}-/",$list)){

                if(preg_match("/\d{4}(\/|.)\d{1,2}-\d{4}(\/|.)\d{1,2}/",$list)){
                    preg_match_all($preg1,$list,$time_stage);
                    $object_content[$key]['edate'] = $time_stage[0][0];
                    $edate = explode("-",$object_content[$key]['edate']);
                    $object_content[$key]['startDateStr'] =$edate[0];
                    $object_content[$key]['endDateStr'] =$edate[1];

                }else{
                    preg_match_all($preg,$list,$time_stage);
                    $object_content[$key]['edate'] = $time_stage[0][0].date("Y.m");
                    $edate = explode("-",$object_content[$key]['edate']);
                    $object_content[$key]['startDateStr'] =$edate[0];
                    $object_content[$key]['endDateStr'] =$edate[1];

                }
            }

            $lists = array_values(array_filter(explode("\n",$list)));
            foreach ($lists as $k=>$li){


                if(empty($object_content[$key]['proName']) && $object_content[$key]['endDateStr']){
                    $comname = explode($object_content[$key]['endDateStr'],$li);

                    $proName = $this->trim_arr(str_replace("：","",$comname[1]));
                    if($proName[0]){
                        $object_content[$key]['proName'] =$proName[0];
                    }else{
                        if(preg_match("/\d{4}(\/|.)\d{1,2}-/",$li)){
                            $object_content[$key]['proName'] =$lists[$k+1];
                        }
                    }


                }

                if($this->strpos_line($this->object_company,str_replace("|","",$this->replaceAll($li))) && empty($object_content[$key]['objectCompany'])){
                    $lis = array_values(array_filter(explode("|",$this->replaceAll($li))));
                    $object_company= $this->son_parse($lis,$this->object_company);
                    if($object_company){
                        $object_content[$key]['objectCompany'] = $object_company;
                    }else{
                        $object_content[$key]['objectCompany'] = $lists[$k+1];
                    }
                }

                if($this->strpos_line($this->object_zw,str_replace("|","",$this->replaceAll($li))) && empty($object_content[$key]['projectOffice'])){
                    $lis = array_values(array_filter(explode("|",$this->replaceAll($li))));
                    $projectOffice= $this->son_parse($lis,$this->object_zw);
                    if($projectOffice){
                        $object_content[$key]['projectOffice'] = $projectOffice;
                    }else{
                        $object_content[$key]['projectOffice'] = $lists[$k+1];
                    }
                }

                if($this->strpos_line($this->object_duty,str_replace("|","",$this->replaceAll($li))) && empty($object_content[$key]['objectDuty'])){
                    $lis = array_values(array_filter(explode("|",$this->replaceAll($li))));
                    $objectDuty = $this->son_parse($lis,$this->object_duty);
                    if($objectDuty){
                        $object_content[$key]['objectDuty'] = $objectDuty;
                    }else{
                        $object_content[$key]['objectDuty'] = $lists[$k+1];
                    }
                }


                if(empty($object_content[$key]['edate'])){
                    $object_content[$key] = "";
                }else{
                    $startDateStr = $this->replaceAll($object_content[$key]['startDateStr']);
                    $object_content[$key]['startDateStr'] = str_replace("|","-",$startDateStr);
                    $endDateStr = $this->replaceAll($object_content[$key]['endDateStr']);
                    $object_content[$key]['endDateStr'] = str_replace("|","-",$endDateStr);
                }
            }


        }

        return array_filter($object_content);
    }


    function son_parse($arr,$keyword){
        $data = "";
        foreach ($arr as $key=>$list){
            if($this->strpos_line($keyword,str_replace("|","",$this->replaceAll($list))) && empty($data)){
                $li = str_replace("|","",$this->replaceOther($list));
                if(in_array($li,$keyword)){
                    $data = $arr[$key+1];
                }else{
                    $data = $this->remove_line($list,$keyword);
                }
            }
        }

        return $data;
    }

    function filter_str($li,$list){
        $arr = explode($li,$list);
        $arr1 = array_filter(explode(" ",$arr[1]));
        $arr2 = array_values(array_filter(explode("\n",$arr1[0])));
        return $li.$arr2[0];
    }

    //值对应键转换
    function key_line($content,$arr){
        foreach ($arr as $key=>$list){
            if($list==$content){
                return $key;
            }
        }
    }

    //判断字段是否存在该行
    function strpos_line($arr_field,$content){
        foreach ($arr_field as $li){
            if(strpos($this->myTrim($content),$li) !== false){
                return true;
            }
        }
    }

    //根据关键字数组拆分字符
    function arr_line($arr_field,$content){
        foreach ($arr_field as $li){
            if(strpos($this->myTrim($content),$li) !== false){
                $li_n = explode($li,$this->myTrim($content));
                return $li_n;
            }
        }
    }

    //拆分该行，判断值具体位置
    function split_line($list,$content){
        $list = $this->replaceAll($list);

        $list = array_values(array_filter(explode("|",$list)));

        $start = "";

        foreach ($list as $k=>$li){
            if(is_array($content)){
                if($this->strpos_line($content,$li) && empty($start)){
                    $start = $k;
                }
            }else{
                if(strpos($this->myTrim($li),$content) !== false && empty($start)){
                    $start = $k;
                }
            }
        }

        if($start){
            $list = array_slice($list,$start);
        }

        return $list;
    }

    //去除特殊行，判断值具体位置
    function remove_line($list,$content){
        $str = $list;
        $list = $this->replaceAll($list);

        $list = array_values(array_filter(explode("|",$list)));
        $remove = "";

        foreach ($list as $k=>$li){
            if(is_array($content)){
                if($this->strpos_line($content,$li)!==false && empty($remove)){
                    $remove = $this->closest_word($li,$content);
                }
            }
        }

        if($remove){
            $list = str_replace("：","",str_replace($remove,"",$str));
        }
        return $list;
    }



    function split_lines($list,$content){
        $list = $this->replaceAll($list);

        $list = array_values(array_filter(explode("|",$list)));

        $start = "";

        foreach ($list as $k=>$li){
            if(is_array($content)){
                if($this->strpos_line($content,$li)){
                    $start = $k;
                }
            }else{
                if(strpos($this->myTrim($li),$content) !== false){
                    $start = $k;
                }
            }
        }

        if($start){
            $list = array_slice($list,$start);
        }

        return $list;
    }


    //所有特殊字符转换
    function replaceAll($str,$tostr="")
    {
        // $str = "!@#$%^&*（中'文：；﹑?中'文中'文().,<>|[]'\"";
        if (!$tostr )
        {
            $tostr = "|";
        }
//中文标点
//    $char = "。、！？：；﹑?＂…‘’“”〝〞∕?‖—　〈〉﹞﹝「」??〖〗】【??』『〕〔》《﹐?﹕︰﹔！?？?﹖﹌﹏﹋＇?ˊˋ―﹫︳︴?＿￣﹢﹦﹤‐??﹟﹩﹠﹪﹡﹨﹍﹉﹎﹊ˇ︵︶︷︸︹︿﹀︺︽︾ˉ﹁﹂﹃﹄︻︼（）";

        $pattern = array(
            "/[[:punct:]]/i", //英文标点符号
//        '/[：]/u', //中文标点符号
            '/[ ]{2,}/'
        );
        $str = str_replace("：","|",$str);
        $str = str_replace("\n","|",$str);
        $str = str_replace("	","",$str);
        $str = str_replace(" ","|",$str);
        $str = str_replace(" ","",$str);
        $str = str_replace("　","",$str);
        $str = str_replace("\n","|",$str);
        $str = str_replace("\r","|",$str);
        $str = preg_replace($pattern, '|', $str);
        return $str;


    }


    //斜杠以外的特殊字符转换
    function replaceOther($str,$tostr="")
    {
        $str = str_replace("/","。",$str);
        // $str = "!@#$%^&*（中'文：；﹑?中'文中'文().,<>|[]'\"";
        if (!$tostr )
        {
            $tostr = "|";
        }
//中文标点
//    $char = "。、！？：；﹑?＂…‘’“”〝〞∕?‖—　〈〉﹞﹝「」??〖〗】【??』『〕〔》《﹐?﹕︰﹔！?？?﹖﹌﹏﹋＇?ˊˋ―﹫︳︴?＿￣﹢﹦﹤‐??﹟﹩﹠﹪﹡﹨﹍﹉﹎﹊ˇ︵︶︷︸︹︿﹀︺︽︾ˉ﹁﹂﹃﹄︻︼（）";

        $pattern = array(
            "/[[:punct:]]/i", //英文标点符号
//        '/[：]/u', //中文标点符号
            '/[ ]{2,}/'
        );
        $str = str_replace("：","|",$str);
        $str = str_replace("\n","|",$str);
        $str = str_replace("	","|",$str);
        $str = str_replace(" ","|",$str);
        $str = str_replace(" ","|",$str);
        $str = str_replace("　","|",$str);
        $str = str_replace("\n","|",$str);
        $str = str_replace("\r","|",$str);
        $str = preg_replace($pattern, '|', $str);
        $str = str_replace("。","/",$str);
        return $str;


    }

    function sort_with_keyName($arr,$orderby='asc'){
        $new_array = array();
        $new_sort = array();
        foreach($arr as $key => $value){
            $new_array[] = $value;
        }
        if($orderby=='asc'){
            asort($new_array);
        }else{
            arsort($new_array);
        }
        foreach($new_array as $k => $v){
            foreach($arr as $key => $value){
                if($v==$value){
                    $new_sort[$key] = $value;
                    unset($arr[$key]);
                    break;
                }
            }
        }
        return $new_sort;
    }


    /**
     * php转码函数
     * $in_charset 此刻编码
     * $out_charset 转码后，输出的编码
     * $datas 要转码的数据
     */
    function m_iconv($in_charset,$out_charset,$datas){
        if(is_array($datas)){                            //如果数据为数组
            foreach($datas as $k=>$v){
                if(is_array($v)){                        //如果数据为多维数组，进行下面的递归调用m_iconv()函数自身
                    $k = iconv($in_charset,$out_charset,$k);            //多维数组的键进行转码，这里可以把键设置为汉字测试看看
                    $ml[$k] = $this->m_iconv($in_charset,$out_charset,$v);
                }elseif(is_string($k) || is_string($v)){        //如果是一维数组判断键和值是否为字符串
                    if(is_string($k)){
                        $k = iconv($in_charset,$out_charset,$k);
                    }
                    if(is_string($v)){
                        $v = iconv($in_charset,$out_charset,$v);
                    }
                    $ml[$k] = $v;
                }else{
                    $ml[$k] = $v;                    //一维数组键和值都为数组
                }
            }
        }elseif(is_string($datas)){                        //如果数据为字符串
            $ml = iconv($in_charset,$out_charset,$datas);
        }else{
            $ml = $datas;                                //如果数据为数值
        }
        return $ml;
    }


    //去掉空格
    function myTrim($str)
    {

        $search = array(" ","?","????","\n","\r","\t", "\s", "&gt; ","　　");
        $replace = array("","","","","","", "", "", "");
        return trim(str_replace($search, $replace, $str));
    }

    //空格换数组
    function trim_arr($str){
        $param = array(" ","?","????","\n","\r","\t", "\s", "&gt; ","　　");
        $replace = array("***","***","***","***","***","***", "***", "***", "***");
        $str1 = trim(str_replace($param, $replace, $str));

        $arr = array_values(array_filter(explode("***",$str1)));
        return $arr;
    }

    function isChineseName($name){
        if (preg_match('/^([\xe4-\xe9][\x80-\xbf]{2}){2,3}$/', $name)) {
            return true;
        } else {
            return false;
        }
    }

    function isTel($tel){
        if(strlen($tel) == "11" && preg_match("/^1[34578]\d{9}$/",$tel))
        {
            return true;
        }else{
            return false;
        }
    }

    function isEmail($email){
        if(preg_match("/([a-z0-9\-_\.]+@[a-z0-9]+\.[a-z0-9\-_\.]+)+/i",$email))
        {
            return true;
        }else{
            return false;
        }
    }
    //检索关键字
    function strpos_key($arrs,$str){
        foreach ($arrs as $value){
//        if(strpos($value,$str) !==false){
//            return true;
//        }
//
            if($value=$str){
                return true;
            }
        }
    }


    function search_key($arr,$str){
        foreach ($arr as $hr){
            if($hr = $str){
                return true;
            }
        }
    }


    function findNum($str=''){
        $str=trim($str);
        if(empty($str)){return '';}
        $result='';
        for($i=0;$i<strlen($str);$i++){
            if(is_numeric($str[$i])){
                $result.=$str[$i];
            }
        }
        return $result;
    }


    function chrtonum($str){
        $bins=array("零","一","二","三","四","五","六","七","八","九");
        if(strpos($str,"十")!==false){
            return "10年以上";
        }else{
            foreach ($bins as $k=>$list){
                if(strpos($str,$list)!==false){
                    return $k."年以上";
                }
            }
        }
    }


    function remove_html($document){
        $search = array ("'<script[^>]*?>.*?</script>'si", // 去掉 javascript
            "'<style[^>]*?>.*?</style>'si",  // 去掉 css
            "'<[/!]*?[^<>]*?>'si",      // 去掉 HTML 标记
            "'<!--[/!]*?[^<>]*?>'si",      // 去掉 注释 标记
            "'([rn])[s]+'",  // 去掉空白字符
            "'&(quot|#34);'i",  // 替换 HTML 实体

            "'&(amp|#38);'i",
            "'&(lt|#60);'i",
            "'&(gt|#62);'i",
            "'&(nbsp|#160);'i",
            "'&(iexcl|#161);'i",
            "'&(cent|#162);'i",
            "'&(pound|#163);'i",
            "'&(copy|#169);'i",
            "'&#(d+);'e");   // 作为 PHP 代码运行

        $replace = array ("",
            "",
            "",
            "",
            "\1",
            "\"",
            "&",
            "<",
            ">",
            " ",
            chr(161),
            chr(162),
            chr(163),
            chr(169),
            "chr(\1)");
//$document为需要处理字符串，如果来源为文件可以$document = file_get_contents($filename);
        $out = preg_replace($search, $replace, $document);
        return $out;
    }
}
?>