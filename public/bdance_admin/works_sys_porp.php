<?php
require_once('inc/inc.php');
require_once('head_porp.php');


//========== 接收參數 op ==========

$act = ft($_POST['act'],1);
$type = ft($_POST['type'],1);

//========== 接收參數 ed ==========

?>
<div id="content" class="span10">
    <div class="span6" style="margin-left:auto; margin-right:auto; float:none;">
    	<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
			<input type="hidden" name="act" id="act" value="synopsis_add" />
           	<div class="control-group">
				<label class="control-label">標題：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="" name="title" id="title" class="input">
				</div>
			</div>
			
           	<div class="control-group">
				<label class="control-label">訊息：</label>
				<div class="controls" style="margin-top:5px;">
					<textarea id="intro" name="intro" style="width:99%; height:80px;"></textarea>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="local_fee">作品日期：</label>
				<div class="controls">
					<input id="perform_date" type="text" name="perform_date" style="width:170px;" value="" class="hasDatepicker">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="local_fee">封面圖上傳：</label>
				<div class="controls">
					<input id="mypic" type="file" name="mypic">
					
				</div>
			</div>
			
           
            <div class="control-group"> 
                <label class="control-label" for="id"></label>
                <div class="controls">
                    <input type="reset" value="取消" class="btn" onClick="close_dialog();">&nbsp;
                    <input type="submit" class="btn btn-primary" value="新增" />
                </div>
            </div>
            
		</form>
    </div>
</div>
</div>

<?php
require_once('foot_porp.php');
?>
<script>
layui.use('laydate', function(){
  var laydate = layui.laydate;
  
  var start = {
    min: '1900-01-01 23:59:59',
    max: '2099-06-16 23:59:59',
    istoday: false,
    choose: function(datas)
	{
      end.min = datas;
      end.start = datas;
    }
  };
  
  document.getElementById('perform_date').onclick = function(){
    start.elem = this;
    laydate(start);
  }
});
</script>
