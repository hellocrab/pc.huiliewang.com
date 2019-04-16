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
      success(res) {
        if(res.status===0){
          alert_crm(res.info);
          dialog.css("display", "none");
          ue.setContent('');
        }else{
          let con = '';
          for(let i = 0;i<res.data.length;i++){
            let url = "/index.php?m=product&a=view&id="+res.data[i]
            con = con + `<a href="`+url+`" target="_blank" >相似简历`+(i+1)+`</a>`
          }
          let temp = $(`<div class="showBox">
            <div class="show_">
              <i class="fa fa-times closeShow"></i>
              <p>查找到`+res.data.length+`
              份相似简历</p><div class="links">
              `+con+`
              </div>
            </div>
          </div>`);
          $('.ideBox').append(temp);
          $('.closeShow').click(ev=>{
            $('.showBox ').remove();
          })
        }
      }
    });
  });
});
