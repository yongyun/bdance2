<?php
require_once('inc/inc.php');
require_once('func/func_case_class_sys.php');

$arr_input['case_name'] = ft($_GET['case_name'],1);

//$db->debug();

//取得目前頁數
$arr_page['page_id'] = ft($_GET['pageID'],0);
//數量限制
$arr_page['page_limit'] = 10;  

//取得區域資料
$res_class = db_get_system_case_class($db,$arr_input,$arr_page);
//取得分頁數量
$res_class_sum = db_get_system_case_class($db,$arr_input); 

require_once('head.php');
?>

<div id="content" class="span10"><div class="row-fluid sortable ui-sortable">
	<div class="box span12">
      	<div class="box-header well">
            <div class="box-icon">
                <a class="btn btn-minimize btn-round" href="index.php"><i class="icon-chevron-up"></i></a>
            </div>
            <h2><i class="icon-search"></i> 案件區域搜尋</h2>
        </div>
        <div class="box-content" style="display: block;">
            <form class="row-fluid" method="get" action="user_sys.php" id="search_bar" name="search_bar" style="margin-bottom:0px;">
                <div class="span2">
                	<label>區域</label>
                    <input type="text" id="case_name" name="case_name" class="span12" value="<?php echo $arr_input['user'];?>">
                </div>
                <div class="span2">
                	<label>&nbsp;</label>
                    <input type="submit" class="btn btn-primary" value="搜尋">
                </div>

             </form>
        </div>
	</div>
</div>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2><i class="icon-th-list"></i> 案件區域列表</h2>
        </div>
        <div class="box-content">
        	<button class="btn btn-large btn-primary" onclick="dialog_set('case_class_add_mod.php?act=add','新增案件區',450,400);" style="float:left;">新增案件區</button>


            <!--page info op-->
            <?php print_simple_pager($res_class_sum[0]['cnt'],$arr_page['page_limit']);?>
			<!--page info ed-->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                    	<th width="7%">No.</th>
                        <th width="15%">案件區域</th>
                        <th width="10%">目前案件數量</th>
                        <th width="10%">建立日期</th>
                        <th width="10%">功能</th>
                    </tr>
                </thead>

                <tbody>
					<?php
					if(count($res_class) > 0)
					{
						foreach($res_class as $key => $row)
						{
							?>
							<tr>
								<!-- 編號 -->
								<td class="center"><?php echo $row['scc_id'];?></td>
								<!-- 案件區域 -->
								<td class="center"><?php echo $row['scc_name'];?></td>
								<!-- 目前案件數量 -->
								<td class="center"><?php echo '?';?></td>
								<!-- 建立日期 -->
								<td class="center"><?php echo $row['scc_date'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-warning btn-small" href="javascript:void(0);" onclick="dialog_set('case_class_add_mod.php?act=mod&id=<?php echo $row['scc_id'];?>','修改案件區域',450,400);">修改</a>
									<a class="btn btn-small" href="case_class_add_mod_act.php?act=del&id=<?php echo $row['scc_id'];?>">刪除</a>
								</td>
							</tr>
							<?php
						}
					}
					else
					{
						?>
						<tr>
							<td colspan="5" style="text-align:center;">no data</td>
						</tr>
						<?php
					}
					?>
				</tbody>
            </table>

			<!--pager op-->
			<?php
			print_pager($res_class_sum[0]['cnt'],$arr_page['page_limit']);
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
