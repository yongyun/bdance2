<?php
require_once('inc/inc.php');
require_once('func/func_works_sys.php');

$arr_input['expect_date_op'] = ft($_GET['expect_date_op'],1);
$arr_input['expect_date_ed'] = ft($_GET['expect_date_ed'],1);
$arr_input['screach_str'] = ft($_GET['screach_str'],1);

//取得目前頁數
$arr_page['page_id'] = ft($_GET['pageID'],0);
//數量限制
$arr_page['page_limit'] = 10;  

//取得訊息資料
$res_news = db_get_projects($db,$arr_input,$arr_page);
//取得分頁數量
$res_news_sum = db_get_projects($db,$arr_input); 

require_once('head.php');
?>

<div id="content" class="span10"><div class="row-fluid sortable ui-sortable">
	<div class="box span12">
      	<div class="box-header well">
            <div class="box-icon">
                <a class="btn btn-minimize btn-round" href="index.php"><i class="icon-chevron-up"></i></a>
            </div>
            <h2><i class="icon-search"></i> 條件搜尋</h2>
        </div>
        <div class="box-content" style="display: block;">
            <form class="row-fluid" method="get" action="news_sys.php" id="search_bar" name="search_bar" style="margin-bottom:0px;">
                <div class="span12" style="margin-left:0px;">
                    <label>作品日期</label>
                    <input id="expect_date_op" type="text" name="expect_date_op" style="width:170px;" value="" class="hasDatepicker">&nbsp;&nbsp;~&nbsp;&nbsp;
                    <input id="expect_date_ed" type="text" name="expect_date_ed" style="width:170px;" value="" class="hasDatepicker">
                </div>
             </form>
        </div>  
	</div>
</div>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2><i class="icon-th-list"></i> 作品列表</h2>
        </div>
        <div class="box-content">
        	<button class="btn btn-large btn-primary" onclick="dialog_set('works_sys_porp.php?act=add&type=sp1','新增作品消息',350,460);" style="float:left;">新增作品消息</button>


            <!--page info op-->
            <?php print_simple_pager($res_news_sum[0]['cnt'],$arr_page['page_limit']);?>
			<!--page info ed-->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                    	<th width="7%">No.</th>
                        <th width="15%">標題</th>
                        <th width="8%">作品日期</th>
                        <th width="8%">修改日期</th>
                        <th width="8%">功能</th>
                    </tr>
                </thead>

                <tbody>
					<?php
					if(count($res_news) > 0)
					{
						foreach($res_news as $key => $row)
						{
							?>
							
							<tr>
								<!-- 編號 -->
								<td class="center"><?php echo $row['id'];?></td>
								<!-- 標題 -->
								<td class="center"><?php echo $row['name'];?></td>
								<!-- 作品日期 -->
								<td class="center"><?php echo $row['perform_date'];?></td>
								<!-- 修改日期 -->
								<td class="center"><?php echo $row['updated_at'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-warning btn-small" href="works_sys_content1.php?id=<?php echo $row['id'];?>">修改</a>
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
  
  var end = {
	min: '2015-01-01 23:59:59',
    max: '2099-06-16 23:59:59',
    istoday: false,
    choose: function(datas)
	{
      start.max = datas;
    }
  };
  
  document.getElementById('expect_date_op').onclick = function(){
    start.elem = this;
    laydate(start);
  }
  document.getElementById('expect_date_ed').onclick = function(){
    end.elem = this
    laydate(end);
  }
  
});

function del_data(id)
{
	if(confirm("確定刪除 " + id + " ?"))
	{
		window.location.href='works_sys_act.php?act=del&id=' + id;
	}
}
</script>
