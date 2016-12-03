<?php
require_once('inc/inc.php');
require_once('func/func_works_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);
$tid = ft($_GET['tid'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_tours = db_get_tours($db,$id);

if($tid != '')
{
	$res_view = db_get_tours_one($db,$tid);
}
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('works_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2>演出資訊TOUR DATE</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="works_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="tour_date_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
				<input type="hidden" name="tid" id="tid" value="<?php echo $tid;?>" />
				<div class="control-group">
					<label class="control-label">演出日期：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['tour_date'];?>" name="tour_date" id="tour_date" class="input-xxlarge">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">表演名稱</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['name'];?>" name="name" id="name" class="input-xxlarge" placeholder="EX: FLOATING FLOWERS & HUGIN/MUNIN," />
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">場地/國籍：</label>
					<div class="controls" style="margin-top:5px;">
						<input type="text" value="<?php echo $res_view['performed'];?>" name="performed" id="performed" class="input-xxlarge" placeholder= "EX:Zaragoza Trayecto (ES)">
						<p>請輸入演出地點與國家</p>
					</div>
				</div>
				
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="新增" />
						<a class="btn btn-outline-success" href="works_sys_content5.php?id=<?php echo $id;?>">取消</a>
					</div>
				</div>
				
			</form>
        </div>
    </div>
</div>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 演出資訊列表</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                        <th width="15%">日期</th>
                        <th width="20%">表演名稱</th>
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
								<!-- 日期 -->
								<td class="center"><?php echo $row['tour_date'];?></td>
								<!-- 表演名稱 -->
								<td class="center"><?php echo $row['name'];?></td>
								<!-- 說明 -->
								<td class="center"><?php echo $row['performed'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-warning btn-small" href="works_sys_content5.php?id=<?php echo $row['work_id'];?>&tid=<?php echo $row['id'];?>">修改</a>
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
  document.getElementById('tour_date').onclick = function(){
    start.elem = this
    laydate(start);
  }
  
});

function del_data(id,tid)
{
	if(confirm("確定刪除 ?"))
	{
		window.location.href='works_sys_act.php?act=del_tours&id=' + tid + '&tid=' + id;
	}
}
</script>
