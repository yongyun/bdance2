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
            <h2> 細節</h2>
        </div>
		<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
			<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
			<input type="hidden" name="act" id="act" value="details_mod" />
			<div class="box-content">
				<div class="control-group">
					<div>
						演出時間:
						<input type="text" name="duration" id="duration" class="input-xxlarge" value="<?php echo $res_data[0]['duration'];?>" placeholder="請輸入幾分鐘" />
				    </div>
				</div>
				<div class="control-group">
					<div>
						首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;映:
						<input type="text" name="premiere" id="premiere" class="input-xxlarge" value="<?php echo $res_data[0]['premiere'];?>" placeholder="請輸入日期及地點" />
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
