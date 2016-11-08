<?php
require_once('inc/inc.php');
require_once('head_porp.php');


//========== 接收參數 op ==========

$act = ft($_POST['act'],1);
$type = ft($_POST['type'],1);

//========== 接收參數 ed ==========

?>
<div id="content" class="span10">
    <div class="span6" style="margin-left:auto; margin-right:auto; float:none;">
    	<form id="mod_form" name="mod_form" method="post" action="news_sys_act.php" class="bs-docs-example form-horizontal"s>
			<input type="hidden" name="act" id="act" value="synopsis_add" />
           	<div class="control-group">
                     <label class="control-label">標題：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="" name="title" id="title" class="input">
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="local_fee">簡述內容：</label>
                    <div class="controls">
						<textarea name="synopsis" id="synopsis" class="input" style="height:150px;"></textarea>
                    </div>
                </div>
 				
            	<div class="control-group">
                     <label class="control-label">狀態：</label>
                    <div class="controls" style="margin-top:5px;">
						<select id="status" name="status" class="input">
							<option value="0">正常顯示</option>
							<option value="1">隱藏</option>
						</select>
                    </div>
                </div>
           
            <div class="control-group"> 
                <label class="control-label" for="id"></label>
                <div class="controls">
                    <input type="reset" value="取消" class="btn" onClick="close_dialog();">&nbsp;
                    <input type="submit" class="btn btn-primary" value="新增" />
                </div>
            </div>
            
		</form>
    </div>
</div>
</div>

<?php
require_once('foot_porp.php');
?>
