<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys.php');


//========== 接收參數 op ==========

$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_boom = db_get_boom_list_bl($db,$id);
unset($arr_input);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('boom_sys_menu2.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 表演資訊</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="boom_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="boom_show_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
            	<div class="control-group">
                     <label class="control-label">地點：</label>
                    <div class="controls" style="margin-top:5px;">
						<textarea name="location" id="location" class="input-xxlarge" style="height:150px;"><?php echo $res_boom['bl_location'];?></textarea>
                    </div>
                </div>
            	<div class="control-group">
                     <label class="control-label">期限：</label>
                    <div class="controls" style="margin-top:5px;">
						<textarea name="duration" id="duration" class="input-xxlarge" style="height:150px;"><?php echo $res_boom['bl_duration'];?></textarea>
                    </div>
                </div>
            	<div class="control-group">
                     <label class="control-label">日期：</label>
                    <div class="controls" style="margin-top:5px;">
						<textarea name="date" id="date" class="input-xxlarge" style="height:50px;"><?php echo $res_boom['bl_show'];?></textarea>
                    </div>
                </div>
             	<div class="control-group">
                     <label class="control-label">影片：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_boom['bl_video'];?>" name="video" id="video" class="input-xxlarge">
                    </div>
                </div>
               
             	<div class="control-group">
                     <label class="control-label">購票連結：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_boom['bl_buy_now'];?>" name="buy" id="buy" class="input-xxlarge">
                    </div>
                </div>
               
             	<div class="control-group">
                     <label class="control-label">Workshop：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_boom['bl_workshop'];?>" name="workshop" id="workshop" class="input-xxlarge">
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
</script>
