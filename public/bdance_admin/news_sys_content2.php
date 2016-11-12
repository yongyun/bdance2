<?php
require_once('inc/inc.php');
require_once('func/func_news_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

$arr_page['page_limit'] = 1;  
//取得訊息資料
$arr_input['nw_id'] = $id;
$res_news = db_get_news($db,$arr_input,$arr_page);
unset($arr_input);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('news_sys_menu.php');?>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 抬頭內容</h2>
        </div>
		<form id="mod_form" name="mod_form" method="post" action="news_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
			<div class="box-content">
				<input type="hidden" name="act" id="act" value="content_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<div class="control-group">
					<div>
						<textarea id="top_content" name="top_content" class="ckeditor" style="width:99%; height:200px;"><?php echo $res_news[0]['nw_top_content'];?></textarea>
				   </div>
				</div>
			</div>
			<div class="box-header well" data-original-title="">
				<h2> 中間內容</h2>
			</div>
			<div class="box-content">
				<div class="control-group">
					<div>
						<textarea id="content" name="content" class="ckeditor" style="width:99%; height:200px;"><?php echo $res_news[0]['nw_content'];?></textarea>
				   </div>
				</div>
				
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="修改" />
					</div>
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
