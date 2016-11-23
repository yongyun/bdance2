<?php
require_once('inc/inc.php');
require_once('func/func_boom_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_data = db_get_boom_list($db,$id);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('boom_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2><i class="icon-th-list"></i> boom列表</h2>
        </div>
        <div class="box-content">
        	<button class="btn btn-large btn-primary" onclick="dialog_set('boom_sys_porp.php?act=add&type=sp1','新增Boom消息',350,460);" style="float:left;">新增boom</button>


            <!--page info op-->
            <?php print_simple_pager($res_news_sum[0]['cnt'],$arr_page['page_limit']);?>
			<!--page info ed-->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                    	<th width="7%">No.</th>
                        <th width="15%">標題</th>
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
								<!-- 編號 -->
								<td class="center"><?php echo $row['bl_id'];?></td>
								<!-- 標題 -->
								<td class="center"><?php echo $row['bl_title'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-warning btn-small" href="boom_sys_ad.php?id=<?php echo $row['bl_id'];?>">修改</a>
									<a class="btn btn-small" onclick="del_data('<?php echo $row['bl_id'];?>')" href="javascript:void(0);">刪除</a>
								</td>
							</tr>
							<?php
						}
					}
					else
					{
						?>
						<tr>
							<td colspan="7" style="text-align:center;">no data</td>
						</tr>
						<?php
					}
					?>
				</tbody>
            </table>

			<!--pager op-->
			<?php
			print_pager($res_news_sum[0]['cnt'],$arr_page['page_limit']);
			?>
			<!--pager ed-->  
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
function del_data(id)
{
	if(confirm("確定刪除 " + id + " ?"))
	{
		window.location.href='boom_sys_act.php?act=del&id=' + id;
	}
}
</script>
