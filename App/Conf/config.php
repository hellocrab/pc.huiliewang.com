<?php
	return array(
		'SHOW_PAGE_TRACE'=>false,
		'URL_MODEL'=>0,
		'URL_CASE_INSENSITIVE' =>true,
		'TMPL_ACTION_ERROR' => 'Public:message', 
		'TMPL_ACTION_SUCCESS' => 'Public:message',
		'TMPL_EXCEPTION_FILE'=>'./App/Tpl/Public/exception.html',
		'DEFAULT_TIMEZONE' => 'PRC',
		'LOAD_EXT_CONFIG' => 'db,version,authorize.config,call,redis',
		'LOG_RECORD' => true,
		'LOG_LEVEL'  =>'EMERG',
		'OUTPUT_ENCODE' => false,
	    'LANG_SWITCH_ON' => true,
	    'LANG_AUTO_DETECT' => true,
		'DEFAULT_LANG' => 'zh-cn', // 默认语言
	    'LANG_LIST' => 'en-us,zh-cn',
	    'VAR_LANGUAGE' => '1',
	    'COOKIE_PATH' => __ROOT__,
	    'SESSION_OPTIONS'=>array('cookie_path'=>__ROOT__),  
		'TOKEN_ON'=>false,  // 是否开启令牌验证
		'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
		'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
		'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
	);
?>