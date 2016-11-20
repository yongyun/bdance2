<?php
require_once('inc/inc.php');
require_once('func/func_about_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_data = db_get_about_awards($db);

if($id != '')
{
	$res_view = db_get_about_awards_one($db,$id);
}
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('about_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> Awards</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="about_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="awards_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<div class="control-group">
					<label class="control-label">標題：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['title'];?>" name="title" id="title" class="input-xxlarge">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">賽別：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['description'];?>" name="description" id="description" class="input-xxlarge">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">獎項：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['awardName'];?>" name="awardName" id="awardName" class="input-xxlarge">
					</div>
				</div>
				
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="送出" />
						<a class="btn btn-outline-success" href="about_sys3.php">取消</a>
					</div>
				</div>
				
			</form>
        </div>
    </div>
</div>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> Awards List</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                        <th width="15%">標題</th>
                        <th width="15%">賽別</th>
                        <th width="40%">獎項</th>
                        <th width="8%">功能</th>
                    </tr>
                </thead>

                <tbody>
					<?php
					if(count($res_data) > 0)
					{
						foreach($res_data as $key => $row)
						{
							?>
							
							<tr>
								<!-- 標題 -->
								<td class="center"><?php echo $row['title'];?></td>
								<!-- 賽別 -->
								<td class="center"><?php echo $row['description'];?></td>
								<!-- 獎項 -->
								<td class="center"><?php echo $row['awardName'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-warning btn-small" href="about_sys3.php?id=<?php echo $row['id'];?>">修改</a>
									<a class="btn btn-small" onclick="del_data('<?php echo $row['id'];?>')" href="javascript:void(0);">刪除</a>
								</td>
							</tr>
							<?php
						}
					}
					else
					{
						?>
						<tr>
							<td colspan="3" style="text-align:center;">no data</td>
						</tr>
						<?php
					}
					?>
				</tbody>
            </table>
        </div>
    </div>
</div>
        <!-- content ends -->
        </div>
    </div>

<?php
require_once('foot.php');
?>
<script>
function del_data(id)
{
	if(confirm("確定刪除 ?"))
	{
		window.location.href='about_sys_act.php?act=del_awards&id=' + id;
	}
}
</script>
