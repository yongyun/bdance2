<?php
require_once('inc/inc.php');
require_once('head.php');


//========== 接收參數 op ==========

$act = ft($_POST['act'],0);
$url = ft($_POST['url'],1);
$name = ft($_POST['name'],1);

//========== 接收參數 ed ==========

?>
<div id="content" class="span10">
<div class="row-fluid sortable ui-sortable">
<!-- content op -->
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>建立帳號資訊</h2>
        </div>
        <div class="box-content">
            <form name="form1" id="form1" enctype="multipart/form-data" class="form-horizontal" accept-charset="utf-8" method="post" action="add_new_member_sys_act.php">			
                <fieldset>
                	<legend>建立後台帳號資訊</legend>
					<div class="control-group">
						<label class="control-label" for="focusedInput">帳號<span class="red">*</span>：</label>
						<div class="controls">
							<input type="text" placeholder="請輸入帳號" value="" size="30" name="new_account" id="new_account" class="input-xlarge focused">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01">密碼<span class="red">*</span>：</label>
						<div class="controls">
							<input type="password" placeholder="請輸入密碼" value="" size="30" name="new_password" id="new_password" class="input-xlarge focused">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="input01">密碼確認<span class="red">*</span>：</label>
						<div class="controls">
							<input type="password" placeholder="請輸入密碼" value="" size="30" name="new_password_check" id="new_password_check" class="input-xlarge focused">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01">e-mail<span class="red">*</span>：</label>
						<div class="controls">
							<input type="text" placeholder="請輸入e-mail" value="" size="30" name="email" id="email" class="input-xlarge focused">
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
	if(!checkempty('new_account','帳號')) return false;
	if(!checkempty('new_password','密碼')) return false;
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