<?php
require_once('inc/inc.php');
require_once('func/func_works_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);
$tid = ft($_GET['tid'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_images = db_get_photos($db,$id);

if($tid != '')
{
	$res_view = db_get_photos_one($db,$tid);
}
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('works_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 輪播圖片</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="ad_images_add" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<input type="hidden" name="tid" id="tid" value="<?php echo $tid;?>" />
				<div class="control-group">
					 <label class="control-label">說明：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['description'];?>" name="description" id="description" class="input">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee">圖片上傳：</label>
					<div class="controls">
						<input id="mypic" type="file" name="mypic[]" <?php if($tid == '') echo 'multiple';?>>
					</div>
				</div>
				<?php
				if($tid == '')
				{
					?>
					<div class="control-group">
						<div class="controls">
							溫馨小提醒：按住 Ctrl 可選擇多張圖。
						</div>
					</div>
					<?php
				}
				?>
				
				<?php
				if($res_view['url'] != '')
				{
					?>
					<div class="control-group">
						<div class="controls" id="view_pic">
							<img src='../<?php echo $res_view['url'];?>' style='width:200px;height:150px;'>
						</div>
					</div>
					<?php
				}
				?>
				
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="送出" />
						<a class="btn btn-outline-success" href="works_sys_content2.php?id=<?php echo $id;?>">取消</a>

						</div>
				</div>
				
			</form>
        </div>
    </div>
</div>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 輪播圖片列表</h2>
        </div>
        <div class="box-content">
			<div>
				<?php 
				if(isset($res_images))
				{
					foreach($res_images as $i => $row)
					{
						?>
						<div style='float:left;margin-right:30px;'>
							<div>
								<img src='../<?php echo $row['url'];?>' style='width:200px;height:150px;'>
							</div>
							<div class='delimg btn' style='color:#000;width:50px;margin-bottom:10px;' rel='<?php echo $row['id'];?>'>删除</div>
							<a class="btn btn-warning btn-small" href="works_sys_content2.php?id=<?php echo $row['work_id'];?>&tid=<?php echo $row['id'];?>">修改</a>
						</div>
						<?php
					}
				}
				?>
			</div>
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
		$.post("works_sys_act.php?act=delimg",{image_id:pic},function(msg){
			if(msg==1){
				location.reload();
			}else{
				alert(msg);
			}
		});
	});
});
</script>
