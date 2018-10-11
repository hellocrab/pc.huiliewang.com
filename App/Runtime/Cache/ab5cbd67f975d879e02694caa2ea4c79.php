<?php if (!defined('THINK_PATH')) exit();?><style>
    .sidebar-container ul.nav-tabs-task li a{
        background: #fff;
        border-right: none;
        color: #8a959e;
        padding-left: 0px;
        margin-right: 10px;
    }
    .nav-tabs-task>li.active>a{
        border-top: none !important;
        border-bottom: 3px solid #19aa8d !important;
        color:#333;
    }
    .nav-tabs-task>li a:hover{
        border-bottom: 3px solid #5cb76f !important;
        color: 
    }
    .nav-tabs-task>li{
        margin-top:10px;
        padding-top: 10px;
    }
    /*详情加载--start--*/
    .filelist{
        border: 1px dashed #d8e3ef;
        width: 97.2%;
        margin-left: 8px;
        margin-bottom: 65px;
    }
    .filelist .tsinfo{
        margin-top: 10px;
        margin-bottom: 10px;
        display: block;
        margin-left: 10px;
    }
    .filelist .fujian{
        margin-left: 8px;
        color: #646464;
    }
    #reparynow{
        border-top: 1px solid #d8e3ef;
        padding: 10px;
    }
    #content_lanage
    {
        border: 1px solid #eee;
        min-height: 51px;
        padding: 10px;
        border-radius: 2px;
    }
    #content_lanage:empty::before{  
        color:#cab0ba;
        content:attr(placeholder);  
    }
    #but_sub{
        margin-top: 10px;
        float: right;
        margin-bottom: 10px;
    }
    .talkcontent{
        clear: both;
        padding:10px;
    }
    .talkcontent .talknow{
        padding:10px;
    }
    .imgtx{
        width: 28px;
        float: left;
    }
    .neirong{
        margin-left: 42px;
        word-wrap: break-word;
        border-bottom:1px solid #eee;
    }
    .reply_talk{
        margin: 12px 0 12px 0;
    }
    .reply_content{
        border: 1px solid #aaa;
        min-height: 80px;
        padding: 10px;
        border-radius: 2px;
        margin-left: 43px;
    }
    .reply_content:empty::before{  
        color:#cab0ba;
        content:attr(placeholder);  
    }  
    .btn_reply{
        margin-top: 0px;
        float: right;
    }
    /*详情加载--end--*/
    .addMember-trigger-button{
        width: 30px;
        height: 30px;
        line-height: 28px;
        color: #fff;
        text-align: center;
        cursor: pointer;
        background-color: #dcdfe3;
        border-radius: 50%;
    }
    .project-people{
        float:left;
    }
    .project-people a{
        float:left;
    }

    /*.sortable-list{
        padding:0px !important;
    }*/

    /*子任务*/
    .list-group{
        padding-left: 0;
        margin-bottom: 20px;
    }
    .list-group-full .list-group-item{
        padding-right: 0;
        padding-left: 0;
        margin-top: 10px;
    }
    .list-group-item:first-child{
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .checkbox-custom{
        /*margin-top: 0;
        margin-bottom: 0;*/
        padding-left: 20px;
        position: relative;
        display: block;
    }
    /*子任务*/
    .dropdown-menu li:hover{
        background-color: transparent;
        color:#fff;
    }
    
    /*附件*/
    #filecontent{
        width: 99.2%;
        border: 1px dashed #d8e3ef;
        margin-top: 0px;
    }
    .showfile{
        padding:6px;
    }
    #filecontent .tishiinfo{
        margin-top: 10px;
        margin-bottom: 10px;
        display: block;
        margin-left: 10px;
    }
    #filecontent .fujian{
        margin-left: 8px;
        color: #646464;
    }
    #addfilediv{
        color: #cccccc;
        margin-left: 6px;
        padding-top: 8px;
        display: block;
        margin-bottom: 6px;
    }
    /*活动*/
    .ai-yellow{
        background-color: rgba(254,215,32,.7);
    }
    .ai-blue{
        background-color: rgba(43,161,225,.7);
    }
    .ai-green{
        background-color: rgba(121,196,85,.7);
    }
    .ai-red{
        background-color:rgba(230,88,69,.7);
    }
    .ai-orange{
       background-color:rgba(244,131,61,.7); 
    }
    .ai-purple{
        background-color:rgba(166,58,150,.7);
    }
    .ai-dark-blue{
        background-color: rgba(58,153,166,.7);
    }
    #vertical-timeline::before{
        width:0px !important;
    }
    .addMember-remove{
        position: relative;
        margin-right:-10px;
        top: -13px;
        right: 13px;
        display:none;
        font-size: 10px;
        line-height: 1;
        color: #fa7a7a;
        cursor: pointer;
        background-color: #fff;
        border-radius: 50%;
    }
    .re_role_info{
        float:left;
        width:42px;
        height:40px;
    }
</style>
<script>
    $(document).on('click','.btn_emoji',function(){
        var wind_width = window.innerWidth;
        left = wind_width/2+60;
        $(".emoji_container").css("left",left);
    });
