<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$arr_input['id'] = $id;
$res_images = db_get_boom_user($db,$arr_input);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('boom_sys_menu2.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> Artists</h2>
        </div>
		<button class="btn btn-large btn-primary" onclick="dialog_set('boom_sys_artists_porp.php?act=add&id=<?php echo $id;?>','新增資料',850,550);" style="float:left;">新增資料</button><br><br>
       <div class="box-content">
			<div>
				<?php 
				if(isset($res_images))
				{
					foreach($res_images as $i => $row)
					{
						?>
						<div style='float:left;margin-right:30px;'>
							<div style='text-align: center;'>
								<img src='../<?php echo $row['bu_image'];?>' style='width:200px;height:150px;'>
								</br>
								<?php echo $row['bu_uname'].'</br>'.$row['bu_country'];?>
							</div>
							<div class='delimg btn' style='color:#000;width:50px;margin-bottom:10px;' rel='<?php echo $row['bu_id'];?>'>删除</div>
							<div class='editimg btn' style='color:#000;width:50px;margin-bottom:10px;' rel='<?php echo $row['bu_id'];?>' onclick="dialog_set('boom_sys_artists_porp.php?act=mod&id=<?php echo $row['bu_work'];?>&bu_id=<?php echo $row['bu_id'];?>','修改資料',850,550);">修改</div>
						</div>
						<?php
					}
				}
				?>
			</div>
        </div>
    </div>
</div>
        <!-- content ends -->
        </div>
    </div>

<?php
require_once('foot.php');
?>
<script type="text/javascript">
$(function () {	
	$(".delimg").live('click',function(){
		var pic = $(this).attr("rel");
		$.post("boom_sys_act.php?act=del_artists",{image_id:pic},function(msg){
			if(msg==1){
				location.reload();
			}else{
				alert(msg);
			}
		});
	});
});
</script>
