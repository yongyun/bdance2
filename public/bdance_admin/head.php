<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>B.DANCE 控制台</title>
<!--讓手機瀏覽器呈現正確的寬度-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">

<!-- The styles -->
<link id="bs-css" href="css/bootstrap-cerulean.css?20161025" rel="stylesheet">
<link rel="stylesheet" href="css/colorbox.css?20161025">
<style type="text/css">
body 
{
	padding-bottom: 40px;
}
.sidebar-nav 
{
	padding: 9px 0;
}
</style>
<link href="css/bootstrap-responsive.css?20161025" rel="stylesheet">
<link href="css/charisma-app.css?20161025" rel="stylesheet">
<link href="css/jquery-ui-1.8.21.custom.css?20161025" rel="stylesheet">
<link href="css/jquery.cleditor.css?20161025" rel="stylesheet">
<link href="css/jquery.noty.css?20161025" rel="stylesheet">
<link href="css/uniform.default.css?20161025" rel="stylesheet">
<link href="css/opa-icons.css?20161025" rel="stylesheet">
<link href="css/leaderboard.css?20161025" rel="stylesheet">
<link href="js/css/layui.css?20161025" rel="stylesheet">
<link href="css/style.css?20161120" rel="stylesheet">

<!-- jQuery -->
<script src="js/jquery-1.7.2.min.js?20161025"></script>
<script type="text/javascript" src="js/jquery.form.js?20161120"></script>
<script type="text/javascript" src="js/jquery.blockUI.js?20161120"></script>
<!-- jQuery UI -->
<script src="js/jquery-ui-1.8.21.custom.min.js?20161025"></script>
<!-- comm -->
<script src="js/comm.js?20161025"></script>
<!-- ckeditor -->
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>

<body>
<!-- topbar starts -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
            <a class="brand" href="index.php">B.DANCE</a>
            
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="index.php#">
                    <i class="icon-user"></i>
                    <span class="hidden-phone"><?php echo $mem_info['name'];?></span>
                    <span class="caret"></span>
                </a>
                
				<ul class="dropdown-menu">
					<li><a href="user_system.php?act=mod">修改密碼</a></li>
					<li class="divider"></li>
					<li><a href="logout.php">登出</a></li>
				</ul>
			</div>
            <!-- user dropdown ends -->
        </div>
    </div>
</div>
<!-- topbar ends -->

<div class="container-fluid">
    <div class="row-fluid">
	<?php
    require_once('main.php');
    ?>
