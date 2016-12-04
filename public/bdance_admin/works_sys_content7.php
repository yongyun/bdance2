<?php
require_once('inc/inc.php');
require_once('func/func_works_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);
$rid = ft($_GET['rid'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_reviews = db_get_reviews($db,$id);

if($rid != '')
{
	$res_view = db_get_reviews_one($db,$rid);
	$s_date = date('Y-m-d',strtotime($res_view['created_at']));
}
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('works_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 評論Reviews </h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="reviews_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>" />
				<div class="control-group">
					<label class="control-label">日期：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $s_date;?>" name="created_at" id="created_at" class="input-xxlarge">
						<p>*注意：若無填寫會自動顯示表演日期</p>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">評論者/單位：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['reviewer'];?>" name="reviewer" id="reviewer" class="input-xxlarge">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">評論內容：</label>
					<div class="controls" style="margin-top:5px;">
						<textarea id="content" name="content" class="input-xxlarge" rows="5"><?php echo $res_view['content'];?></textarea>
					</div>
				</div>
				
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="新增" />
						<a class="btn btn-outline-success" href="works_sys_content7.php?id=<?php echo $id;?>">取消</a>
					</div>
				</div>
				
			</form>
        </div>
    </div>
</div>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2>評論清單</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                        <th width="10%">日期</th>
                        <th width="15%">評論人</th>
                        <th width="40%">內容</th>
                        <th width="8%">功能</th>
                    </tr>
                </thead>

                <tbody>
					<?php
					if(count($res_reviews) > 0)
					{
						foreach($res_reviews as $key => $row)
						{
							?>
							
							<tr>
								<!-- 日期 -->
								<td class="center"><?php echo date('Y-m-d',strtotime($row['created_at']));?></td>
								<!-- 評論人 -->
								<td class="center"><?php echo $row['reviewer'];?></td>
								<!-- 內容 -->
								<td class="center"><?php echo $row['content'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-warning btn-small" href="works_sys_content7.php?id=<?php echo $row['work_id'];?>&rid=<?php echo $row['id'];?>">修改</a>
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
layui.use('laydate', function(){
  var laydate = layui.laydate;
  
  var start = {
    min: '2015-01-01 23:59:59',
    max: '2099-06-16 23:59:59',
    istoday: false,
    choose: function(datas)
	{
      end.min = datas;
      end.start = datas;
    }
  };
  document.getElementById('created_at').onclick = function(){
    start.elem = this
    laydate(start);
  }
  
});

function del_data(rid,id)
{
	if(confirm("確定刪除 ?"))
	{
		window.location.href='works_sys_act.php?act=del_reviews&id=' + id + '&rid=' + rid;
	}
}
</script>
