<?php if (!defined('THINK_PATH')) exit();?><style>
    .content{
        width: 100%;
        height: auto;
        padding: 20px;
    }
    ul li{
        list-style: none;
    }
    .tjname{
        font-size: 16px;
        color: #666666;
    }

    .stepr,.steprno{
        position: relative;
        display: inline-block;
        width: 12px;
        height: 12px;
        background: #e7eaec;
        border: 2px solid #e7eaec;
        border-radius: 100%;
        margin-right: 10%;
        cursor: pointer;
        margin-left: 2px;
    }
    .stepr:hover,.steprno:hover{
        background:  #7acddc;
        border: 2px solid #7acddc;
    }
    .stepr:hover,.steprno:hover,.currentstep {
        -webkit-transform: scale(1.3,1.3);
        transform: scale(1.3,1.3);
    }
    .stepr, .steprno {
        transition: all .6s;
        cursor: pointer;
    }
    .activs{
        width: 12px;
        height: 12px;
        background: #7acddc;
        border: 2px solid #7acddc;
        margin-left: 2px;
    }
    .lastac{
        width: 12px;
        height: 12px;
        background: #fff;
        border: 2px solid #7acddc;
    }
    .stepr:last-child{
        margin-right: 0;
        margin-left: 2px;
    }
    .stepr:before{
        content: "";
        position: absolute;
        top: 2px;
        height: 4px;
        left: 12px;
        background: #e7eaec;
        width: 10000%;
    }
    .stepsnav{
        display: inline-block;
        position: absolute;
        width:88%;
        height: 4px;
        background: #e7eaec;
        left: 42px;
        top: 6px;
        z-index: -5;
    }
    .stepjs{
        display: inline-block;
        width: calc(10% + 14px);
    }
    .stepnav tr td{
        overflow: hidden;
        padding: 0 !important;
        border-top: none !important;
    }

    .baccc{
        height:auto;
        background: #f5f5f5;
        padding: 15px 20px;
    }
    .listjilu{
        width: calc(100% - 40px);
        height: auto;
        margin-top: 20px;
        margin-left: 40px;
        border-left: 1px solid #ccc;
    }
    .listitem{
        margin-top: 20px;
        padding-bottom: 20px;
        border-bottom: 2px solid #eee;
        margin-left: 20px;
        width: calc(100% - 20px);
    }
    .icoedit{
        width: 28px;
        height: 28px;
        position: absolute;
        left: -34px;
        top: -8px;
    }
    .imgtou{
        position: absolute;
        width: 36px;
        height: 36px;
        border-radius: 100%;
        overflow: hidden;
        left: -38px;
        top: -10px;
    }
    .hangr{
        position: relative;
    }
    .ico_xiugai{
        position: absolute;
        left: -24px;
        top: 24px;
        display: none;
    }
    .ico_xiugai:before{
        position: absolute;
        top: -8px;
        content: "";
        left: 20px;
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #e7eaec;
        z-index: 9;
    }
    .ico_xiugai:after{
        position: absolute;
        top: -6px;
        content: "";
        left: 22px;
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #fff;
        z-index: 99;
    }
    .mal10{
        margin-left: 10px;
    }
    .icohover:hover .ico_xiugai{
        display: block;
    }
