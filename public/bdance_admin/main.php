<?php
$url_web = $_SERVER['PHP_SELF'];
?>
<!-- left menu starts -->
<div class="span2 main-menu-span">
    <div class="well nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li class="nav-header hidden-tablet">Main</li>
            <?php
			foreach($main_sys as $i => $row)
			{
				?>
                <li <?php if($main_url_sys[$i] == $url_web){ echo 'class="active"';}?>>
                	<a class="ajax-link" href="<?php echo $main_url_sys[$i];?>">
                    	<i class="icon-align-justify"></i>
                        <span class="hidden-tablet"><?php echo $row;?></span>
                    </a>
                </li>
                <?php
			}
			?>
        </ul>
    </div>
</div>
<!-- left menu ends -->
