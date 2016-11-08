<?php
require_once('inc/inc.php');
require_once('func/func_user_sys_add_mod.php');

//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

switch($act)
{
	case 'add':
		$title = '建立帳號資訊';
	break;

	case 'mod':
		$title = '修改帳號資訊';
		if($id == '')
		{
			js_alert('參數錯誤');
			exit();
		}

		//查詢帳號
		$res_mem = db_get_member($db,$id);

		if($res_mem == '')
		{
			js_alert('資料錯誤，查無此帳號');
			exit();
		}
	break;
}

//權限身份
$res_class = db_get_system_user_class($db);

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
            <form name="form1_member" id="form1_member" enctype="multipart/form-data" class="form-horizontal" accept-charset="utf-8" method="post" action="user_sys_add_mod_act.php">
                <fieldset>
					<div class="control-group">
						<label class="control-label" for="focusedInput">帳號<span class="red">*</span>：</label>
						<?php
						if($act == 'add')
						{
							?>
							<div class="controls">
								<input type="text" placeholder="請輸入帳號" value="" size="30" name="new_account" id="new_account" class="input-xlarge focused">
							</div>
							<?php
						}
						if($act == 'mod')
						{
							?>
							<div class="controls"><?php echo $res_mem['m_user'];?></div>
							<?php
						}
						?>
					</div>
					<?php
					if($act == 'mod')
					{
						?>
						<div class="control-group">
							<label class="control-label" for="input01">密碼：</label>
							<div class="controls">
								<a id="old_vpd1" href="javascript:void(0);" onclick="up_view_password(0)">更換密碼</a>
								<a id="old_vpd2" href="javascript:void(0);" style="display:none;" onclick="up_view_password(1)">取消密碼更換</a>
							</div>
						</div>
						<?php
					}
					?>
					<div class="control-group" id="vpd" <?php if($act == 'mod'){ echo 'style="display:none;"';}?>>
						<label class="control-label" for="input01">密碼<span class="red">*</span>：</label>
						<div class="controls">
							<input type="password" placeholder="請輸入密碼" value="" size="30" name="new_password" id="new_password" class="input-xlarge focused">
						</div>
					</div>

					<div class="control-group" id="vpd_check" <?php if($act == 'mod'){ echo 'style="display:none;"';}?>>
						<label class="control-label" for="input01">密碼確認<span class="red">*</span>：</label>
						<div class="controls">
							<input type="password" placeholder="請輸入密碼" value="" size="30" name="new_password_check" id="new_password_check" class="input-xlarge focused">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="input01">暱稱<span class="red">*</span>：</label>
						<div class="controls">
							<input type="text" placeholder="請輸入姓名" value="<?php echo $res_mem['m_name'];?>" size="30" name="name" id="name" class="input-xlarge focused">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="input01">e-mail<span class="red">*</span>：</label>
						<div class="controls">
							<input type="text" placeholder="請輸入e-mail" value="<?php echo $res_mem['m_email'];?>" size="30" name="email" id="email" class="input-xlarge focused">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01">身份權限<span class="red">*</span>：</label>
						<div class="controls">
							<select name="type" id="type" class="input-xlarge focused">
								<option value="">請選擇</option>
								<?php
								if(count($res_class) > 0)
								{
									foreach($res_class as $key => $row)
									{
										$selected = ($row['suc_id'] == $res_mem['m_type'])? 'selected':'';
										echo '<option value="'.$row['suc_id'].'" '.$selected.'>'.$row['suc_name'].'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>

					<div id="action_single" class="form-actions">
						<input type="reset" value="取消" class="btn" onClick="close_dialog();">&nbsp;
						<input type="button" value="送出" class="btn-primary btn" onClick="checkForm();">
					</div>
                </fieldset>
				<input type="hidden" id="act" name="act" value="<?php echo $act;?>">
				<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
				<input type="hidden" id="mod_pd" name="mod_pd" value="">
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
	var mod_pd = $('#mod_pd').val();
	if(act == 'add')
	{
		if(!checkempty('new_account','帳號')) return false;
		if(!checkempty('new_password','密碼')) return false;
	}
	if(act == 'mod')
	{
		if(mod_pd == 'mod_pd')
		{
			if(!checkempty('new_password','密碼')) return false;
		}
	}
	if(!checkempty('name','暱稱')) return false;
	if(!checkempty('email','e-mail')) return false;
	if(!checkempty('type','身份權限')) return false;

	$('#form1_member').submit();
}
function up_view_password(type)
{
	if(type == 0)
	{
		$('#mod_pd').val('mod_pd');
		$('#old_vpd1').hide();
		$('#old_vpd2').show();
		$('#vpd').show();
		$('#vpd_check').show();
	}
	else
	{
		$('#mod_pd').val('');
		$('#old_vpd1').show();
		$('#old_vpd2').hide();
		$('#vpd').hide();
		$('#vpd_check').hide();
	}

}
</script>

<?php
require_once('foot.php');
?>
<!-- db_close op -->
<?php require_once('inc/close_db.php'); ?>
<!-- db_close ed -->
