<?php
require_once('inc/inc.php');
require_once('func/func_works_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

$arr_page['page_limit'] = 1;  
//取得訊息資料
$arr_input['id'] = $id;
$res_data = db_get_projects($db,$arr_input,$arr_page);
unset($arr_input);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('works_sys_menu.php');?>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2>作品封面設定Project Setting</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="synopsis_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
            	<div class="control-group">
                     <label class="control-label">作品名稱：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_data[0]['name'];?>" name="title" id="title" class="input">
                    </div>
                </div>
			
				<div class="control-group">
					<label class="control-label">簡述或作品標語：</label>
					<div class="controls" style="margin-top:5px;">
						<textarea id="intro" name="intro" style="width:99%; height:80px;"><?php echo $res_data[0]['intro'];?></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee">首演日期：</label>
					<div class="controls">
						<input id="perform_date" type="text" name="perform_date" style="width:170px;" value="<?php echo $res_data[0]['perform_date'];?>" class="hasDatepicker">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee">封面圖上傳：</label>
					<div>
						<a class="btn btn-outline-success" style="background: #ffd400; margin-left: 20px;" href="http://www.fotor.com/app.html#!module/basic/tool/BasicEdits" target="_blank">圖片修改工具 Edit Image
						</a>
					</div>
					<div class="controls">
						<p>Step1：請先編輯圖片大小，size為700X700px的1:1正方形圖片</p>
						<ul style="font-size: 12px;">
							<li>1-1：點選畫面中上方Button[Open]打開欲編輯圖像（Add photo first）</li>
							<li>1-2：左方有Basic Edit Bar，進入[CROP]，輸入數值700x700</li>
							<li>1-3：畫面中，移動正方形位置，擺置封面圖範圍</li>
							<li>1-4：畫面上方Button點選[Save]，完成。</li>
						</ul>
						<p>Step2：選擇Choose File，上傳編輯後的圖片</p>
						<input class="btn btn-outline-success" id="mypic" type="file" name="mypic">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee">目前封面圖：</label>
					<div class="controls">
						<img src='../<?php echo $res_data[0]['feature_img'];?>' style='width:200px;'>
					</div>
				</div>

				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="修改" />
					</div>
				</div>
				
			</form>
        </div>
    </div>
</div>
        <!-- content ends -->
        </div>
    </div>

<?php
require_once('foot.php');
?>
<script type="text/javascript">
$(function () {	
	$(".delimg").live('click',function(){
		var pic = $(this).attr("rel");
		$.post("news_sys_act.php?act=delimg",{image_id:pic},function(msg){
			if(msg==1){
				location.reload();
			}else{
				alert(msg);
			}
		});
	});
});
layui.use('laydate', function(){
  var laydate = layui.laydate;
  
  var start = {
    min: '2015-01-01 23:59:59',
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
