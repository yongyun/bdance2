<?php
require_once('inc/inc.php');
require_once('func/func_works_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);
$aid = ft($_GET['aid'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_tours = db_get_awards($db,$id);

if($aid != '')
{
	$res_view = db_get_awards_one($db,$aid);
}
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('works_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 獎項Award </h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="awards_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>" />
				<div class="control-group">
					<label class="control-label">作品名稱：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['title'];?>" name="title" id="title" class="input-xxlarge">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">獎名：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['awardName'];?>" name="awardName" id="awardName" class="input-xxlarge" placeholder="EX: First prize">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">得獎單位：</label>
					<div class="controls" style="margin-top:5px;">
						<textarea id="content" name="content" class="input-xxlarge" rows="5"><?php echo $res_view['description'];?></textarea>
					</div>
				</div>
				
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="送出" />
						<a class="btn btn-outline-success" href="works_sys_content9.php?id=<?php echo $id;?>">取消</a>
					</div>
				</div>
				
			</form>
        </div>
    </div>
</div>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 獎項列表</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                        <th width="15%">標題</th>
                        <th width="20%">獎項</th>
                        <th width="40%">說明</th>
                        <th width="8%">功能</th>
                    </tr>
                </thead>

                <tbody>
					<?php
					if(count($res_tours) > 0)
					{
						foreach($res_tours as $key => $row)
						{
							?>
							
							<tr>
								<!-- 標題 -->
								<td class="center"><?php echo $row['title'];?></td>
								<!-- 獎項 -->
								<td class="center"><?php echo $row['awardName'];?></td>
								<!-- 說明 -->
								<td class="center"><?php echo $row['description'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-warning btn-small" href="works_sys_content9.php?id=<?php echo $row['work_id'];?>&aid=<?php echo $row['id'];?>">修改</a>
									<a class="btn btn-small" onclick="del_data('<?php echo $row['id'];?>','<?php echo $row['work_id'];?>')" href="javascript:void(0);">刪除</a>
								</td>
							</tr>
							<?php
						}
					}
					else
					{
						?>
						<tr>
							<td colspan="4" style="text-align:center;">no data</td>
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
function del_data(id,aid)
{
	if(confirm("確定刪除 ?"))
	{
		window.location.href='works_sys_act.php?act=del_awards&id=' + aid + '&aid=' + id;
	}
}
</script>
