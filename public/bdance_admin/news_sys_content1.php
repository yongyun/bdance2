<?php
require_once('inc/inc.php');
require_once('func/func_news_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========

$arr_page['page_limit'] = 1;  
//取得訊息資料
$arr_input['nw_id'] = $id;
$res_news = db_get_news($db,$arr_input,$arr_page);
unset($arr_input);
require_once('head.php');
?>
<div id="content" class="span10"><div class="row-fluid sortable ui-sortable">
	<div class="box span12">
      	<div class="box-header well">
            <div class="box-icon">
                <a class="btn btn-minimize btn-round" href="index.php"><i class="icon-chevron-up"></i></a>
            </div>
            <h2><i class="icon-th-list"></i> 顯示切換</h2>
        </div>
        <div class="box-content" style="display: block;">
            <a class="btn btn-outline-success" href="news_sys_content1.php?id=<?php echo $id;?>">簡述內容</a>
			<a class="btn btn-outline-success" href="news_sys_content.php?id=<?php echo $id;?>">輪播圖片</a>
			<a class="btn btn-outline-success" href="news_sys_content2.php?id=<?php echo $id;?>">內容說明</a>
			<a class="btn btn-outline-success" href="news_sys_content3.php?id=<?php echo $id;?>">影片設定</a>
			<a class="btn btn-outline-success" href="news_sys_content4.php?id=<?php echo $id;?>">相關連結設定</a>
        </div>  
	</div>
</div>


<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2> 簡述內容</h2>
        </div>
        <div class="box-content">
			<form id="mod_form" name="mod_form" method="post" action="news_sys_act.php" class="bs-docs-example form-horizontal" enctype='multipart/form-data'>
				<input type="hidden" name="act" id="act" value="synopsis_mod" />
				<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
            	<div class="control-group">
                     <label class="control-label">標題：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="<?php echo $res_news[0]['nw_title'];?>" name="title" id="title" class="input">
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="local_fee">簡述內容：</label>
                    <div class="controls">
						<textarea name="synopsis" id="synopsis" class="input" style="height:150px;"><?php echo $res_news[0]['nw_synopsis'];?></textarea>
                    </div>
                </div>
				
            	<div class="control-group">
                     <label class="control-label">狀態：</label>
                    <div class="controls" style="margin-top:5px;">
						<select id="status" name="status" class="input">
							<option value="0" <?php if($res_news[0]['nw_status'] == '0') echo 'selected';?>>正常顯示</option>
							<option value="1" <?php if($res_news[0]['nw_status'] == '1') echo 'selected';?>>隱藏</option>
						</select>
                    </div>
                </div>

				<div class="control-group"> 
					<label class="control-label" for="id"></label>
					<div class="controls">
						<input type="submit" class="btn btn-primary" value="修改" />
					</div>
				</div>
				
			</form>
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
$(function () {	
	$(".delimg").live('click',function(){
		var pic = $(this).attr("rel");
		$.post("news_sys_act.php?act=delimg",{image_id:pic},function(msg){
			if(msg==1){
				location.reload();
			}else{
				alert(msg);
			}
		});
	});
});
</script>
