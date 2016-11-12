<div class="row-fluid sortable ui-sortable">
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
			<a class="btn btn-outline-success" href="news_sys_cover_picture.php?id=<?php echo $id;?>">封面圖設定</a>
			<a class="btn btn-outline-success" href="news_sys_content3.php?id=<?php echo $id;?>">影片設定</a>
			<a class="btn btn-outline-success" href="news_sys_content4.php?id=<?php echo $id;?>">相關連結設定</a>
        </div>  
	</div>
</div>
