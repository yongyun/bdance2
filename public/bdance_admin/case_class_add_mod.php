<?php
require_once('inc/inc.php');
require_once('func/func_case_class_add_mod.php');

//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

switch($act)
{
	case 'add':
		$title = '建立案件區域';
	break;

	case 'mod':
		$title = '修改案件區域資訊';
		if($id == '')
		{
			js_alert('參數錯誤');
			exit();
		}

		//防呆
		$res_class = db_get_system_case_class($db,$id);

		if($res_class['cnt'] == 0)
		{
			js_alert('資料錯誤');
			exit();
		}
	break;
}

require_once('head_porp.php');
?>
<div id="content" class="span10">
<div class="row-fluid sortable ui-sortable">
<!-- content op -->
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i><?php echo $title;?></h2>
        </div>
        <div class="box-content">
            <form name="form1_member" id="form1_member" enctype="multipart/form-data" class="form-horizontal" accept-charset="utf-8" method="post" action="case_class_add_mod_act.php">
                <fieldset>
					<div class="control-group">
						<label class="control-label" for="focusedInput">區域名稱<span class="red">*</span>：</label>
						<div class="controls">
							<input type="text" placeholder="請輸入區域名稱" value="<?php echo $res_class['scc_name'];?>" size="30" name="case_name" id="case_name" class="input-xlarge focused">
						</div>
					</div>
					<div id="action_single" class="form-actions">
						<input type="reset" value="取消" class="btn" onClick="close_dialog();">&nbsp;
						<input type="button" value="送出" class="btn-primary btn" onClick="checkForm();">
					</div>
                </fieldset>
				<input type="hidden" id="act" name="act" value="<?php echo $act;?>">
				<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            </form>
        </div>
    </div>
</div>
<!-- content ed -->
</div>
</div>

<script>
function checkForm()
{
	var act = $('#act').val();
	if(!checkempty('case_name','區域名稱')) return false;

	$('#form1_member').submit();
}
</script>

<?php
require_once('foot.php');
?>
<!-- db_close op -->
<?php require_once('inc/close_db.php'); ?>
<!-- db_close ed -->
