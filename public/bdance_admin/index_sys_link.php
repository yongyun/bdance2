<?php
require_once('inc/inc.php');
require_once('func/func_index_sys.php');

//取得訊息資料
$res_fb = db_get_menu_link($db,1);
$res_vimeo = db_get_menu_link($db,2);
$res_axearts = db_get_menu_link($db,3);


require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('index_sys_menu.php');?>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 站外連結</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="index_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="link_mod" />
            	<div class="control-group">
                     <label class="control-label">FB：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_fb['ml_link'];?>" name="fb_link" id="fb_link" class="input-xxlarge">
                    </div>
                </div>
            	<div class="control-group">
                     <label class="control-label">Vimeo：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_vimeo['ml_link'];?>" name="vimeo_link" id="vimeo_link" class="input-xxlarge">
                    </div>
                </div>
            	<div class="control-group">
                     <label class="control-label">Axearts：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_axearts['ml_link'];?>" name="axearts_link" id="axearts_link" class="input-xxlarge">
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
