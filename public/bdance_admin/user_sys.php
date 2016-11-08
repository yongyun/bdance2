<?php
require_once('inc/inc.php');
require_once('func/func_user_sys.php');

$arr_input['class'] = ft($_GET['class'],0);
$arr_input['user'] = ft($_GET['user'],1);

//$db->debug();

//取得目前頁數
$arr_page['page_id'] = ft($_GET['pageID'],0);
//數量限制
$arr_page['page_limit'] = 10;  

//搜尋權限身份
$res_class = db_get_system_user_class($db);

if(count($res_class) > 0)
{
	foreach($res_class as $key => $row)
	{
		$arr_mem_type[$row['suc_id']] = $row['suc_name'];
	}
}

//取得帳號資料
$res_member = db_get_member($db,$arr_input,$arr_page);
//取得分頁數量
$res_member_sum = db_get_member($db,$arr_input); 

require_once('head.php');
?>

<div id="content" class="span10"><div class="row-fluid sortable ui-sortable">
	<div class="box span12">
      	<div class="box-header well">
            <div class="box-icon">
                <a class="btn btn-minimize btn-round" href="index.php"><i class="icon-chevron-up"></i></a>
            </div>
            <h2><i class="icon-search"></i> 帳號搜尋</h2>
        </div>
        <div class="box-content" style="display: block;">
            <form class="row-fluid" method="get" action="user_sys.php" id="search_bar" name="search_bar" style="margin-bottom:0px;">
            	<div class="span2">
                	<label>權限身份</label>
                    <select name="class" class="span12">
                    	<option value="">全部</option>
											<?php
											if(count($res_class) > 0)
											{
												foreach($res_class as $key => $row)
												{
													$selected = ($row['suc_id'] == $arr_input['class'])? 'selected':'';
													echo '<option value="'.$row['suc_id'].'" '.$selected.'>'.$row['suc_name'].'</option>';
												}
											}
											?>
										</select>
                </div>
                <div class="span2">
                	<label>帳號/暱稱</label>
                    <input type="text" id="user" name="user" class="span12" value="<?php echo $arr_input['user'];?>">
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
            <h2><i class="icon-th-list"></i> 會員列表</h2>
        </div>
        <div class="box-content">
        	<button class="btn btn-large btn-primary" onclick="dialog_set('user_sys_add_mod.php?act=add','新增帳號狀態',350,560);" style="float:left;">新增帳號</button>


            <!--page info op-->
            <?php print_simple_pager($res_member_sum[0]['cnt'],$arr_page['page_limit']);?>
			<!--page info ed-->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                    	<th width="7%">No.</th>
                        <th width="10%">帳號</th>
                        <th width="9%">暱稱</th>
                        <th width="25%">E-Mail</th>
                        <th width="8%">權限身份</th>
                        <th width="8%">建立日期</th>
                        <th width="8%">功能</th>
                    </tr>
                </thead>

                <tbody>
					<?php
					if(count($res_member) > 0)
					{
						foreach($res_member as $key => $row)
						{
							?>
							<tr>
								<!-- 編號 -->
								<td class="center"><?php echo $row['m_id'];?></td>
								<!-- 帳號 -->
								<td class="center"><?php echo $row['m_user'];?></td>
								<!-- 暱稱 -->
								<td class="center"><?php echo $row['m_name'];?></td>
								<!-- e-mail -->
								<td class="center"><?php echo $row['m_email'];?></td>
								<!-- 權限身份 -->
								<td class="center"><?php echo $arr_mem_type[$row['m_type']];?></td>
								<!-- 建立日期 -->
								<td class="center"><?php echo $row['m_datetime'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-warning btn-small" href="javascript:void(0);" onclick="dialog_set('user_sys_add_mod.php?act=mod&id=<?php echo $row['m_id'];?>','修改帳號狀態',350,560);">修改</a>
									<a class="btn btn-small" href="user_sys_add_mod_act.php?act=del&id=<?php echo $row['m_id'];?>">刪除</a>
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
			print_pager($res_member_sum[0]['cnt'],$arr_page['page_limit']);
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
