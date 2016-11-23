<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_news = db_get_boom_list_bl($db,$id);
unset($arr_input);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('boom_sys_menu2.php');?>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 說明</h2>
        </div>
		<form id="mod_form" name="mod_form" method="post" action="boom_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
			<div class="box-content">
				<input type="hidden" name="act" id="act" value="content_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<div class="control-group">
					<div>
						<textarea id="top_content" name="top_content" class="ckeditor" style="width:99%; height:200px;"><?php echo $res_news['bl_content'];?></textarea>
				   </div>
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
        <!-- content ends -->
        </div>
    </div>

<?php
require_once('foot.php');
?>
