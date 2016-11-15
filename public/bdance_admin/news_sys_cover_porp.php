<?php
require_once('inc/inc.php');
require_once('head_porp.php');


//========== 接收參數 op ==========

$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

?>
<div id="content" class="span10">
    <div class="span6" style="margin-left:auto; margin-right:auto; float:none;">
    	<form id="mod_form" name="mod_form" method="post" action="news_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
			<input type="hidden" name="act" id="act" value="cover_add" />
			<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
           	<div class="control-group">
				<div class="control-group">
					<label class="control-label" for="local_fee">圖片上傳：</label>
					<div class="controls">
						<input id="mypic" type="file" name="mypic">
					</div>
				</div>
           
            <div class="control-group"> 
                <label class="control-label" for="id"></label>
                <div class="controls">
                    <input type="reset" value="取消" class="btn" onClick="close_dialog();">&nbsp;
                    <input type="submit" class="btn btn-primary" value="上傳" />
                </div>
            </div>
            
		</form>
    </div>
</div>
</div>

<?php
require_once('foot_porp.php');
?>
