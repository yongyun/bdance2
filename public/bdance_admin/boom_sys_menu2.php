<div class="row-fluid sortable ui-sortable">
	<div class="box span12">
      	<div class="box-header well">
            <div class="box-icon">
                <a class="btn btn-minimize btn-round" href="index.php"><i class="icon-chevron-up"></i></a>
            </div>
            <h2><i class="icon-th-list"></i> 顯示切換</h2>
        </div>
        <div class="box-content" style="display: block;">
            <a class="btn btn-outline-success" href="boom_sys_info.php?id=<?php echo $id;?>">列表資訊</a>
            <a class="btn btn-outline-success" href="boom_sys_ad.php?id=<?php echo $id;?>">橫幅圖</a>
			<a class="btn btn-outline-success" href="boom_sys_other.php?id=<?php echo $id;?>">說明</a>
			<a class="btn btn-outline-success" href="boom_sys_show.php?id=<?php echo $id;?>">表演資訊</a>
			<a class="btn btn-outline-success" href="boom_sys_artists.php?id=<?php echo $id;?>">Artists</a>
        </div>  
	</div>
</div>
