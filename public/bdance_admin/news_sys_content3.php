<?php
require_once('inc/inc.php');
require_once('func/func_news_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========


//取得訊息資料
$res_video = db_get_news_video($db,$id);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('news_sys_menu.php');?>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 影片設定</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="news_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="video_add" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                <div class="control-group">
                    <div>
						<select id="status" name="status" class="input">
							<option value="0">請選擇影片來源</option>
							<option value="1">Youtube</option>
							<option value="2">Vimeo</option>
						</select>
                        <input type="text" value="" placeholder="請輸入影片網址" name="video" id="video" class="input">
						<input type="submit" class="btn btn-primary" value="新增" />
                   </div>
                </div>
			</form>
        </div>
    </div>
</div>
<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2><i class="icon-th-list"></i> 影片列表</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                    	<th width="7%">No.</th>
                        <th width="8%">影片來源</th>
                        <th width="15%">網址</th>
                        <th width="8%">功能</th>
                    </tr>
                </thead>

                <tbody>
					<?php
					if(count($res_video) > 0)
					{
						foreach($res_video as $key => $row)
						{
							?>
							<tr>
								<!-- 編號 -->
								<td class="center"><?php echo $row['nv_id'];?></td>
								<!-- 影片來源 -->
								<td class="center">
									<?php 
									switch($row['nv_type'])
									{
										case '1':
											echo 'Youtube';
										break;
										
										case '2':
											echo 'Vimeo';
										break;
									}
									?>
								</td>
								<!-- 網址 -->
								<td class="center"><?php echo $row['nv_link'];?></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-small" href="news_sys_act.php?act=video_del&id=<?php echo $row['nv_nwid'];?>&vid=<?php echo $row['nv_id'];?>">刪除</a>
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
        </div>
    </div>
</div>
        <!-- content ends -->
        </div>
    </div>

<?php
require_once('foot.php');
?>
