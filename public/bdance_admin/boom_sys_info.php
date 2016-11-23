<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========
//取得訊息資料
$res_data = db_get_boom_list_one($db,$id);

require_once('head.php');

?>
<div id="content" class="span10">
<?php require_once('boom_sys_menu2.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 列表資訊</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="boom_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="ad_images_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<div class="control-group">
					<label class="control-label">標題：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_data['bl_title'];?>" name="title" id="title" class="input">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee">圖片上傳：</label>
					<div class="controls">
						<input id="mypic" type="file" name="mypic">
					</div>
				</div>
			
				<div class="control-group">
					<div class="controls">
						<?php
						if($res_data['bl_image'] != '')
						{
							?>
							<img src='../<?php echo $res_data['bl_image'];?>' style='width:200px;height:150px;'>
							<?php
						}
						?>
					</div>
				</div>
				
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="新增" />
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
<script>
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