</style>
<script type="text/javascript" src="__PUBLIC__/js/PCASClass.js" ></script>
<div class="full-height">
    <div class="content">
        <div class="row">
            <ul class="pull-left">
                <li><a href="javascript:void(0)" class="tjname"><?php echo ($project['name']); ?></a></li>
            </ul>
            <ul class="pull-right">
                <li>
                    <input type="button" value="关闭" class="btn btn-primary btn-sm closeslide" style="margin-right: 10px;">
                </li>
            </ul>
        </div>
        <div class="row">
            <table class="table stepnav" style="margin-left: 20px;width: calc(100% - 20px);">
                <tr class="process_line">
                    <?php $__FOR_START_1903740596__=0;$__FOR_END_1903740596__=$pro_count;for($i=$__FOR_START_1903740596__;$i < $__FOR_END_1903740596__;$i+=1){ if($i == ($pro_count-1)): if($i == $process[$project['status']]): ?><td><a href="#log<?php echo ($i); ?>"  data-toggle="tab" class="steprno lastac currentstep"></a></td>
                            <?php elseif($i < $process[$project['status']]): ?>
                            <td><a href="#log<?php echo ($i); ?>"  data-toggle="tab" class="steprno activs"></a></td>
                            <?php else: ?>
                            <td><a class="steprno"></a></td><?php endif; ?>
                    <?php else: ?>
                        <?php if($i == $process[$project['status']]): ?><td><a href="#log<?php echo ($i); ?>"  data-toggle="tab" class="stepr lastac currentstep"></a></td>
                        <?php elseif($i < $process[$project['status']]): ?>
                            <td><a href="#log<?php echo ($i); ?>"  data-toggle="tab" class="stepr activs"></a></td>
                        <?php else: ?>
                            <td><a  class="stepr"></a></td><?php endif; endif; ?>
                    <!--<td><span class="stepr activs"></span></td>-->
                    <!--<td><span class="stepr activs"></span></td>-->
                    <!--<td><span class="stepr lastac currentstep"></span></td>-->
                    <!--<td><span class="stepr"></span></td>-->
                    <!--<td><span class="stepr"></span></td>-->
                    <!--<td><span class="stepr"></span></td>--><?php } ?>
                    <!--<td><span class="steprno"></span></td>-->
                </tr>
                <tr>
                    <?php if(is_array($process_name)): $i = 0; $__LIST__ = $process_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo ($vo); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>

                </tr>
            </table>
        </div>

        <?php if($project['stop'] == 1): ?><div class="row baccc">
                <input type="button" value="重启流程" class="btn btn-default restart" data-id="<?php echo ($project['id']); ?>">
                <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">
            </div>
        <?php else: ?>
        <!--CallList-->
        <?php if($project['status'] == calllist): ?><div class="row baccc">
            <input type="button" value="CC备注" class="btn btn-default addCCbz" data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="推荐给顾问面试" class="btn btn-default tjgwms"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="推荐人才给客户" class="btn btn-default tjkehu"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="不合适" class="btn btn-default remove"  data-id="<?php echo ($project['id']); ?>">
        </div><?php endif; ?>
        <!--顾问面试-->
        <?php if(($project['status'] == adviser) and $project['adviser_more']): ?><div class="row baccc">
                <input type="button" value="推荐人才给客户" class="btn btn-default tjkehu">
                <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">
                <input type="button" value="不合适" class="btn btn-default remove"  data-id="<?php echo ($project['id']); ?>">
            </div>
        <?php elseif(($project['status'] == adviser) and empty($project['adviser_more'])): ?>
            <div class="row baccc">
                <input type="button" value="顾问面试备注" class="btn btn-default msbz" data-id="<?php echo ($project['id']); ?>">
                <input type="button" value="推荐人才给客户" class="btn btn-default tjkehu">
                <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">
                <input type="button" value="不合适" class="btn btn-default remove"  data-id="<?php echo ($project['id']); ?>">
            </div><?php endif; ?>
        <!--简历推荐-->
        <?php if($project['status'] == tj): ?><div class="row baccc">
            <input type="button" value="客户面试" class="btn btn-default khms" data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="添加推荐反馈" class="btn btn-default tjfk"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="不合适" class="btn btn-default remove"  data-id="<?php echo ($project['id']); ?>">
        </div><?php endif; ?>
        <!--客户面试-->
        <?php if($project['status'] == interview): ?><div class="row baccc">
            <input type="button" value="客户面试" class="btn btn-default khms"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="开票" class="btn btn-default fapiao"   data-id="<?php echo ($project['id']); ?>">

                <?php switch($pro_type): case "传统项目": case "其他": case "入职快": ?><input type="button" value="面试通过" class="btn btn-default mstg"   data-id="<?php echo ($project['id']); ?>">
                        <input type="button" value="不合适" class="btn btn-default remove"   data-id="<?php echo ($project['id']); ?>"><?php break;?>
                    <?php default: endswitch;?>
            <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">

        </div><?php endif; ?>
        <!--面试通过-->
        <?php if($project['status'] == pass): ?><div class="row baccc">
            <input type="button" value="Offer" class="btn btn-default offer"   data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="淘汰" class="btn btn-default remove"   data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">
        </div><?php endif; ?>
        <!--Offer-->
        <?php if($project['status'] == offer): ?><div class="row baccc">
            <input type="button" value="入职" class="btn btn-default ruzhi"   data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="Offer掉" class="btn btn-default remove"   data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="开票" class="btn btn-default fapiao"   data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="添加备注" class="btn btn-default addbz" data-id="<?php echo ($project['id']); ?>">
        </div><?php endif; ?>
        <!--入职-->

        <?php if($project['status'] == enter): ?><div class="row baccc">
            <input type="button" value="淘汰" class="btn btn-default remove"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="开票" class="btn btn-default fapiao"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="费用变更" class="btn btn-default changefy"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">
        </div><?php endif; ?>
        <!--过保-->
        <?php if($project['status'] == safe): ?><div class="row baccc">
            <input type="button" value="淘汰" class="btn btn-default remove"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="开票" class="btn btn-default fapiao"  data-id="<?php echo ($project['id']); ?>">
            <input type="button" value="添加备注" class="btn btn-default addbz"  data-id="<?php echo ($project['id']); ?>">
        </div><?php endif; endif; ?>

        <div class="tab-content">
            <div class="tab-pane fade in listjilu <?php if($project[status] == calllist): ?>active<?php endif; ?>" id="log0">
                <?php if($project['calllist']): if(is_array($project['calllist'])): $i = 0; $__LIST__ = $project['calllist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i; if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 'remove_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">将候选人设为不合适</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai remove"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">不合适原因：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['reason']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>

                            <?php if($key == 'cc_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了CC备注</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai addCCbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">电话结果：</td>
                                                <td style="font-size: 12px;color: #666666;"><?php echo ($vo['call_result']); ?></td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">是否继续跟进：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php if($vo['gj']): ?>是
                                                        <?php else: ?>
                                                        否<?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">是否目标候选人：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php if($vo['target']): ?>是
                                                        <?php else: ?>
                                                        否<?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['remarks']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>

                            <?php if($key == 'calllist_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了备注</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai addbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注：</td>
                                                <td style="font-size: 12px;color: #666666;"><?php echo ($vo['beizhu']); ?></td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">截止时间：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['timeend']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                <div class="listitem">
                    <div class="hangr">
                        <span class="icoedit">
                        <embed src="/Public/img/svg/rili.svg" width="100%" height="100%"
                               type="image/svg+xml"
                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                        </span>
                        <span><?php echo date('Y-m-d H:i',$project['addtime']); ?></span>
                        <a href="#" class="mal10"><?php echo ($project['tracker_name']); ?></a>
                    </div>
                    <div class="hangr" style="margin-top: 20px;">
                        <table>
                            <tr height="24px">
                                <td style="font-size: 12px;color: #999999;">将候选人加入CallList</td>
                            </tr>
                            <!--<tr height="24px">-->
                                <!--<td style="font-size: 12px;color: #666666;"><?php echo ($project['job_name']); ?></td>-->
                            <!--</tr>-->
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade in  listjilu <?php if($project[status] == adviser): ?>active<?php endif; ?>" id="log1">
                <?php if($project['adviser']): if(is_array($project['adviser'])): $i = 0; $__LIST__ = $project['adviser'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i; if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 'adviser_content'): ?><div class="listitem">
                                        <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                            <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                        </div>
                                        <div class="hangr" style="margin-top: 20px;">
                                            <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                            <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                            <label style="margin-left: 15px;">推荐了顾问面试</label>
                                            <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                                <span class="fa fa-angle-down"></span>
                                                <div class="btn btn-default ico_xiugai tjgwms"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                            </div>

                                            <table>
                                                <tr height="24px">
                                                    <td align="right" style="font-size: 12px;color: #999999;">候选人空闲时间：</td>
                                                    <td style="font-size: 12px;color: #666666;">
                                                        <?php if($vo['kjtime']): echo ($vo['kjtime']); ?>
                                                        <?php else: ?>
                                                            <?php echo ($vo['timestart']); ?>--<?php echo ($vo['timeend']); endif; ?>
                                                    </td>
                                                </tr>
                                                <tr height="24px">
                                                    <td align="right" style="font-size: 12px;color: #999999;">备注：</td>
                                                    <td style="font-size: 12px;color: #666666;">
                                                        <?php echo ($vo['tjbeizhu']); ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div><?php endif; ?>

                            <?php if($key == 'adviser_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了备注</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai addbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注内容：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['beizhu']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">截止时间：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['timeend']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>

                            <?php if($key == 'adviser_more'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了顾问面试备注</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai msbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">类型：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['mstype']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">候选人状态：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['jobstatus']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">意向城市：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['province']); ?>-<?php echo ($vo['city']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">候选人信息：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['info']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">标签：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['tags']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">期望排序：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['hope_order']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">期望信息：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['hope_content']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">市场信息：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['market_info']); ?>
                                                </td>
                                            </tr>

                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">任务：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['timeend']); ?>     <?php echo ($vo['beizhu']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>

                            <?php if($key == 'remove_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">将候选人设为不合适</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai remove"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">不合适原因：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['reason']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>

            <div class="tab-pane fade in  listjilu <?php if($project[status] == tj): ?>active<?php endif; ?>" id="log2">

                <?php if($project['tj']): if(is_array($project['tj'])): $i = 0; $__LIST__ = $project['tj'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i; if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 'tj_more'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了推荐反馈</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai tjfk"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">状态：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php if($vo['gj']): ?>通过
                                                        <?php else: ?>
                                                        不合适<?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php if($vo['gj'] == 0): if($vo['bhs']): ?><tr height="24px">
                                                    <td align="right" style="font-size: 12px;color: #999999;">不合适原因(客户淘汰)：</td>
                                                    <td style="font-size: 12px;color: #666666;">
                                                        <?php echo ($vo['status_type']); ?>
                                                    </td>
                                                </tr>
                                                <?php else: ?>
                                                    <tr height="24px">
                                                        <td align="right" style="font-size: 12px;color: #999999;">不合适原因(候选人放弃)：</td>
                                                        <td style="font-size: 12px;color: #666666;">
                                                            <?php echo ($vo['status_type']); ?>
                                                        </td>
                                                    </tr><?php endif; endif; ?>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">候选人反馈：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['guest_feedback']); ?>
                                                </td>
                                            </tr>

                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">客户反馈：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['custom_feedback']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>

                            <?php if($key == 'tj_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了备注</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai addbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注内容：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['beizhu']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">截止时间：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['timeend']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>
                            <?php if($key == 'remove_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">将候选人设为不合适</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai remove"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">不合适原因：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['reason']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                <?php if($project['tj_log']): ?><div class="listitem">
                            <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                <span><?php echo date('Y-m-d H:i',$project['tj_log']['addtime']); ?></span>
                            </div>
                            <div class="hangr" style="margin-top: 20px;">
                                <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                <label style="margin-left: 15px;">将候选人进行简历推荐</label>
                            </div>
                        </div><?php endif; ?>
                <div class="listitem">
                    <div class="hangr">
                        <span class="icoedit">
                        <embed src="/Public/img/svg/rili.svg" width="100%" height="100%"
                               type="image/svg+xml"
                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                        </span>
                        <span><?php echo date('Y-m-d H:i',$project['tjaddtime']); ?></span>
                        <a href="#" class="mal10"><?php echo ($project['tracker_name']); ?></a>
                    </div>
                    <div class="hangr" style="margin-top: 20px;">
                        <table>
                            <tr height="24px">
                                <td style="font-size: 12px;color: #999999;">将候选人进行简历推荐</td>
                            </tr>
                            <!--<tr height="24px">-->
                            <!--<td style="font-size: 12px;color: #666666;"><?php echo ($project['job_name']); ?></td>-->
                            <!--</tr>-->
                        </table>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade in  listjilu <?php if($project[status] == interview): ?>active<?php endif; ?>" id="log3">
                <?php if($project['interview']): if(is_array($project['interview'])): $i = 0; $__LIST__ = $project['interview'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i; if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 'interview_content'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了客户面试（第<?php echo ($vo['interview']); ?>面）</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai khms"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">姓名：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['name']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">职位：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['job_name']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">面试时间：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['timestart']); ?>
                                                </td>
                                            </tr>

                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">面试地点：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['interview_place']); ?>
                                                </td>
                                            </tr>

                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">面试官：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['status_type']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>

                         <?php if($key == 'interview_remark'): ?><div class="listitem">
                                <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                    <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                </div>
                                <div class="hangr" style="margin-top: 20px;">
                                    <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                    <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                    <label style="margin-left: 15px;">添加了备注</label>
                                    <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                        <span class="fa fa-angle-down"></span>
                                        <div class="btn btn-default ico_xiugai addbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                    </div>

                                    <table>
                                        <tr height="24px">
                                            <td align="right" style="font-size: 12px;color: #999999;">备注内容：</td>
                                            <td style="font-size: 12px;color: #666666;">
                                                <?php echo ($vo['beizhu']); ?>
                                            </td>
                                        </tr>
                                        <tr height="24px">
                                            <td align="right" style="font-size: 12px;color: #999999;">截止时间：</td>
                                            <td style="font-size: 12px;color: #666666;">
                                                <?php echo ($vo['timeend']); ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div><?php endif; ?>
                         <?php if($key == 'invoice'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['create_time']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了开票</label>
                                        <!--<div  class="pull-right icohover" style="position: relative;margin-right: 20px;">-->
                                            <!--<span class="fa fa-angle-down"></span>-->
                                            <!--<div class="btn btn-default ico_xiugai addCCbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($key); ?>">修改</div>-->
                                        <!--</div>-->

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票编号：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['name']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">费用类型：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['cost_type']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票类型：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['billing_type']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票抬头：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['invoice_header']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">税号：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['number']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">内容：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['content']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">金额：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['price']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['description']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>
                         <?php if($key == 'remove_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">将候选人设为不合适</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai remove"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">不合适原因：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['reason']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>

            <div class="tab-pane fade in  listjilu <?php if($project[status] == pass): ?>active<?php endif; ?>" id="log4">
                <?php if($project['stop']): if(is_array($project['remove_remark'])): $i = 0; $__LIST__ = $project['remove_remark'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;?><div class="listitem">
                            <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                            </div>
                            <div class="hangr" style="margin-top: 20px;">
                                <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                <label style="margin-left: 15px;">将人选设为不合适</label>
                                <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                    <span class="fa fa-angle-down"></span>
                                    <div class="btn btn-default ico_xiugai remove"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                </div>

                                <table>
                                    <tr height="24px">
                                        <td align="right" style="font-size: 12px;color: #999999;">不合适原因：</td>
                                        <td style="font-size: 12px;color: #666666;">
                                            <?php echo ($vo['reason']); ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                <div class="listitem">
                    <div class="hangr">
                        <span class="icoedit">
                        <embed src="/Public/img/svg/rili.svg" width="100%" height="100%"
                               type="image/svg+xml"
                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                        </span>
                        <span><?php echo date('Y-m-d H:i',$project['passtime']); ?></span>
                        <a href="#" class="mal10"><?php echo ($project['tracker_name']); ?></a>
                    </div>
                    <div class="hangr" style="margin-top: 20px;">
                        <table>
                            <tr height="24px">
                                <td style="font-size: 12px;color: #999999;">将候选人设置为面试通过</td>
                            </tr>
                            <!--<tr height="24px">-->
                            <!--<td style="font-size: 12px;color: #666666;"><?php echo ($project['job_name']); ?></td>-->
                            <!--</tr>-->
                        </table>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade in  listjilu <?php if($project[status] == offer): ?>active<?php endif; ?>" id="log5">
                <?php if($project['offer']): if(is_array($project['offer'])): $i = 0; $__LIST__ = $project['offer'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i; if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 'offer_content'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">设置为Offer</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai offer"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">薪资结构：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['structure']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">年薪：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['YearSalary']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">Offer签订时间：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['offertime']); ?>
                                                </td>
                                            </tr>

                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">预计收入：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['income']); ?>
                                                </td>
                                            </tr>

                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">预计离职时间：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['leavetime']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['remarks']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>
                            <?php if($key == 'invoice'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['create_time']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了开票</label>
                                        <!--<div  class="pull-right icohover" style="position: relative;margin-right: 20px;">-->
                                            <!--<span class="fa fa-angle-down"></span>-->
                                            <!--<div class="btn btn-default ico_xiugai addCCbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($key); ?>">修改</div>-->
                                        <!--</div>-->

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票编号：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['name']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">费用类型：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['cost_type']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票类型：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['billing_type']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票抬头：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['invoice_header']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">税号：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['number']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">内容：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['content']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">金额：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['price']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['description']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>
                            <?php if($key == 'offer_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了备注</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai addbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注内容：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['beizhu']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">截止时间：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['timeend']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>

                            <?php if($key == 'remove_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">将候选人设为不合适</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai remove"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">不合适原因：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['reason']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>

            <div class="tab-pane fade in  listjilu <?php if($project[status] == enter): ?>active<?php endif; ?>" id="log6">

                <?php if($project['enter']): if(is_array($project['enter'])): $i = 0; $__LIST__ = $project['enter'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i; if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key == 'enter_content'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了入职信息</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai ruzhi"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">候选人：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['name']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">入职日期：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['entertime']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">试用期日期：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['trialtime']); ?>
                                                </td>
                                            </tr>

                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">过保日期：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['safetime']); ?>
                                                </td>
                                            </tr>

                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['remarks']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>
                            <?php if($key == 'remove_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">将候选人设为不合适</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai remove"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">不合适原因：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['reason']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>
                            <?php if($key == 'enter_remark'): ?><div class="listitem">
                                    <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了备注</label>
                                        <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                            <span class="fa fa-angle-down"></span>
                                            <div class="btn btn-default ico_xiugai addbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                        </div>

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注内容：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['beizhu']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">截止时间：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['timeend']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; ?>
                            <?php if($key == 'invoice'): ?><div class="listitem">
                                    <div class="hangr">
                                    <span class="icoedit">
                                    <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                           type="image/svg+xml"
                                           pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                    </span>
                                        <span><?php echo date('Y-m-d H:i',$vo['create_time']); ?></span>
                                    </div>
                                    <div class="hangr" style="margin-top: 20px;">
                                        <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                        <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                        <label style="margin-left: 15px;">添加了开票</label>
                                        <!--<div  class="pull-right icohover" style="position: relative;margin-right: 20px;">-->
                                            <!--<span class="fa fa-angle-down"></span>-->
                                            <!--<div class="btn btn-default ico_xiugai addCCbz"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($key); ?>">修改</div>-->
                                        <!--</div>-->

                                        <table>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票编号：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['name']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">费用类型：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['cost_type']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票类型：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['billing_type']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">发票抬头：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['invoice_header']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">税号：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['number']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">内容：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['content']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">金额：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['price']); ?>
                                                </td>
                                            </tr>
                                            <tr height="24px">
                                                <td align="right" style="font-size: 12px;color: #999999;">备注：</td>
                                                <td style="font-size: 12px;color: #666666;">
                                                    <?php echo ($vo['description']); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>

            <div class="tab-pane fade in  listjilu <?php if($project[status] == safe): ?>active<?php endif; ?>" id="log7">
                <?php if($project['stop']): if(is_array($project['remove_remark'])): $i = 0; $__LIST__ = $project['remove_remark'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;?><div class="listitem">
                            <div class="hangr">
                                        <span class="icoedit">
                                        <embed src="/Public/img/svg/edit_green.svg" width="100%" height="100%"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        </span>
                                <span><?php echo date('Y-m-d H:i',$vo['addtime']); ?></span>
                            </div>
                            <div class="hangr" style="margin-top: 20px;">
                                <img src="<?php echo ($project['thumb_path']); ?>" class="imgtou">
                                <span style="margin-left: 10px;"><?php echo ($project['tracker_name']); ?></span>
                                <label style="margin-left: 15px;">将人选设为不合适</label>
                                <div  class="pull-right icohover" style="position: relative;margin-right: 20px;">
                                    <span class="fa fa-angle-down"></span>
                                    <div class="btn btn-default ico_xiugai remove"  data-id="<?php echo ($project['id']); ?>" data-key="<?php echo ($vo['id']); ?>">修改</div>
                                </div>

                                <table>
                                    <tr height="24px">
                                        <td align="right" style="font-size: 12px;color: #999999;">不合适原因：</td>
                                        <td style="font-size: 12px;color: #666666;">
                                            <?php echo ($vo['reason']); ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                <div class="listitem">
                    <div class="hangr">
                        <span class="icoedit">
                        <embed src="/Public/img/svg/rili.svg" width="100%" height="100%"
                               type="image/svg+xml"
                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                        </span>
                        <span><?php echo date('Y-m-d H:i',$project['addtime']); ?></span>
                        <a href="#" class="mal10"><?php echo ($project['tracker_name']); ?></a>
                    </div>
                    <div class="hangr" style="margin-top: 20px;">
                        <table>
                            <tr height="24px">
                                <td style="font-size: 12px;color: #999999;">将候选人加入CallList：</td>
                            </tr>
                            <tr height="24px">
                                <td style="font-size: 12px;color: #666666;"><?php echo ($project['job_name']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>

<div style="display:none" id="dialog-addCCbz">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-gwms">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-addbz">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-remove">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-msbz">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-khms">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-tjfk">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-fapiao">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-offer">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-ruzhi">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-changefy">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>



<script>


    var name=$(".tjname").html();
    $("#dialog-addCCbz").dialog({
        autoOpen: false,
         modal: true,
        width: 580,
        maxHeight: 450,
        position: ["center",100],
        title:"添加CC备注("+name+")",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var gjresult = $('#gjresult').val();//电话结果
                var gjflag=$("#gjflag").val();//是否继续跟进
                var gjtime=$(".time_se").val();//跟进时间
                var mbflag=$("#mbflag").val();//是否目标候选人
                var ccbeizhu=$(".ccbeizhu").val();//结果备注
                if(gjresult == ""){
                    alert_crm("请电话结果！");
                    $("#gjresult").focus();
                    return false;
                }
                $('#dialog_form1').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });

    $("#dialog-gwms").dialog({
        autoOpen: false,
         modal: true,
        width: 580,
        maxHeight: 450,
        position: ["center",100],
        title:"推荐给顾问面试",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var msren=$(".msren").val();//面试顾问
                var kjtime=$("#kjtime").val();//快捷面试时间
                var xxtime=$("#timestart").val()+","+$("#timeend").val();//详细跟进时间
                var tjbeizhu=$(".tjbeizhu").val();//推荐备注
                if(msren=="" || msren==null){
                    alert_crm("请选择面试顾问！");
                    return false;
                }
                $('#status_form1').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });


    $("#dialog-addbz").dialog({
        autoOpen: false,
        modal: true,
        width: 580,
        maxHeight: 700,
        position: ["center",100],
        title:"添加备注",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var beizhu=$("#beizhu").val();//备注内容
                if(beizhu==""){
                    alert_crm("请填写备注！");
                    return false;
                }
                $('#addbz_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });

    $("#dialog-remove").dialog({
        autoOpen: false,
        modal: true,
        width: 580,
        maxHeight: 580,
        position: ["center",100],
        title:"不合适",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var reason=$("#reason").val();//不合适原因
                if(reason==""){
                    alert_crm("请写明不合适原因！");
                    return false;
                }
                $('#remove_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });

    $("#dialog-msbz").dialog({
        autoOpen: false,
//        modal: true,
        width: 780,
        maxHeight: 580,
        position: ["center",100],
        title:"顾问面试备注",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var mstype=$("#mstype").val();
                if(mstype==""){
                    alert_crm("请选择类型！");
                    return;
                }
                $('#status_form2').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-khms").dialog({
        autoOpen: false,
        modal: true,
        width: 580,
        maxHeight: 580,
        position: ["center",100],
        title:"客户面试",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var timestart=$("#timestart").val();//不合适原因
                if(timestart==""){
//                    alert_crm("请选择面试时间！");
                    $("input[name=timestart]").css("border","1px dotted #cc5965");
                    return false;
                }else{
                    $("input[name=timestart]").css("border","1px solid #d8e3ef");
                }
                $('#status_form3').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });

    $("#dialog-tjfk").dialog({
        autoOpen: false,
        modal: true,
        width: 580,
        maxHeight: 580,
        position: ["center",100],
        title:"添加推荐反馈",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var guest_feedback=$("textarea[name=guest_feedback]").val();
                if(guest_feedback==""){
                    alert_crm("请填写候选人反馈信息！");
                    return false;
                }
                $('#tjfk_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });

    $("#dialog-fapiao").dialog({
        autoOpen: false,
        modal: true,
        width: 580,
        maxHeight: 580,
        position: ["center",100],
        title:"发票",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var billing_type=$("select[name=billing_type] option:selected").text();
                var invoice_header=$("input[name=invoice_header]").val();
                var content=$("input[name=content]").val();
                var price=$("input[name=price]").val();
                if(billing_type==""){
                    $("select[name=billing_type]").css("border","1px dotted #cc5965");
                    return false;
                }
                if(invoice_header==""){
                    $("input[name=invoice_header]").css("border","1px dotted #cc5965");
                    return false;
                }
                if(content==""){
                    $("input[name=content]").css("border","1px dotted #cc5965");
                    return false;
                }
                if(price==""){
                    $("input[name=price]").css("border","1px dotted #cc5965");
                    return false;
                }
                $('#fapiao_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });

    $("#dialog-offer").dialog({
        autoOpen: false,
        modal: true,
        width: 580,
        maxHeight: 580,
        position: ["center",100],
        title:"Offer",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var YearSalary=$("input[name=YearSalary]").val();
                var offertime=$("input[name=offertime]").val();
                if(YearSalary==""){
                    $("input[name=YearSalary]").css("border","1px dotted #cc5965");
                    return false;
                }
                if(offertime==""){
                    $("input[name=offertime]").css("border","1px dotted #cc5965");
                    return false;
                }
                $('#status_form6').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-ruzhi").dialog({
        autoOpen: false,
        modal: true,
        width: 580,
        maxHeight: 580,
        position: ["center",100],
        title:"入职",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var timestart=$("input[name=entertime]").val();
                var safetime=$("input[name=safetime]").val();
                if(timestart==""){
                    $("input[name=entertime]").css("border","1px dotted #cc5965");
                    return false;
                }
                if(safetime==""){
                    $("input[name=safetime]").css("border","1px dotted #cc5965");
                    return false;
                }
                $('#status_form7').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-changefy").dialog({
        autoOpen: false,
        modal: true,
        width: 580,
        maxHeight: 580,
        position: ["center",100],
        title:"费用变更",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#changefy_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                //selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });


    $(function () {

        //添加CC备注
        $(".addCCbz").on("click",function (){
            var id=$(this).attr("data-id");
            var key=$(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-addCCbz').dialog('open');
            if(key){
                $('#dialog-addCCbz').load("/index.php?m=business&a=addcc&id="+id+"&key="+key);
            }else{
                $('#dialog-addCCbz').load("/index.php?m=business&a=addcc&id="+id);
            }
        })

        //推荐顾问面试
        $(".tjgwms").on("click",function () {
            $('#dialog-gwms').dialog("open");
            var id=$(this).attr("data-id");
            var key=$(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-gwms').load("/index.php?m=business&a=addgwms&id="+id+"&key="+key);
        })

        //推荐人才给客户
        $(".tjkehu").click(function(){
            swal({
                    title: "确定推荐该人才给客户吗？",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                    closeOnConfirm: false
                },
                function(){
                    $.ajax({
                        type:"post",
                        url:"<?php echo U('business/edit_project');?>",
                        data:{
                            kind:"tj",
                            id:"<?php echo ($project['id']); ?>"
                        },
                        success:function (data) {
                            swal("温馨提示！", "项目状态推进成功！", "success");
                            location.reload();
//                            console.log(data);
//                            window.href=href;
                        },
                        error:function () {

                        }
                    })
                });
        });

        //推荐人才给客户
        $(".restart").click(function(){
            swal({
                    title: "确定重新启动该流程吗？",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                    closeOnConfirm: false
                },
                function(){
                    $.ajax({
                        type:"post",
                        url:"<?php echo U('business/edit_project');?>",
                        data:{
                            kind:"restart",
                            id:"<?php echo ($project['id']); ?>"
                        },
                        success:function (data) {
                            swal("温馨提示！", "项目状态推进成功！", "success");
                            location.reload();
//                            console.log(data);
//                            window.href=href;
                        },
                        error:function () {

                        }
                    })
                });
        });

        //添加备注
        $(".addbz").on("click",function () {
            var id = $(this).attr("data-id");
            var key = $(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-addbz').dialog("open");
            $('#dialog-addbz').load("index.php?m=business&a=addbz&id="+id+"&key="+key);
        })

        //不合适
        $(".remove").on("click",function () {
            var id = $(this).attr("data-id");
            var key = $(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-remove').dialog("open");
            $('#dialog-remove').load("index.php?m=business&a=remove&id="+id+"&key="+key);
        })

        //顾问面试备注
        $(".msbz").on("click",function () {
            var id = $(this).attr("data-id");
            var key = $(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-msbz').dialog("open");
            $('#dialog-msbz').load("/index.php?m=business&a=msbz&id="+id+"&key="+key);
        })

        //客户面试
        $(".khms").on("click",function () {
            var id = $(this).attr("data-id");
            var key = $(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-khms').dialog("open");
            $('#dialog-khms').load("index.php?m=business&a=khms&id="+id+"&key="+key);
        })

        //推荐反馈
        $(".tjfk").on("click",function () {
            var id = $(this).attr("data-id");
            var key = $(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-tjfk').dialog("open");
            $('#dialog-tjfk').load("index.php?m=business&a=tjfk&id="+id+"&key="+key);
        })

        //面试通过
        $(".mstg").click(function(){
            var id = $(this).attr("data-id");
            swal({
                    title: "确定该候选人通过面试了吗？",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                    closeOnConfirm: false
                },
                function(){
                    $.ajax({
                        type:"post",
                        url:"<?php echo U('business/edit_project');?>",
                        data:{
                            kind:"pass",
                            id:id
                        },
                        success:function (data) {
                            swal("温馨提示！", "项目状态推进成功！", "success");
                            location.reload();
                        },
                        error:function () {

                        }
                    })
                });
        });

        //开发票
        $(".fapiao").on("click",function () {
            var id = $(this).attr("data-id");
            $('#dialog-fapiao').dialog("open");
            $('#dialog-fapiao').load("index.php?m=business&a=fapiao&id="+id);
        })

        //offer
        $(".offer").on("click",function () {
            var id = $(this).attr("data-id");
            var key = $(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-offer').dialog("open");
            $('#dialog-offer').load("/index.php?m=business&a=offer&id="+id+"&key="+key);
        })
        //入职
        $(".ruzhi").on("click",function () {
            var id = $(this).attr("data-id");
            var key = $(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-ruzhi').dialog("open");
            $('#dialog-ruzhi').load("index.php?m=business&a=ruzhi&id="+id+"&key="+key);
        })
        //费用变更
        $(".changefy").on("click",function () {
            var id = $(this).attr("data-id");
            var key = $(this).attr("data-key")?$(this).attr("data-key"):0;
            $('#dialog-changefy').dialog("open");
            $('#dialog-changefy').load("index.php?m=business&a=changefy&id="+id+"&key="+key);
        })

        $('.activs').click(function () {
            $('.activs').removeClass("currentstep");
            if($(this).attr("href")=="#log3"){
                $(".baccc").css("display","block");
                $(".ruzhi,.remove,.addbz,.changefy").css("display","none");
            }else{
                $(".baccc").css("display","none");
            }

            $(this).addClass("currentstep");
        })

        $(".lastac").click(function () {
            $('.activs').removeClass("currentstep");
            $(".baccc").css("display","block");
            $(".ruzhi,.remove,.addbz,.changefy").css("display","inline-block");
            $(this).addClass("currentstep");
        })

    })




</script>