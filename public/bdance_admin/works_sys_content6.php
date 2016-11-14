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
$res_video = db_get_projects($db,$arr_input,$arr_page);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('works_sys_menu.php');?>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 影片設定</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="video_add" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                <div class="control-group">
                    <div>
                        <input type="text" value="<?php echo $res_video[0]['video_url'];?>" placeholder="請輸入影片網址" name="video" id="video" class="input-xxlarge">
						<input type="submit" class="btn btn-primary" value="確認" />
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
