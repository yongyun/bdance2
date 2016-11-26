<?php
require_once('inc/inc.php');
require_once('func/func_index_sys.php');


//========== 接收參數 op ==========

$id = ft($_GET['id'],0);
$sid = ft($_GET['sid'],0);

//========== 接收參數 ed ==========

//取得訊息資料
$res_data = db_get_index_view($db,$id);
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('index_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 顯示設定</h2>
        </div>
        <div class="box-content">
			<form id="myupload" name="myupload" method="post" action="index_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="add" />
				<div class="control-group">
					 <label class="control-label">類別：</label>
					<div class="controls" style="margin-top:5px;">
						<select id="type" name="type">
							<option value="images" <?php if($res_view['type'] == 'images') echo 'selected';?>>圖片類</option>
							<option value="video" <?php if($res_view['type'] == 'video') echo 'selected';?>>影片類</option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee">檔案上傳：</label>
					<div class="controls">
						<input id="mydata" type="file" name="mydata">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="local_fee"> </label>
					<div class="controls">
                        <div class="progress">
                            <span class="bar"></span><span class="percent">0%</span >
                        </div>
                        <div class="files"></div>
                        <div id="showimg"></div>
					</div>
				</div>
				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<a id="fileupload" class="btn btn-primary" style="cursor:pointer;">新增</a>
						<a class="btn btn-outline-success" href="index_sys_act.php?id=<?php echo $id;?>">取消</a>
					</div>
				</div>
				
			</form>
        </div>
    </div>
</div>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 資料列表</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="background-color:#DFDFDF;">
                    	<th width="7%">No.</th>
                        <th width="10%">檔案類型</th>
                        <th width="20%">檔案連結</th>
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
								<td class="center"><?php echo $row['iv_id'];?></td>
								<!-- 檔案類型 -->
								<td class="center">
									<?php 
									switch($row['iv_type'])
									{
										case '0':
											echo '影片';
										break;
										
										case 1:
											echo '圖片';
										break;
									}
									?>
								</td>
								<!-- 檔案連結 -->
								<td class="center"><a href="../<?php echo $row['iv_data'];?>" target="_blank"><?php echo $row['iv_data'];?></a></td>
								<!-- 功能 -->
								<td class="center" style="white-space:nowrap;">
									<a class="btn btn-small" href="index_sys_act.php?act=del&id=<?php echo $row['iv_id'];?>">刪除</a>
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
<script type="text/javascript">
function del_data(id)
{
	if(confirm("確定刪除 ?"))
	{
		window.location.href='index_sys_act.php?act=del&id=' + id;
	}
}
$(function () {
	var bar = $('.bar');
	var percent = $('.percent');
	var showimg = $('#showimg');
	var progress = $(".progress");
	var files = $(".files");
	var btn = $(".btn span");
    $("#fileupload").click(function(){
		$("#myupload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
        		showimg.empty();
				progress.show();
        		var percentVal = '0%';
        		bar.width(percentVal);
        		percent.html(percentVal);
				btn.html("上傳中...");
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
			success: function(data) {
				//files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'>删除</span>");
				if(data.status == 'error')
				{
					var percentVal = '0%';
					bar.width(percentVal);
					percent.html(percentVal);
					alert(data.error);
				}
				else
				{
					location.reload();
				}
			},
			error:function(xhr){
				bar.width('0')
				alert(xhr.responseText);
			}
		});
	});
});
</script>
