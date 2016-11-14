<?php
require_once('inc/inc.php');
require_once('func/func_works_sys.php');


//========== 接收參數 op ==========

$id = ft($_GET['id'],0);
$sid = ft($_GET['sid'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_images = db_get_stuffs($db,$id);
if($sid != '')
{
	$res_view = db_get_stuffs_one($db,$sid);
}
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('works_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 成員設定</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="stuffs_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<input type="hidden" name="sid" id="sid" value="<?php echo $sid;?>" />
				<div class="control-group">
					 <label class="control-label">類別：</label>
					<div class="controls" style="margin-top:5px;">
						<select id="type" name="type">
							<option value="primary" <?php if($res_view['type'] == 'primary') echo 'selected';?>>Main Staff</option>
							<option value="secondary" <?php if($res_view['type'] == 'secondary') echo 'selected';?>>Staff</option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					 <label class="control-label">暱稱：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['name'];?>" name="name" id="name" class="input">
					</div>
				</div>
				
				<div class="control-group">
					 <label class="control-label">身分：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['role'];?>" name="role" id="role" class="input">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee">圖片上傳：</label>
					<div class="controls">
						<input id="mypic" type="file" name="mypic">
					</div>
				</div>
				
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="送出" />
						<a class="btn btn-outline-success" href="works_sys_content8.php?id=<?php echo $id;?>">取消</a>
					</div>
				</div>
				
			</form>
        </div>
    </div>
</div>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 成員列表</h2>
        </div>
        <div class="box-content">
			<div>
				<?php 
				if(isset($res_images))
				{
					foreach($res_images as $i => $row)
					{
						?>
						<div style='float:left;margin-right:30px;'>
							<div>
								<img src='../<?php echo $row['photo'];?>' style='width:200px;height:150px;'>
							</div>
							<div>
								<?php echo $row['name'];?>
							</div>
							<div>
								<?php 
								if($row['type'] == 'primary') 
								{ 
									echo 'Main Staff';
								}
								else
								{
									echo 'Staff';	
								}
								?>
							</div>
							<div>
								<?php echo $row['role'];?>
							</div>
							<div class='delimg btn' style='color:#000;width:50px;margin-bottom:10px;' rel='<?php echo $row['id'];?>' onclick="del_stuffs('<?php echo $row['id'];?>','<?php echo $row['work_id'];?>')">删除</div>
							<div class='editimg btn' style='color:#000;width:50px;margin-bottom:10px;' rel='<?php echo $row['id'];?>' onclick="mod_stuffs('<?php echo $row['id'];?>','<?php echo $row['work_id'];?>')">修改</div>
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
function del_stuffs(sid,id)
{
	if(confirm("確定刪除 ?"))
	{
		window.location.href='works_sys_act.php?act=del_stuffs&id=' + id + '&sid=' + sid;
	}
}
function mod_stuffs(sid,id)
{
	window.location.href='works_sys_content8.php?id=' + id + '&sid=' + sid;
}
</script>