</script>
<div class="full-height">
    <div class="white-bg border-left" id="content_div">
        <input type="hidden" id="task_id" value="<?php echo ($task['task_id']); ?>">
        <input type="hidden" id="dialog_open" value="0">
        <div class="element-detail-box">
            <div class="tab-content">
                <div class="pull-right">
                    <?php if($task['is_deleted'] == '0'): ?><div class="tooltip-demo">
                            <button class="btn btn-white btn-xs editdes" rel="<?php echo ($task['task_id']); ?>" data-toggle="tooltip" data-placement="top" title="编辑"><i class="fa fa-pencil"></i>&nbsp;编辑</button>
                            <button class="btn btn-white btn-xs add_child" rel="<?php echo ($task['task_id']); ?>" data-toggle="tooltip" data-placement="top" title="添加子任务"><i class="fa fa-eye"></i>&nbsp;子任务</button>
                            <button class="btn btn-white btn-xs" id="task_del" rel="<?php echo ($task['task_id']); ?>" data-toggle="tooltip" data-placement="top" title="归档任务" data-original-title="Move to trash"><i class="fa fa-folder">&nbsp;归档</i></button>
                            <button class="btn btn-white btn-xs" id="delete" rel="<?php echo ($task['task_id']); ?>" data-toggle="tooltip" data-placement="top" title="删除任务" data-original-title="Move to trash"><i class="fa fa-trash-o">&nbsp;删除</i></button>
                        </div>
                    <?php else: ?>
                        <div class="tooltip-demo">
                            <button class="btn btn-white btn-xs editdes" rel="<?php echo ($task['task_id']); ?>" data-toggle="tooltip" data-placement="top" title="编辑"><i class="fa fa-mail-reply"></i>&nbsp;激活</button>
                        </div><?php endif; ?>
                </div>
                <div class="small text-muted" style="height:35px;">
                    <i class="fa fa-clock-o"></i>&nbsp;<?php echo (date("Y-m-d H:i",$task['create_date'])); ?>&nbsp;<?php echo ($task['week_name']); ?>&nbsp;
                    <?php if($task['file_count'] > 0): ?><a href="#tab-file" class="goDown">
                            <span><img src="__PUBLIC__/img/addFile.png">&nbsp;&nbsp;附件(<?php echo ($task['file_count']); ?>)</span>
                        </a><?php endif; ?>
                </div>
                <div class="task_content_view">
                    <div class="pull-left col-sm-12" style="padding-left:0px;">
                        <div class="col-sm-8" style="padding-left:0px;padding-top: 15px;">
                            <div class="pull-left">
                                <span style="font-size:16px;line-height: 30px;" <?php if($task['is_deleted'] == 1): ?>class="text_line"<?php endif; ?>>
                                    <span id="new_subject"><?php echo ($task['subject']); ?></span> / <span style="color: #ccc;"><?php echo ($task['type_name']); ?></span>
                                </span> 
                            </div>
                            <?php if($task['is_deleted'] == '0'): ?><div class="pull-left" style="margin-left:10px;">
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" id="btn_status" class="btn btn-primary dropdown-toggle" aria-expanded="false" style="background-color:<?php echo ($task['status_color']); ?>;border:<?php echo ($task['status_color']); ?>"><?php echo ($task['status']); ?><span class="caret" style="margin-left: 30px;"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="task_status btn-danger" rel="未启动" rel1="#ed5565">未启动</a></li>
                                            <li><a class="task_status btn-warning" rel="推迟" rel1="#f8ac59">推迟</a></li>
                                            <li><a class="task_status btn-primary" rel="进行中" rel1="#1ab394">进行中</a></li>
                                            <li><a class="task_status btn-success" rel="完成" rel1="#00aaef">完成</a></li>
                                        </ul>
                                    </div>
                                </div><?php endif; ?>
                        </div>
                        <div class="col-sm-4" style="padding:10px 0px;">
                            <?php if($task['is_deleted'] == '0'): ?><ul class="color-selector" style="padding-left: 0px;float:right;">
                                    <li >
                                        <div class="radio bg-red-600" title="高">
                                            <input class="priority_task" id="radio1" type="radio" name="color" value="高" <?php if($task['priority'] == '高'): ?>checked="checked"<?php endif; ?> value="高">
                                            <label for="radio1"></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio bg-green-600" title="普通">
                                            <input class="priority_task" id="radio2" type="radio" name="color" <?php if($task['priority'] == '普通'): ?>checked="checked"<?php endif; ?> value="普通">
                                            <label for="radio2"></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio bg-orange-600" title="低">
                                            <input class="priority_task" id="radio3" type="radio" name="color" <?php if($task['priority'] == '低'): ?>checked="checked"<?php endif; ?> value="低">
                                            <label for="radio3"></label>
                                        </div>
                                    </li>
                                </ul>
                                <span style="float:right;line-height: 25px;margin-right: 15px;">优先级：</span><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div id="edit_content" class="col-sm-12" style="display:none;padding-left: 0px;">
                    <form id="form_edit">
                        <input type="hidden" name="task_id" value="<?php echo ($task['task_id']); ?>" />
                        <div class="modal-body col-sm-12">
                            <div class="form-group col-sm-12">
                                <div class="col-sm-2" style="padding-left:0px;">
                                    任务名称:
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="subject" name="subject" value="<?php echo ($task['subject']); ?>" placeholder="任务名称" class="form-control"/>
                                    <input type="hidden" id="subject_val" value="<?php echo ($task['subject']); ?>" />
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-2" style="padding-left:0px;">
                                    任务描述:
                                </div>
                                <div class="col-sm-10">
                                    <textarea id="description" rows="3" style="width:100%;" name="description" placeholder="任务描述" class="form-control" ><?php echo ($task['description']); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-2" style="padding-left:0px;">
                                    相关<?php echo ($task['relevant_name']); ?>:
                                </div>
                                <div class="col-sm-10">
                                    <input type="hidden" name="module_id" id="module_id" value="<?php echo ($task['module_id']); ?>"/>
                                    <input type="hidden" name="module" id="module" value="customer" />
                                    <input type="text" class="form-control" id="module_name" readonly="true" style="cursor:pointer;width:100%;" title="请点击选择" value="<?php echo ($task['module_name']); ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <button class="btn btn-primary" id="add_content" type="button">保存</button>
                                <a class="btn btn-sm btn-white" id="cancel_content" href="javascript:;">取消</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 task_content_view" style="padding:10px 0px;">
                    <?php if($task['description']): ?><div class="media-body" id="task-content" style="font-size: 16px;width:100%;word-break:break-all;word-wrap:break-word;line-height: 25px;padding-bottom: 10px;">
                            <?php echo ($task['description']); ?>
                        </div>
                    <?php elseif($task['is_deleted'] == '0'): ?>
                        <a class="editdes" rel="<?php echo ($task['task_id']); ?>" href="javascript:void(0);">添加任务描述</a><?php endif; ?>
                </div>
                <div class="col-sm-12 task_content_view" style="padding:10px 0px;">
                    <div class="col-sm-2" style="padding-left:0px;">
                        相关<?php echo ($task['relevant_name']); ?>:
                    </div>
                    <div class="col-sm-10">
                        <a target="_blank" href="<?php echo U('customer/view','id='.$task['module_id']);?>"><?php echo ($task['module_name']); ?></a>
                    </div>
                </div>
                <div class="col-sm-12" style="padding-left:0px;">
                    <div class="col-sm-6" style="padding-left:0px;">
                        <p style="font-size: 16px;color: #ccc;padding: 10px 0px;">分配任务给</p>
                    </div>
                    <div class="col-sm-6" style="padding-left:0px;">
                        <p style="font-size: 16px;color: #ccc;padding: 10px 0px;">关注人</p>
                    </div>
                </div>
                <div class="pull-left col-sm-12" style="padding-left:0px;">
                    <div class="col-sm-6" style="padding-left:0px;">
                        <input type="hidden" id="about_role_id" name="about_role_id" value="<?php echo ($task['about_roles']); ?>"/>
                        <dd class="project-people" id="about_roles_<?php echo ($task['task_id']); ?>">
                            <?php if(is_array($task['about_roles_list'])): $i = 0; $__LIST__ = $task['about_roles_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="re_role_info" id="about_roles_<?php echo ($vo['role_id']); ?>">
                                    <a class="role_info" title="<?php echo ($vo['full_name']); ?>" rel="<?php echo ($vo["role_id"]); ?>" href="javascript:void(0)" style="margin-right:5px;">
                                        <img alt="image" class="img-circle" <?php if($vo['thumb_path']): ?>src="<?php echo ($vo['thumb_path']); ?>"<?php else: ?>src="__PUBLIC__/img/avatar_default.png"<?php endif; ?>>
                                    </a>
                                    <span class="addMember-remove" rel="<?php echo ($vo["role_id"]); ?>" rel1="about_roles"><i class="fa fa-minus-circle"></i></span>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php if($task['is_deleted'] == '0'): ?><a class="add_about_role" href="javascript:void(0);" rel="<?php echo ($task['task_id']); ?>">
                                    <div class="addMember-trigger-button">
                                         <i class="fa fa-plus"></i>
                                    </div>
                                </a><?php endif; ?>
                        </dd>
                    </div>
                    <div class="col-sm-6" style="padding-left:0px;">
                        <input type="hidden" id="owner_role_id" name="owner_role_id" value="<?php echo ($task['owner_role_id']); ?>"/>
                        <dd class="project-people" id="owner_roles_<?php echo ($task['task_id']); ?>">
                            <?php if(is_array($task['owner'])): $i = 0; $__LIST__ = $task['owner'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="re_role_info" id="owner_roles_<?php echo ($vo['role_id']); ?>">
                                    <a class="role_info" title="<?php echo ($vo['full_name']); ?>" rel="<?php echo ($vo["role_id"]); ?>" href="javascript:void(0)" style="margin-right:5px;">
                                        <img alt="image" class="img-circle" <?php if($vo['thumb_path']): ?>src="<?php echo ($vo['thumb_path']); ?>"<?php else: ?>src="__PUBLIC__/img/avatar_default.png"<?php endif; ?>>
                                    </a>
                                    <span class="addMember-remove" rel="<?php echo ($vo["role_id"]); ?>" rel1="owner_roles"><i class="fa fa-minus-circle"></i></span>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php if($task['is_deleted'] == '0'): ?><a class="add_owner_role" href="javascript:void(0);" rel="<?php echo ($task['task_id']); ?>">
                                    <div class="addMember-trigger-button">
                                         <i class="fa fa-plus"></i>
                                    </div>
                                </a><?php endif; ?>
                        </dd>
                    </div>
                </div>
                <div class="pull-left col-sm-12" style="padding-left:0px;margin-top:20px;">
                    <div class="pull-left col-sm-2" style="padding-left:0px;">
                        <p style="font-size: 16px;color: #ccc;padding: 10px 0px 0px 0px;float:left;margin-top: 10px;">
                            <i class="fa fa-tasks"></i>&nbsp;&nbsp;子任务
                        </p>
                    </div>
                    <div class="pull-left col-sm-10" style="background-color: #f8f6f2;">
                        <ul class="list-group list-group-full subtasks-list" id="subtasks-list_<?php echo ($task['task_id']); ?>" style="margin-bottom: 0px;padding:10px">
                            <?php if(is_array($task['sub_list'])): $i = 0; $__LIST__ = $task['sub_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item subtask" id="subtask_li_<?php echo ($vo['id']); ?>" style="border:none;padding:0px;cursor:pointer;">
                                    <div class="checkbox checkbox-primary " id="edit_sub_<?php echo ($vo['id']); ?>" >
                                        <input id="checkbox<?php echo ($vo['id']); ?>" type="checkbox" class="sub_check" rel="<?php echo ($vo['id']); ?>" <?php if($vo['is_done'] == 1): ?>checked<?php endif; ?> <?php if($task['is_deleted'] == 1): ?>disabled="true";<?php endif; ?>>
                                        <label <?php if($task['is_deleted'] == '0'): ?>class="edit_sub" title="点击操作"<?php endif; ?> id="sub_label_<?php echo ($vo['id']); ?>" rel="<?php echo ($vo['id']); ?>" >
                                            <?php echo ($vo['content']); ?>
                                        </label>
                                        <input type="hidden" id="sub_editor_content_<?php echo ($vo['id']); ?>" value="<?php echo ($vo['content']); ?>" />
                                    </div>
                                    <div class="subtask-editor" id="subtask_<?php echo ($vo['id']); ?>" style="display: none;">
                                        <form id="subtask_form_<?php echo ($vo['id']); ?>">
                                            <input type="hidden" name="sub_id" value="<?php echo ($vo['id']); ?>" />
                                            <div class="form-group">
                                                <input class="form-control subtask-title sub_editor_content" id="sub_editor_<?php echo ($vo['id']); ?>" rel="<?php echo ($vo['id']); ?>" type="text" name="content" value="<?php echo ($vo['content']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-white subtask-editor-canel" rel="<?php echo ($vo['id']); ?>" type="button">取消</button>
                                                <a class="btn btn-sm btn-danger subtask-editor-delete" rel="<?php echo ($vo['id']); ?>" href="javascript:;">删除</a>
                                            </div>
                                        </form>
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php if($task['is_deleted'] == '0'): ?><div class="list-group-item subtask" style="border:none;padding:0px;">
                                <span><a class="add_child" rel="<?php echo ($task['task_id']); ?>">+添加子任务</a></span>
                            </div>
                            <div class="subtasks-add" id="child_content_<?php echo ($task['task_id']); ?>" style="display: none;margin-top: 10px;">
                                <form id="form_task_sub_<?php echo ($task['task_id']); ?>">
                                    <div class="form-group">
                                        <input class="form-control subtask-title" type="text" name="content" id="sub_content">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary subtask-add-save" rel="<?php echo ($task['task_id']); ?>" type="button">保存</button>
                                        <a class="btn btn-sm btn-white subtask-add-cancel" rel="<?php echo ($task['task_id']); ?>" href="javascript:;">取消</a>
                                    </div>
                                </form>
                            </div><?php endif; ?>
                    </div>
                </div>
                <div class="pull-left" style="width: 100%;margin-top: 15px;">
                    <div class="pull-right">
                        <span style="font-size:12px;color:#acaba7;"><?php echo ($task['creator']['full_name']); ?>&nbsp;<?php echo (date('Y-m-d H:i:s',$task['create_date'])); ?>，创建了任务</span>
                    </div>
                </div>

                <div class="m-t-lg tabs-container example" style="min-height: 200px;float:left;width:100%;">
                    <ul class="nav nav-tabs nav-tabs-task nav-tabs-line">
                        <li class="active" style="width:80px;">
                            <a data-toggle="tab" href="#tab-1"><i class="fa fa-smile-o"></i>评论</a>
                        </li>
                        <li id="tab-file" style="width:80px;">
                            <a data-toggle="tab" href="#tab-2" id="file_count" style="margin-right: 0px;">
                                <span><img src="__PUBLIC__/img/addFile.png">&nbsp;附件</span>
                                <span class="badge badge-radius badge-primary"><?php echo ($task['file_count']); ?></span>
                            </a>
                        </li>
                        <li style="width:80px;">
                            <a data-toggle="tab" href="#tab-3"><i class="fa fa-commenting-o"></i>活动</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="margin-top: 15px;">
                        <div id="tab-1" class="tab-pane active">
                            <?php if($task['is_deleted'] == '0'): ?><div id="reparynow">
                                    <div id="content_lanage" contenteditable="true" placeholder="添加回复..."></div>
                                    <div style="margin-top: 5px;">
                                        <input type="image" id="btn_emoji" class="btn_emoji" src="__PUBLIC__/img/emoji.png" />
                                    </div>
                                    <div id="but_sub" style="display: none;"><button class="btn btn-primary subit" disabled="true" id="add_language" type="button">发 表</button></div>
                                </div><?php endif; ?>
                            <div class="talkcontent" id="talkcontent_<?php echo ($log['log_id']); ?>">
                                <div class="spiner-example">
                                    <div class="sk-spinner sk-spinner-three-bounce">
                                        <div class="sk-bounce1"></div>
                                        <div class="sk-bounce2"></div>
                                        <div class="sk-bounce3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="attachment" style="border-top: 1px solid #d8e3ef;">
                                <?php if($task['is_deleted'] == '0'): ?><span class="addfile" style="cursor: pointer;"><img src="__PUBLIC__/img/addFile.png" title="添加附件"/></span><?php endif; ?>
                                
                                <?php if(empty($task['file_list'])): ?><div style="background-color:#fff;" id="nodata"><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div></div><?php endif; ?>
                                <div id="filecontent" style="margin:10px 0 50px 0;" <?php if(empty($task['file_list'])): ?>class="hide"<?php endif; ?>>
                                    <span class="tishiinfo"><img src="__PUBLIC__/img/addFile.png"/><span class="fujian">附件</span></span>
                                    <?php if(is_array($task['file_list'])): $i = 0; $__LIST__ = $task['file_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fvo): $mod = ($i % 2 );++$i;?><div class="file_tr" style="float: left;width:100%;padding-top: 6px;">
                                            <div class="showfile pull-left" id="del_<?php echo ($fvo['file_id']); ?>">
                                                <input type="hidden" name="file[]" value="<?php echo ($fvo['file_id']); ?>"/>
                                                <img src="__PUBLIC__/productImg/<?php echo ($fvo['pic']); ?>">&nbsp;
                                                <a <?php if(in_array(getExtension($fvo['name']),imgFormat())): ?>class="litebox_file" href="<?php echo ($fvo['file_path']); ?>" title="点击查看大图"<?php endif; ?>><?php echo ($fvo["name"]); ?></a>
                                                <span style="color:#646464;">&nbsp;(&nbsp;<?php echo ($fvo['size']); ?>KB&nbsp;)</span>&nbsp;&nbsp;<a href="javascript:;" rel="<?php echo ($fvo['file_id']); ?>" onclick="del_file(this);">
                                                    <img src="__PUBLIC__/img/delfile.png"/>
                                                </a>
                                            </div>
                                            <a class="controls_file" style="float: left;display: none;margin-left: 20px;padding:6px;" href="javascript:;" file="<?php echo ($fvo["file_path"]); ?>" filename="<?php echo ($fvo["name"]); ?>" onclick="filedown(this);">下载</a>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <span id="addfilediv" style="float:left;">本次共添加了<span id="file_num"></span>文件,总大小<span id="file_size"></span>KB&nbsp;<a href="javascript:;" style="color: #5a8ee2;" onclick="delall();">全部删除</a></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div id="vertical-timeline" class="vertical-container light-timeline" style="width:100%;">
                                <?php if(is_array($task['group_list'])): $i = 0; $__LIST__ = $task['group_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><div class="col-sm-12">
                                        <div class="pull-left">
                                            <span style="line-height:32px;margin-right: 10px;">
                                                <small><?php echo ($vo1['create_date']); ?>&nbsp;<?php echo ($vo1['week_name']); ?></small>
                                            </span>
                                        </div>
                                        <div class="pull-left">
                                            <?php if(is_array($vo1['action_list'])): $i = 0; $__LIST__ = $vo1['action_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="vertical-timeline-block" style="margin:0px">
                                                    <div class="vertical-timeline-icon <?php echo ($vo['color_class']); ?>" style="color:#fff;top:2px;width:30px;height:30px;margin-left: 5px;">
                                                        <i class="<?php echo ($vo['i_class']); ?>" style="margin-left:-10px;margin-top:-6px;width:20px;height:20px;"></i>
                                                    </div>
                                                    <div class="vertical-timeline-content" style="padding-top: 0px;margin-left:43px;">
                                                        <div class="pull-left">
                                                            <span style="line-height:32px;margin-right: 10px;">
                                                                <small><?php echo (date('H:i',$vo['create_time'])); ?></small>
                                                            </span>
                                                            <a class="role_info" rel="<?php echo ($vo['create_role_info']['role_id']); ?>" href="javascript:void(0)" style="margin-right:5px;">
                                                                <img alt="image" class="img-circle" style="width:32px;height:32px;" <?php if($vo['create_role_info']['thumb_path']): ?>src="<?php echo ($vo['create_role_info']['thumb_path']); ?>"<?php else: ?>src="__PUBLIC__/img/avatar_default.png"<?php endif; ?>>
                                                            </a>
                                                            <span style="line-height:32px;"><?php echo ($vo['create_role_info']['full_name']); ?>&nbsp;&nbsp;<?php echo ($vo['content']); ?></span>
                                                            <?php if(is_array($vo['role_list'])): $i = 0; $__LIST__ = $vo['role_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($vo1['role_id']); ?>" href="javascript:void(0)" style="margin-right:5px;">
                                                                    <img alt="image" class="img-circle" style="width:32px;height:32px;" <?php if($vo1['thumb_path']): ?>src="<?php echo ($vo1['thumb_path']); ?>"<?php else: ?>src="__PUBLIC__/img/avatar_default.png"<?php endif; ?>>
                                                                </a>
                                                                <span style="line-height:32px;"><?php echo ($vo1['full_name']); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </div>
                                                    </div>
                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none;" id="dialog-about_roles" title="选择任务分配人">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none;" id="dialog-owner_roles" title="选择任务关注人">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none;" id="dialog-file" title="添加文件">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none;" id="dialog-role-info-view" title="<?php echo L('DIALOG_USER_INFO');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none;" id="dialog-customer-list" title="选择客户">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<script>
$('#content_div').on('mouseenter','.re_role_info',function(){
    $(this).find(".addMember-remove").show();
});
$('#content_div').on('mouseleave','.re_role_info',function(){
    $(this).find(".addMember-remove").hide();
});

$("#dialog-role-info-view").dialog({
    autoOpen: false,
    modal: true,
    width: 700,
    maxHeight: 600,
    position: ["center",100]
});
$(".role_info").click(function(){
    $role_id = $(this).attr('rel');
    $('#dialog-role-info-view').dialog('open');
    $('#dialog-role-info-view').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
});

$('#content_div').on('click','.add_about_role',function(){
    var task_id = $(this).attr('rel');
    var owner_ids = $('#about_role_id').val();
    $('#dialog-about_roles').dialog('open');
    $('#dialog-about_roles').load('<?php echo U("user/mutiListDialog","by=task&check_ids=");?>'+owner_ids);
});

$('#content_div').on('click','.add_owner_role',function(){
    var task_id = $(this).attr('rel');
    var owner_ids = $('#owner_role_id').val();
    $('#dialog-owner_roles').dialog('open');
    $('#dialog-owner_roles').load('<?php echo U("user/mutiListDialog","by=task&check_ids=");?>'+owner_ids);
});

$('#content_div').on('click','.priority_task',function(){
    var task_id = $('#task_id').val();
    var priority = $(this).val();
    $.ajax({
        type: "POST",
        url: "<?php echo U('task/edit');?>",
        data:{task_id:task_id,priority:priority},
        async: true,
        success: function(data) {
            if(data.status !== 1){
                 swal({
                    title: "操作失败!",
                    text: data.info,
                    type: "error"
                });
            }else{
                $(this).removeClass('success-element warning-element danger-element');
                if (priority == '高') {
                    $('#task_li_'+task_id).addClass('danger-element');
                } else if (priority == '普通') {
                    $('#task_li_'+task_id).addClass('success-element');
                } else {
                    $('#task_li_'+task_id).addClass('warning-element');
                }
            }
        }
    });
});

//编辑
$('#content_div').on('click','.editdes',function(){
    $('.task_content_view').hide();
    $('#edit_content').show();
});

//编辑子任务
$('#content_div').on('click','.edit_sub',function(){
    var sub_id = $(this).attr('rel');
    $('#edit_sub_'+sub_id).hide();
    $('#subtask_'+sub_id).show();
    $('#sub_editor_'+sub_id).focus();
});

//编辑保存子任务
$('#content_div').on('blur','.sub_editor_content',function(){
    var sub_id = $(this).attr('rel');
    var sub_content_val = $('#sub_editor_content_'+sub_id).val();
    if($(this).val() == ''){
        $(this).val(sub_content_val);
    }else{
        $.ajax({
            type: "POST",
            url: "<?php echo U('task/subedit');?>",
            data:$('#subtask_form_'+sub_id).serialize(),
            async: true,
            success: function(data) {
                if(data.status == 1){
                    $('#sub_label_'+sub_id).html(data.data.content);
                    $('#edit_sub_'+sub_id).show();
                    $('#subtask_'+sub_id).hide();
                }else{
                    swal({
                        title: "操作失败!",
                        text: data.info,
                        type: "error"
                    });
                }
            }
        });
    }
});

$('#content_div').on('click','.subtask-editor-canel',function(){
    var sub_id = $(this).attr('rel');
    $('#edit_sub_'+sub_id).show();
    $('#subtask_'+sub_id).hide();
});

//删除子任务 
$('#content_div').on('click','.subtask-editor-delete',function(){
    var sub_id = $(this).attr('rel');
    swal({
        title: "您确定要删除该子任务吗？",
        text: "删除后将无法恢复，请谨慎操作！",
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "是的，我要删除！",
        cancelButtonText:'让我再考虑一下…',
        closeOnConfirm:false,
        closeOnCancel:false
    },
    function(isConfirm){
        if (isConfirm) {
            $.ajax({
                type: "POST",
                url: "<?php echo U('task/subdel');?>",
                data:{'sub_id':sub_id},
                async: true,
                success: function(data) {
                    if(data.status == 1){
                        swal("删除成功！", "您已经永久删除了信息！", "success");
                        $('#subtask_li_'+sub_id).hide();
                    }else{
                        swal({
                            title: "操作失败!",
                            text: data.info,
                            type: "error"
                        });
                        $('#edit_sub_'+sub_id).show();
                        $('#subtask_'+sub_id).hide();
                    }
                }
            });
        } else {
            swal("已取消","您取消了删除操作！","error");
        }
    });
});

//保存
$('#content_div').on('click','#add_content',function(){
    var task_id = $('#task_id').val();
    $.ajax({
        type: "POST",
        url: "<?php echo U('task/edit');?>",
        data:$('#form_edit').serialize(),
        async: true,
        success: function(data) {
            if(data.status == 1){
                $('#sidebar-container').load("<?php echo U('task/view','task_id=');?>"+task_id);
                $('#task-title-'+task_id).html(data.data.subject);
                // $('.task_content_view').show();
                // $('#edit_content').hide();
            }else{
                swal({
                    title: "操作失败!",
                    text: data.info,
                    type: "error"
                });
            }
        }
    });
});

//编辑
$('#content_div').on('click','#cancel_content',function(){
    $('.task_content_view').show();
    $('#edit_content').hide();
});

$('#subject').blur(function(){
    var subject_val = $('#subject_val').val();
    if($('#subject').val() == ''){
        $('#subject').val(subject_val);
    }
});

//子任务操作
$('#content_div').on('click','.sub_check',function(){
    var sub_id = $(this).attr('rel');
    var is_done = 1;
    $.ajax({
        type: "POST",
        url: "<?php echo U('task/subedit');?>",
        data:{sub_id:sub_id,is_done:1},
        async: true,
        success: function(data) {
            if(data.status !== 1){
                 swal({
                    title: "操作失败!",
                    text: data.info,
                    type: "error"
                });
            }else{
                $('#done_count').html(data.data.done_pro);
            }
        }
    });
});

$("#dialog-about_roles").dialog({
    autoOpen: false,
    modal: true,
    width: 800,
    height:400,
    close: function () {
        $(this).html(""); 
    },
    buttons: { 
        "确定": function () {
            var task_id = $('#task_id').val();
            checked_role_id = ',';
            temp = '';
            index_temp = '';
            $(".muti_role_id:checked").each(function(){
                checked_role_id += ($(this).val()+',');
                temp += '<div class="re_role_info" id="about_roles_'+$(this).val()+'">\
                            <a class="role_info" rel="'+$(this).val()+'" href="javascript:void(0)" style="margin-right:5px;">\
                            <img alt="image" class="img-circle" src="'+$(this).attr('rel1')+'">\
                            </a>\
                            <span class="addMember-remove" rel="'+$(this).val()+'" rel1="about_roles"><i class="fa fa-minus-circle"></i></span>\
                        </div>';
                index_temp += '<li style="padding:0px;float:left;">\
                                <a class="role_info" rel="'+$(this).val()+'" href="javascript:void(0)" title="">\
                                    <img class="img-circle" style="width:32px;height:32px;" src="'+$(this).attr('rel1')+'">\
                                </a>\
                            </li>';
            });
            temp += '<a class="add_about_role" href="javascript:void(0);" rel="'+task_id+'">\
                        <div class="addMember-trigger-button">\
                             <i class="fa fa-plus"></i>\
                        </div>\
                    </a>';
            $.ajax({
                type: "POST",
                url: "<?php echo U('task/edit');?>",
                data:{task_id:task_id,about_roles:checked_role_id},
                async: true,
                success: function(data) {
                    if(data.status == 1){
                        //追加
                        $('#about_role_id').val(checked_role_id);
                        $('#about_roles_'+task_id).html(temp);
                        //列表追加
                        $('#task-members-'+task_id).html(index_temp);
                    }else{
                        swal({
                            title: "操作失败!",
                            text: data.info,
                            type: "error"
                        });
                    }
                }
            });
            $(this).html(""); 
            $(this).dialog("close");
        },
        "取消": function () {
            $(this).html(""); 
            $(this).dialog("close");
        }
    },
    open:function(){
        //显示对话框时触发
        $('#dialog_open').val('1');
    },
    close:function(e,u){
        //关闭对话框时触发
        $('#dialog_open').val('0');
    },
    position:["center",100]
});

$("#dialog-owner_roles").dialog({
    autoOpen: false,
    modal: true,
    width: 800,
    height:400,
    close: function () {
        $(this).html(""); 
    },
    buttons: { 
        "确定": function () {
            var task_id = $('#task_id').val();
            checked_role_id = ',';
            temp = '';
            $(".muti_role_id:checked").each(function(){
                checked_role_id += ($(this).val()+',');
                temp += '<div class="re_role_info" id="owner_roles_'+$(this).val()+'">\
                            <a class="role_info" rel="'+$(this).val()+'" href="javascript:void(0)" style="margin-right:5px;">\
                            <img alt="image" class="img-circle" src="'+$(this).attr('rel1')+'">\
                            </a>\
                            <span class="addMember-remove" rel="'+$(this).val()+'" rel1="owner_roles"><i class="fa fa-minus-circle"></i></span>\
                        </div>';
            });
            temp += '<a class="add_owner_role" href="javascript:void(0);" rel="'+task_id+'">\
                        <div class="addMember-trigger-button">\
                             <i class="fa fa-plus"></i>\
                        </div>\
                    </a>';
            $.ajax({
                type: "POST",
                url: "<?php echo U('task/edit');?>",
                data:{task_id:task_id,owner_role_id:checked_role_id},
                async: true,
                success: function(data) {
                    if(data.status == 1){
                        //追加
                        $('#owner_role_id').val(checked_role_id);
                        $('#owner_roles_'+task_id).html(temp);
                    }else{
                        swal({
                            title: "操作失败!",
                            text: data.info,
                            type: "error"
                        });
                    }
                }
            });
            $(this).html(""); 
            $(this).dialog("close");
        },
        "取消": function () {
            $(this).html(""); 
            $(this).dialog("close");
        }
    },
    open:function(){
        //显示对话框时触发
        $('#dialog_open').val('1');
    },
    close:function(e,u){
        //关闭对话框时触发
        $('#dialog_open').val('0');
    },
    position:["center",100]
});

//移除分配人、关注人
$('#content_div').on('click','.addMember-remove',function(){
    $('#dialog_open').val('1');//详情页不关闭
    var task_id = $('#task_id').val();
    var role_id = $(this).attr('rel');
    var field = $(this).attr('rel1');
    var field_name = '关注人';
    if(field == 'about_roles'){
        field_name = '分配人';
    }
    $.ajax({
        type: "POST",
        url: "<?php echo U('task/edit');?>",
        data:{task_id:task_id,remove_role_id:role_id,field:field},
        async: true,
        success: function(data) {
            if(data.status == 1){
                if(field == 'about_roles'){
                    //追加
                    $('#about_role_id').val(data.data['about_roles']);
                    $('#about_roles_'+role_id).remove();
                    //列表追加
                    $('#about_role_index_'+task_id+'_'+role_id).remove();
                }
                if(field == 'owner_roles'){
                    //追加
                    $('#owner_role_id').val(data.data['owner_role_id']);
                    $('#owner_roles_'+role_id).remove();
                }
                // swal("移除成功！", "您已经移除了该"+field_name+"！", "success");
            }else{
                swal({
                    title: "操作失败!",
                    text: data.info,
                    type: "error"
                });
            }
        }
    });
});

//添加子任务
$('#content_div').on('click','.add_child',function(){
    var task_id = $(this).attr('rel');
    $('#child_content_'+task_id).show();
});

$('#content_div').on('click','.subtask-add-cancel',function(){
    var task_id = $(this).attr('rel');
    $('#child_content_'+task_id).hide();
});
//添加子任务保存
$('#content_div').on('click','.subtask-add-save',function(){
    var task_id = $(this).attr('rel');
    var content = $('#sub_content').val();
    if(content == ''){
        alert('子任务内容不能为空');
        $('#sub_content').focus();
        return false;
    }
    var temp = '';
    $.ajax({
        type: "POST",
        url: "<?php echo U('task/addSub');?>",
        data:{content:content,task_id:task_id},
        async: true,
        success: function(data) {
            if(data.status == 1){
                temp += '<li class="list-group-item subtask" style="border:none;padding:0px;">\
                    <div class="checkbox checkbox-primary">\
                        <input id="checkbox'+data.data.sub_id+'" type="checkbox" class="sub_check" rel="'+data.data.sub_id+'">\
                        <label class="edit_sub" id="sub_label_'+data.data.sub_id+'" rel="'+data.data.sub_id+'" title="点击操作">\
                            '+data.data.content+'\
                        </label>\
                        <input type="hidden" id="sub_editor_content_'+data.data.sub_id+'" value="'+data.data.content+'" />\
                    </div>\
                    <div class="subtask-editor" id="subtask_'+data.data.sub_id+'" style="display: none;">\
                        <form id="subtask_form_'+data.data.sub_id+'">\
                            <input type="hidden" name="sub_id" value="'+data.data.sub_id+'" />\
                            <div class="form-group">\
                                <input class="form-control subtask-title sub_editor_content" rel="'+data.data.sub_id+'" id="sub_editor_'+data.data.sub_id+'" type="text" name="content" value="'+data.data.content+'">\
                            </div>\
                            <div class="form-group">\
                                <button class="btn btn-white subtask-editor-canel" rel="'+data.data.sub_id+'" type="button">取消</button>\
                                <a class="btn btn-sm btn-danger subtask-editor-delete" href="javascript:;">删除</a>\
                            </div>\
                        </form>\
                    </div>\
                </li>';
                //追加
                $('#subtasks-list_'+task_id).append(temp);
                $('#sub_content').val('');
            }else{
                swal({
                    title: "操作失败!",
                    text: data.info,
                    type: "error"
                });
            }
        }
    });
});

//任务状态修改
$('.task_status').click(function(){
    var task_id = $('#task_id').val();
    var status_name_span = status_name = $(this).attr('rel');
    var style = $(this).attr('rel1');
    $.ajax({
        type: "POST",
        url: "<?php echo U('task/edit');?>",
        data:{status:status_name,task_id:task_id},
        async: true,
        success: function(data) {
            if(data.status == 1){
                status_name_span += '<span class="caret" style="margin-left: 30px;"></span>';
                $('#btn_status').css({'background-color':style,'border':style});
                $('#btn_status').html(status_name_span);
                if (status_name == '完成') {
                    $('#checkbox_'+task_id).attr('checked',true);
                    $('#task-title-'+task_id).css({'text-decoration':'line-through','color':'#999'});
                } else {
                    $('#checkbox_'+task_id).attr('checked',false);
                    $('#task-title-'+task_id).css({'text-decoration':'none','color':'#000'});
                }
            }else{
                swal({
                    title: "操作失败!",
                    text: data.info,
                    type: "error"
                });
            }
        }
    });
});

$("#dialog-file").dialog({
    autoOpen: false,
    modal: true,
    width: 800,
    maxHeight: 400,
    position: ["center",100],
    buttons: {
        "确定": function () {
           $.ajax({
                cache: true,
                type: "POST",
                url:'<?php echo U("file/getfiles");?>',
                data:$('#uploadForm').serialize(),
                async: false,
                success: function(data) {
                   var result = data.data.file_list;
                   $('#filecontent').removeAttr('class');
                   var temp = '';
                   if(result){
                         $.each(result,function(k,v){
                            temp += '<div class="showfile" id="del_'+v.file_id+'"><input type="hidden" name="file[]" value="'+v.file_id+'"/><img src="__PUBLIC__/productImg/'+v.pic+'">&nbsp;<span style="color:#646464;">'+v.name+'&nbsp;(&nbsp;'+v.size+'KB&nbsp;)</span>&nbsp;&nbsp;<a href="javascript:;" rel="'+v.file_id+'" onclick="del_file(this);"><img src="__PUBLIC__/img/delfile.png"/></a></div>';
                         });
                         $('#addfilediv').before(temp);
                         var old_file_num = Number($('#file_num').html());
                         var old_file_size = Number($('#file_size').html());
                         var new_file_num = old_file_num+data.data.file_num;
                         var new_file_size = old_file_size+data.data.file_size;
                         $('#file_num').html(new_file_num);
                         $('#file_size').html(new_file_size);
                         $('#nodata').hide();
                   }
                }
            });
           $(this).dialog("close");
        },
        "取消": function () {
             $(this).dialog("close");
        }
    },
    open:function(){
        //显示对话框时触发
        $('#dialog_open').val('1');
    },
    close:function(e,u){
        //关闭对话框时触发
        $('#dialog_open').val('0');
    }
});
$(".addfile").click(function(){
    var task_id = $('#task_id').val();
    $('#dialog-file').dialog('open');
    $('#dialog-file').load('<?php echo U("file/addlogfile","r=RTaskFile&module=task&id=");?>'+task_id);
});
//删除 函数
function del_obj(id){
    var module = 'task';
    $.post("<?php echo U('file/filedel');?>",{file_id:id,module:module},function(data){
        if(data.status == 1){
            $('#del_'+id).remove();
            swal("删除成功！", "你的文件被删除了", "success");
            if($('.showfile').length > 0){
                return true;
            }else{
                $('#filecontent').addClass('hide');
            }
        }else{
            swal({
                title: "提示",
                text: data.info,
                type: "error"
            });
        }
        },"json"
    );
}
//删除
function del_file(obj){
    var id = $(obj).attr('rel');
    swal({
        title: "您确定要删除该文件吗?",
        text: "删除后将无法恢复，请谨慎操作！",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "是的，我要删除！",
        cancelButtonText: "让我再考虑一下…",
        closeOnConfirm: false
    },
    function(isConfirm){
        if (isConfirm) {
            del_obj(id);
        }else{
            return false;
        }
    });
}
//全部删除 函数
function delall(){
    swal({
        title: "您确定要删除该文件吗?",
        text: "删除后将无法恢复，请谨慎操作！",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "是的，我要删除！",
        cancelButtonText: "让我再考虑一下…",
        closeOnConfirm: false
    },
    function(isConfirm){
        if (isConfirm) {
            $('.showfile').each(function(){
                var id = $(this).find('input[type="hidden"]').val();
                del_obj(id);        
            });
        }else{
            return false;
        }
    });
}

$(".file_tr").mouseenter(function(){
    $(this).find(".controls_file").show();
}).mouseleave(function(){
    $(this).find(".controls_file").hide();
});
$(function(){
    $("#content_lanage").emoji({
        button:"#btn_emoji",
        showTab: true,
        animation: 'slide',
        icons: [{
            name: "小表情",
            path: "__PUBLIC__/emoji/img/tieba/",
            maxNum: 50,
            file: ".jpg",
            placeholder: ":{alias}:",
            alias: {
                1: "hehe",
                2: "haha",
                3: "tushe",
                4: "a",
                5: "ku",
                6: "lu",
                7: "kaixin",
                8: "han",
                9: "lei",
                10: "heixian",
                11: "bishi",
                12: "bugaoxing",
                13: "zhenbang",
                14: "qian",
                15: "yiwen",
                16: "yinxian",
                17: "tu",
                18: "yi",
                19: "weiqu",
                20: "huaxin",
                21: "hu",
                22: "xiaonian",
                23: "neng",
                24: "taikaixin",
                25: "huaji",
                26: "mianqiang",
                27: "kuanghan",
                28: "guai",
                29: "shuijiao",
                30: "jinku",
                31: "shengqi",
                32: "jinya",
                33: "pen",
                34: "aixin",
                35: "xinsui",
                36: "meigui",
                37: "liwu",
                38: "caihong",
                39: "xxyl",
                40: "taiyang",
                41: "qianbi",
                42: "dnegpao",
                43: "chabei",
                44: "dangao",
                45: "yinyue",
                46: "haha2",
                47: "shenli",
                48: "damuzhi",
                49: "ruo",
                50: "OK"
            },
            title: {
                1: "呵呵",
                2: "哈哈",
                3: "吐舌",
                4: "啊",
                5: "酷",
                6: "怒",
                7: "开心",
                8: "汗",
                9: "泪",
                10: "黑线",
                11: "鄙视",
                12: "不高兴",
                13: "真棒",
                14: "钱",
                15: "疑问",
                16: "阴脸",
                17: "吐",
                18: "咦",
                19: "委屈",
                20: "花心",
                21: "呼~",
                22: "笑脸",
                23: "冷",
                24: "太开心",
                25: "滑稽",
                26: "勉强",
                27: "狂汗",
                28: "乖",
                29: "睡觉",
                30: "惊哭",
                31: "生气",
                32: "惊讶",
                33: "喷",
                34: "爱心",
                35: "心碎",
                36: "玫瑰",
                37: "礼物",
                38: "彩虹",
                39: "星星月亮",
                40: "太阳",
                41: "钱币",
                42: "灯泡",
                43: "茶杯",
                44: "蛋糕",
                45: "音乐",
                46: "haha",
                47: "胜利",
                48: "大拇指",
                49: "弱",
                50: "OK"
            }
        },
           { name: "萌萌哒",
            path: "__PUBLIC__/emoji/img/qq/",
            maxNum: 91,
            excludeNums: [41, 45, 54],
            file: ".gif"
        }]
    });
    //处理换行显示
    var element = $("div[class='media-body']");
    var temp =  element.text().replace(/\n/g,'<br/>');
    element.html(temp);

    //任务归档
    $('#task_del').click(function(){
        $('#dialog_open').val('1');//详情页不关闭
        var task_id = $(this).attr('rel');
        swal({
            title: "您确定要归档任务信息吗？",
            text: "归档的任务可在任务归档列表查看！",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "是的，我要归档！",
            cancelButtonText:'让我再考虑一下…',
            closeOnConfirm:false,
            closeOnCancel:false
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo U('task/delete');?>",
                    data:{task_id:task_id},
                    async: true,
                    success: function (data) {
                        if (data.status == 1) {
                            swal("归档成功！", "您已经归档了该任务！", "success");
                            location.reload();
                        }else{
                            swal({
                                title: "操作失败！",
                                text:data.info,
                                type: "error"
                            })
                            return false;
                        }
                    },
                    dataType: 'json'
                });
            } else {
                swal("已取消","您取消了归档操作！","error");
            }
        });
    });

    $(document).on('click','#delete',function(){
        $('#dialog_open').val('1');//详情页不关闭
        var task_id = $(this).attr('rel');
        swal({
            title: "您确定要删除任务信息吗？",
            text: "删除后将无法恢复，请谨慎操作！",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "是的，我要删除！",
            cancelButtonText:'让我再考虑一下…',
            closeOnConfirm:false,
            closeOnCancel:false
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type:'post',
                    url: "<?php echo U('task/del');?>",
                    data: {task_id: task_id},
                    async: false,
                    success: function (data) {
                        if (data.status == 1) {
                            swal("删除成功！", "您已经永久删除了信息！", "success");
                            location.reload();
                        } else {
                            swal({
                                title: "操作失败！",
                                text:data.info,
                                type: "error"
                            })
                            return false;
                        }
                    },
                    dataType: 'json'
                });
            } else {
                swal("已取消","您取消了删除操作！","error");
            }
        });
    });
    
    //最后一个样式
    $(".neirong:last").css('border','none');
    var task_id = $('#task_id').val();
    $(function(){
        var url = "<?php echo U('task/commentShow');?>";
        $('.talkcontent').load(url,{task_id:task_id});
    });
    //div 回复 添加
    $('#content_lanage').focus(function(){
        $(".subit").removeAttr('disabled');
        $("#but_sub").fadeIn("3000");
    });
    $('#content_lanage').focusout(function(){
        var content = $(this).html();
        if(!content){
            $("#but_sub").fadeOut("3000");
            $(".subit").prop('disabled',true);
            $(this).html('');
        }
    });
    //点击发表后
    function add_after(){
        $('#content_lanage').html('');
        $('#content_lanage').attr('placeholder');
        $("#but_sub").fadeOut("3000");
        $(".subit").prop('disabled',true);
    }
    /*
    *添加首次回复调用
     */
    $('#add_language').click(function(){
        var content_lanage = $('#content_lanage').html();
        $('#add_language').attr('disabled', true);
        $.post("<?php echo U('task/myCommont');?>",{content:content_lanage,task_id:task_id},function(data){
                if(data.status == 1){
                    add_after();//还原初始状态
                    var url = "<?php echo U('task/commentShow');?>";
                    $('.talkcontent').load(url,{task_id:task_id});    
                }else{
                    alert_crm(data.info);
                }
                $('#add_language').attr('disabled', false);
            },"json"
        );
    });
    /**
     * 附件 如果是图片时 双击可查看大图
     */
    $('.litebox_file').liteBox({
        revealSpeed: 400,
        background: 'rgba(0,0,0,.8)',
        overlayClose: true,
        escKey: true,
        navKey: true,
        errorMessage: '图片加载失败.'
    });

    //任务相关
    $('#form_edit').on('click','#module_name',function () {
        $('#dialog-customer-list').dialog('open');
        $('#dialog-customer-list').load('<?php echo U("customer/listDialog");?>');
    });

    $("#dialog-customer-list").dialog({
        autoOpen: false,
        modal: false,
        width: 800,
        maxHeight: 400,
        position: ["center", 100],
        buttons: { 
            "确定": function () {
                var item = $('input:radio[name="customer"]:checked').val();
                var name = $('input:radio[name="customer"]:checked').parent().next().html();
                $('#module_id').val(item);
                $('#module_name').val(name);
                $(this).dialog("close"); 
            },
            "取消": function () {
                $(this).dialog("close");
            }
        },
        open:function(){
            //显示对话框时触发
            $('#dialog_open').val('1');
        },
        close:function(e,u){
            $(this).html('');
            //关闭对话框时触发
            $('#dialog_open').val('0');
        }
    });
});
</script>