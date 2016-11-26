<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);
$bu_id = ft($_GET['bu_id'],0);

//========== 接收參數 ed ==========

if($act == 'mod')
{
	//取得訊息資料
	$arr_input['bu_id'] = $bu_id;
	$res_bu = db_get_boom_user_one($db,$arr_input);
}

require_once('head_porp.php');
?>
<div id="content" class="span10">
    <div class="span6" style="margin-right:auto; float:none;">
    	<form id="mod_form" name="mod_form" method="post" action="boom_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
			<input type="hidden" name="act" id="act" value="artists_mod" />
			<input type="hidden" name="work_id" id="work_id" value="<?php echo $id;?>" />
			<input type="hidden" name="bu_id" id="bu_id" value="<?php echo $bu_id;?>" />
			<div class="control-group">
				 <label class="control-label">暱稱：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="<?php echo $res_bu['bu_uname'];?>" name="uname" id="uname" class="input-xxlarge">
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">國別：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="<?php echo $res_bu['bu_country'];?>" name="country" id="country" class="input-xxlarge">
				</div>
			</div>
			<?php
			if($res_bu['bu_image'] != '')
			{
				?>
				<div class="control-group">
					<div class="control-group">
						<label class="control-label" for="local_fee">目前圖片：</label>
						<div class="controls">
							<img src='../<?php echo $res_bu['bu_image'];?>' style='width:200px;height:150px;'>
						</div>
					</div>
				</div>
				<?php
			}
			?>
           	<div class="control-group">
				<div class="control-group">
					<label class="control-label" for="local_fee">圖片上傳：</label>
					<div class="controls">
						<input id="mypic" type="file" name="mypic">
					</div>
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">Artist Info：</label>
				<div class="controls" style="margin-top:5px;">
					<textarea id="info" name="info" class="ckeditor input-xxlarge" style="height:200px;"><?php echo $res_bu['bu_info'];?></textarea>
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">Concept of work：</label>
				<div class="controls" style="margin-top:5px;">
					<textarea id="concept" name="concept" class="ckeditor input-xxlarge" style="height:200px;"><?php echo $res_bu['bu_concept'];?></textarea>
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">Duration：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="<?php echo $res_bu['bu_duration'];?>" name="duration" id="duration" class="input-xxlarge">
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">Choreography：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="<?php echo $res_bu['bu_choreography'];?>" name="choreography" id="choreography" class="input-xxlarge">
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">Performance：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="<?php echo $res_bu['bu_performance'];?>" name="performance" id="performance" class="input-xxlarge">
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">Technician：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="<?php echo $res_bu['bu_technician'];?>" name="technician" id="technician" class="input-xxlarge">
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">Photographer：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="<?php echo $res_bu['bu_photographer'];?>" name="photographer" id="photographer" class="input-xxlarge">
				</div>
			</div>
			<div class="control-group">
				 <label class="control-label">Artist Link：</label>
				<div class="controls" style="margin-top:5px;">
					<input type="text" value="<?php echo $res_bu['bu_artist_link'];?>" name="artist_link" id="artist_link" class="input-xxlarge">
				</div>
			</div>
            <div class="control-group"> 
                <label class="control-label" for="id"></label>
                <div class="controls">
                    <input type="reset" value="取消" class="btn" onClick="close_dialog();">&nbsp;
                    <input type="submit" class="btn btn-primary" value="送出" />
                </div>
            </div>
            
		</form>
    </div>
</div>

<?php
require_once('foot_porp.php');
?>
