<?php
require_once('inc/inc.php');

//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$url = ft($_GET['url'],1);

//========== 接收參數 ed ==========


require_once('head.php');
?>
<div id="content" class="span10">
<div class="row-fluid sortable ui-sortable">
<!-- content op -->
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>帳號資訊</h2>
        </div>
        <div class="box-content">
            <form name="form1" id="form1" enctype="multipart/form-data" class="form-horizontal" accept-charset="utf-8" method="post" action="user_system_act.php">	
				<input type="hidden" name="url" id="url" value="<?php echo $url;?>">
				<input type="hidden" name="act" id="act" value="<?php echo $act;?>">
                <fieldset>
                	<legend>帳號資訊</legend>
					<div class="control-group">
						<label class="control-label" for="focusedInput">帳號<span class="red">*</span>：</label>
						<div class="controls">
							<?php
							if($act == 'mod')
							{
								echo $mem_info['name'];
							}
							else
							{
								?>
								<input type="text" placeholder="請輸入帳號" value="" size="30" name="new_account" id="new_account" class="input-xlarge focused">
								<?php
							}
							?>
						</div>
					</div>
					<?php
					if($act == 'mod')
					{
						?>
						<div class="control-group">
							<label class="control-label" for="input01">原密碼<span class="red">*</span>：</label>
							<div class="controls">
								<input type="password" placeholder="請輸入現在密碼" value="" size="30" name="old_password" id="old_password" class="input-xlarge focused">
							</div>
						</div>
						<?php
					}
					?>
					<div class="control-group">
						<label class="control-label" for="input01"><?php if($act == 'mod'){ echo '新';}?>密碼<span class="red">*</span>：</label>
						<div class="controls">
							<input type="password" placeholder="請輸入新密碼" value="" size="30" name="new_password" id="new_password" class="input-xlarge focused">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="input01"><?php if($act == 'mod'){ echo '新';}?>密碼確認<span class="red">*</span>：</label>
						<div class="controls">
							<input type="password" placeholder="請輸入新密碼" value="" size="30" name="new_password_check" id="new_password_check" class="input-xlarge focused">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="input01">e-mail<span class="red">*</span>：</label>
						<div class="controls">
							<input type="text" placeholder="請輸入e-mail" size="30" name="email" id="email" class="input-xlarge focused" value="<?php echo $mem_info['email'];?>">
						</div>
					</div>
					
					<div id="action_single" class="form-actions">
						<input type="reset" value="取消" class="btn" onClick="javascript:history.back();">&nbsp;
						<input type="button" value="送出" class="btn-primary btn" onClick="checkForm();">
					</div>
                </fieldset>
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
	<?php
	if($act == 'mod')
	{
		?>
		if($('#old_password').val() != '')
		{
			if(!checkempty('old_password','原密碼')) return false;
			if(!checkempty('new_password','新密碼')) return false;
		}
		<?php
	}
	else
	{
		?>
		if(!checkempty('new_account','帳號')) return false;
		if(!checkempty('new_password','密碼')) return false;
		<?php
	}
	?>
	if(!checkempty('email','e-mail')) return false;
		
	$('#form1').submit();
}
</script>

<?php
require_once('foot.php');
?>
<!-- db_close op --> 
<?php require_once('inc/close_db.php'); ?>
<!-- db_close ed --> 