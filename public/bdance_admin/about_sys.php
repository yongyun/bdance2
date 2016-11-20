<?php
require_once('inc/inc.php');
require_once('func/func_about_sys.php');

//取得訊息資料
$res_slogan = db_get_slogan($db,1);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('about_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> Slogan</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="about_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="slogan_mod" />
            	<div class="control-group">
                     <label class="control-label">Slogan：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_slogan['name'];?>" name="name" id="name" class="input-xxlarge">
                    </div>
                </div>
            	<div class="control-group">
                     <label class="control-label">說明：</label>
                    <div class="controls" style="margin-top:5px;">
						<textarea name="ps" id="ps" class="input-xxlarge" style="height:150px;"><?php echo $res_slogan['ps'];?></textarea>
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
