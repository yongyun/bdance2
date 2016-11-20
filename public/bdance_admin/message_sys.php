<?php
require_once('inc/inc.php');
require_once('func/func_message_sys.php');

$arr_input['expect_date_op'] = ft($_GET['expect_date_op'],1);
$arr_input['expect_date_ed'] = ft($_GET['expect_date_ed'],1);
$arr_input['screach_str'] = ft($_GET['screach_str'],1);

//取得目前頁數
$arr_page['page_id'] = ft($_GET['pageID'],0);
//數量限制
$arr_page['page_limit'] = 30;  

//取得訊息資料
$res_message = db_get_messages($db,$arr_input,$arr_page);
//取得分頁數量
$res_message_sum = db_get_messages($db,$arr_input); 

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
            <form class="row-fluid" method="get" action="message_sys.php" id="search_bar" name="search_bar" style="margin-bottom:0px;">
                <div class="span12" style="margin-left:0px;">
                    <label>建立日期</label>
                    <input id="expect_date_op" type="text" name="expect_date_op" style="width:170px;" value="<?php echo $arr_input['expect_date_op'];?>" class="hasDatepicker">&nbsp;&nbsp;~&nbsp;&nbsp;
                    <input id="expect_date_ed" type="text" name="expect_date_ed" style="width:170px;" value="<?php echo $arr_input['expect_date_ed'];?>" class="hasDatepicker">
                </div>
                
                <div class="span12" style="margin-left:0px;">
                	<label>其他關鍵字</label>
                    <input id="screach_str" type="text" style="float:left; margin-left:7px;" class="span5" name="screach_str" value="<?php echo $arr_input['screach_str'];?>">
                    <input type="submit" style="float:left; margin-left:7px;" class="btn btn-primary" value="搜尋">
             </form>
        </div>  
	</div>
</div>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2><i class="icon-th-list"></i> 留言列表</h2>
        </div>
        <div class="box-content">
            <!--page info op-->
            <?php print_simple_pager($res_message_sum[0]['cnt'],$arr_page['page_limit']);?>
			<!--page info ed-->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                    	<th width="7%">No.</th>
                        <th width="8%">暱稱</th>
                        <th width="15%">信箱</th>
                        <th width="25%">內容</th>
                        <th width="8%">留言時間</th>
                        <th width="8%"></th>
                    </tr>
                </thead>

                <tbody>
					<?php
					if(count($res_message) > 0)
					{
						foreach($res_message as $key => $row)
						{
							?>
							<tr>
								<!-- 編號 -->
								<td class="center"><?php echo $row['id'];?></td>
								<!-- 暱稱 -->
								<td class="center"><?php echo $row['name'];?></td>
								<!-- 信箱 -->
								<td class="center"><?php echo $row['email'];?></td>
								<!-- 內容 -->
								<td class="center">
									<?php 
									echo mb_substr($row['message'],0,50,"UTF-8");
									if(mb_strlen($row['message'],"utf-8") > 50)
									{
										echo '...';
									}
									?>
								</td>
								<!-- 留言時間 -->
								<td class="center"><?php echo $row['created_at'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<button class="btn btn-large btn-primary" onclick="dialog_set('message_sys_porp.php?id=<?php echo $row['id'];?>','留言訊息',550,460);" style="float:left;">詳細內容</button>
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
			print_pager($res_message_sum[0]['cnt'],$arr_page['page_limit']);
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
</script>
