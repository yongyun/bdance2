<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys.php');

//取得訊息資料
$res_boom = db_get_boom_info($db,1);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('boom_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> Concept of B.OOM</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="boom_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="boom_mod" />
            	<div class="control-group">
                    <div class="controls" style="margin-top:5px;">
						<textarea name="bi_info" id="bi_info" class="input-xxlarge" style="height:300px;width:90%;"><?php echo $res_boom['bi_info'];?></textarea>
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
</div>
        <!-- content ends -->
        </div>
    </div>

<?php
require_once('foot.php');
?>
