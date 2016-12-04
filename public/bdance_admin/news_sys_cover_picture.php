<?php
require_once('inc/inc.php');
require_once('func/func_news_sys.php');


//========== 接收參數 op ==========

$act = ft($_GET['act'],1);
$id = ft($_GET['id'],0);

//========== 接收參數 ed ==========
//取得訊息資料
$arr_page['page_limit'] = 1;  
$arr_input['nw_id'] = $id;
$res_news = db_get_news($db,$arr_input,$arr_page);
unset($arr_input);
unset($arr_page);

//擷取全部圖片
$res_images = db_get_news_ad($db,$id);
if(isset($res_images))
{
	foreach($res_images as $i => $row)
	{
		$arr_images[] = 'upload/news/'.$row['na_image'];
	}
}

preg_match_all('#<img[^>]*>#i', $res_news[0]['nw_top_content'].$res_news[0]['nw_content'], $all_image);
if(count($all_image[0]) > 0)
{
	foreach($all_image[0] as $key => $row)
	{
		preg_match('/upload(.*?)"/i',$row,$arr_image);
		$arr_images[] = str_replace('"','',$arr_image[0]);
	}
}
require_once('head.php');
?>
<div id="content" class="span10">
<?php require_once('news_sys_menu.php');?>

<div class="row-fluid sortable ui-sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title="">
            <h2><i class="icon-th-list"></i> 封面圖設定</h2>
        </div>
        	<button class="btn btn-large btn-primary" onclick="dialog_set('news_sys_cover_porp.php?id=<?php echo $id;?>','手動上傳封面圖',350,460);" style="float:left;">手動上傳封面圖</button>
        	<p>*注意：請使用1:1正方形圖片，size建議在700*700px。</p>
			</br></br>
        <div class="box-content">
			<div>
				<?php 
				$pk_image = 0;
				if(isset($arr_images))
				{
					foreach($arr_images as $i => $row)
					{
						?>
						<div style='float:left;margin-right:30px;'>
							<div>
								<img src='../<?php echo $row;?>' style='width:200px;height:150px;'>
							</div>
							<?php
							if($res_news[0]['nw_synopsis_image'] == $row)
							{
								$pk_image = 1;
								echo '目前封面 ';
							}
							else
							{
								?>
								<div class='editimg btn' style='color:#000;width:60px;margin-bottom:10px;' onclick="select_cover_picture('<?php echo $id;?>','<?php echo $row;?>')">設定封面</div>
								<?php
							}
							?>
						</div>
						<?php
					}
					
					if($pk_image == 0)
					{
						?>
						<div style='float:left;margin-right:30px;'>
							<div>
								<img src='../<?php echo $res_news[0]['nw_synopsis_image'];?>' style='width:200px;height:150px;'>
							</div>
							目前封面
						</div>
						<?php
					}
				}
				else
				{
					if($res_news[0]['nw_synopsis_image'] != '')
					{
						?>
						<div style='float:left;margin-right:30px;'>
							<div>
								<img src='../<?php echo $res_news[0]['nw_synopsis_image'];?>' style='width:200px;height:150px;'>
							</div>
							目前封面
						</div>
						<?php
					}
					else
					{
						echo '中間文章無圖片，請先至中間內容說明上傳圖片';
					}
				}
				?>
			</div>
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
function select_cover_picture(id,pic)
{
	var dataStr="id=" + id + "&pic=" + pic;
	$.ajax({
		type: 'POST',
		data: dataStr,
		url: 'news_sys_act.php?act=cover_pic',
		success: function(res) {
			window.location.reload();
		}
	});	
}
</script>