$(() => {
  const dialog = $(".ideDialog");
  const btn = $(".ideBtn");
  // let content = '';//接收编辑器内容
  let temp = $(`<div class="ideBox">
                    <span class='ideNotice'>请将简历内容粘贴在此处:</span>
                    <div class="ide">
                      <script id="container" name="content" type="text/plain"></script>
                    </div>
                    <div class='btnBox'>
                        <div>关&nbsp;闭</div>
                        <div>查&nbsp;重</div>
                    </div>
                </div>`);
  dialog.append(temp);
  var ue = UE.getEditor('container');
  //打开
  btn.click(() => {
    dialog.css("display", "block");
  });
  //关闭
  $(".btnBox div:nth-child(1)").click(() => {
    dialog.css("display", "none");
    ue.setContent('');
  });
  //提交
  $(".btnBox div:nth-child(2)").click(() => {
    var content = ue.getContent();
    if(content==''){
      alert_crm("您还未粘贴简历内容！");
      return
    }
    $.ajax({
      url: "index.php?m=product&a=checkReuse",
      data: { content: content },
      type: "post",
      success(res) {}
    });
  });
});
