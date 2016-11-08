<?php
require_once('inc/inc.php');
require_once('func/func_news_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_images = db_get_news_ad($db,$id);
require_once('head.php');
?>
<div id="content" class="span10"><div class="row-fluid sortable ui-sortable">
	<div class="box span12">
      	<div class="box-header well">
            <div class="box-icon">
                <a class="btn btn-minimize btn-round" href="index.php"><i class="icon-chevron-up"></i></a>
            </div>
            <h2><i class="icon-th-list"></i> 顯示切換</h2>
        </div>
        <div class="box-content" style="display: block;">
            <a class="btn btn-outline-success" href="news_sys_content1.php?id=<?php echo $id;?>">簡述內容</a>
			<a class="btn btn-outline-success" href="news_sys_content.php?id=<?php echo $id;?>">輪播圖片</a>
			<a class="btn btn-outline-success" href="news_sys_content2.php?id=<?php echo $id;?>">內容說明</a>
			<a class="btn btn-outline-success" href="news_sys_content3.php?id=<?php echo $id;?>">影片設定</a>
			<a class="btn btn-outline-success" href="news_sys_content4.php?id=<?php echo $id;?>">相關連結設定</a>
        </div>  
	</div>
</div>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 輪播圖片</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="news_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="ad_images_add" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<div class="control-group">
					 <label class="control-label">說明：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="" name="description" id="description" class="input">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee">圖片上傳：</label>
					<div class="controls">
						<input id="mypic" type="file" name="mypic">
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
						<img src='../upload/news/<?php echo $row['na_image'];?>' style='width:200px;height:150px;'>
					</div>
					<div class='delimg btn' style='color:#000;width:50px;margin-bottom:10px;' rel='<?php echo $row['na_id'];?>'>删除</div>
					<div class='editimg btn' style='color:#000;width:50px;margin-bottom:10px;display:none;' rel='<?php echo $row['na_id'];?>'>修改</div>
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
		$.post("news_sys_act.php?act=delimg",{image_id:pic},function(msg){
			if(msg==1){
				location.reload();
			}else{
				alert(msg);
			}
		});
	});
});
</script>
