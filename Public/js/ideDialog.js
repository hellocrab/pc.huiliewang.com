
$(()=>{
    const dialog = $('.ideDialog');
    const btn = $('.ideBtn');
    // let content = '';//接收编辑器内容
    let temp = $(`<div class="ideBox">
                    <span class='ideNotice'>请将简历内容粘贴在此处:</span>
                    <div class="ide">
                    <textarea id="editor" name="content" style="width:700px;height:300px;">
                    </textarea>
                    </div>
                    <div class='btnBox'>
                        <div>关&nbsp;闭</div>
                        <div>查&nbsp;重</div>
                    </div>
                </div>`)
    dialog.append(temp)
    //打开
    // $('.ide').notebook();
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor');
    });
    btn.click(()=>{
        dialog.css('display','block')
    })
    //关闭
    $('.btnBox div:nth-child(1)').click(()=>{
        dialog.css('display','none')
    })
    //获取富文本编辑器内容
    $('.ide').on('contentChange', function(e) {
        content = e.originalEvent.detail.content;
    });
    //提交
    $('.btnBox div:nth-child(2)').click(()=>{
        let content = editor.html();
        $.ajax({
            url:"index.php?m=product&a=checkReuse",
            data:{content:content},
            type:'post',
            success(res){

            }

        })
    })
});
