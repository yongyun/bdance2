<?php
require_once('inc/inc.php');
require_once('func/func_message_sys.php');


//========== 接收參數 op ==========

$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

$arr_page['page_limit'] = 1;  

//取得訊息資料
$arr_input['id'] = $id;
$res_message = db_get_messages($db,$arr_input,$arr_page);
unset($arr_input);

require_once('head_porp.php');
?>
<div id="content" class="span10">
    <div class="span6" style="margin-left:auto; margin-right:auto; float:none;">
		<div class="control-group">
			<div class="control-group">
				<label class="control-label" for="local_fee">留言時間：</label>
				<div class="controls">
					<?php echo $res_message[0]['created_at'];?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="control-group">
				<label class="control-label" for="local_fee">暱稱：</label>
				<div class="controls">
					<?php echo $res_message[0]['name'];?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="control-group">
				<label class="control-label" for="local_fee">信箱：</label>
				<div class="controls">
					<?php echo $res_message[0]['email'];?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="control-group">
				<label class="control-label" for="local_fee">訊息內容：</label>
				<div class="controls">
					<?php echo nl2br($res_message[0]['message']);?>
				</div>
			</div>
		</div>
    </div>
</div>
</div>

<?php
require_once('foot_porp.php');
?>
