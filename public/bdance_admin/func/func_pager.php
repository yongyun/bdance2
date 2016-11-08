<?php
function pager_set($totalItems,$perPage=20,$delta=2,$mode='Jumping')
{
	$params = array(
		'mode'       => $mode,
		'perPage'    => $perPage,
		'delta'      => $delta,
		'totalItems' => $totalItems,
		'prevImg'    => '上一頁',
		'nextImg'    => '下一頁',
		'curPageSpanPre' =>'',
		'curPageSpanPost' =>'',
		'curPageLinkClassName'=>'active'
	);
	return $params;
}


function pager_set_api($totalItems,$mode='sliding',$perPage=20,$delta=2)
{
	$params = array(
		'mode'       => $mode,
		'perPage'    => $perPage,
		'delta'      => $delta,
		'totalItems' => $totalItems,
		'fileName'   => 'javascript:loadPage(%d,2084039759);',
		'append'     => false,
		'path'       => '',
		'prevImg'    => '上一頁',
		'nextImg'    => '下一頁',
		'curPageLinkClassName'=>'current'
	);
	
	return $params;
}


function get_pager_data($data,$items)
{
	//分頁設定
	$params = pager_set($data);
	$pager = & Pager::factory($params);
	$data  = $pager->getPageData();
	//Results from methods:
	echo 'getCurrentPageID()...: '; var_dump($pager->getCurrentPageID());
	echo 'getNextPageID()......: '; var_dump($pager->getNextPageID());
	echo 'getPreviousPageID()..: '; var_dump($pager->getPreviousPageID());
	echo 'numItems()...........: '; var_dump($pager->numItems());
	echo 'numPages()...........: '; var_dump($pager->numPages());
	echo 'isFirstPage()........: '; var_dump($pager->isFirstPage());
	echo 'isLastPage().........: '; var_dump($pager->isLastPage());
	echo 'isLastPageComplete().: '; var_dump($pager->isLastPageComplete());
	echo '$pager->range........: '; var_dump($pager->range);		
	
	
	return $data;	
}


/**
 * 分頁顯示
 * @delta = 一次要顯示頁數(預設是5頁)
 */
function print_pager($data, $page_limit, $delta = 10)
{
	$params = pager_set($data,$page_limit,$delta);
	@$pager = & Pager::factory($params);
	$page_data = $pager->getPageData();
	$links = $pager->getLinks();
	
    echo '<div class="pagination">';
		echo '<ul>';
		if($links['pages'])
		{
			echo $links['all'];
		}
		echo '</ul>';
	echo '</div>';
	
	/*
	echo '
	<pre>
	getCurrentPageID()...: '.var_dump($pager->getCurrentPageID()).'
	getNextPageID()......: '.var_dump($pager->getNextPageID()).'
	getPreviousPageID()..: '.var_dump($pager->getPreviousPageID()).'
	numItems()...........: '.var_dump($pager->numItems()).'
	numPages()...........: '.var_dump($pager->numPages()).'
	isFirstPage()........: '.var_dump($pager->isFirstPage()).'
	isLastPage().........: '.var_dump($pager->isLastPage()).'
	isLastPageComplete().: '.var_dump($pager->isLastPageComplete()).'
	$pager->range........: '.var_dump($pager->range).'
	</pre>
	';
	*/
}


//下一頁按鈕
function print_simple_pager($total_num, $page_limit)
{
	//分頁設定
	$params    = pager_set($total_num, $page_limit);
	@$pager     = & Pager::factory($params);
	$data      = $pager->getPageData();
	$links     = $pager->getLinks();
	$current_p = $pager->getCurrentPageID();
	$all_p = $pager->numPages();
	$p_id = ($_GET['pageID'] == NULL)?1:ft($_GET['pageID'],0);
	
	$item_num_to = ($total_num > 0)?($p_id-1)*$page_limit+1:0;
	
	$item_num_last = ($total_num > 0)?($links['next'])?($pager->getCurrentPageID()*$page_limit):(($pager->getCurrentPageID()-1)*($page_limit)+$total_num):0;
	
	echo '<div class="row-fluid">';
	echo '<div class="pagination" style="margin-top:0px; margin-bottom:0px; height:50px; line-height: 35px; text-align: right;">';
		
		if($links['back'] && $links['next'])
		{
			echo '<span style="margin-right:10px; padding-top:10px;">搜尋結果：共 '.$pager->numItems().' 筆 顯示 '.$item_num_to.' - '.$item_num_last.' 項</span>'; 
		}
		elseif($links['back'])
		{
			echo '<span style="margin-right:10px; padding-top:10px;">搜尋結果：共 '.$pager->numItems().' 筆 顯示 '.$item_num_to.' - '.$pager->numItems().' 項</span>'; 
		}
		else
		{
			echo '<span style="margin-right:10px; padding-top:10px;">搜尋結果：共 '.$pager->numItems().' 筆 顯示 '.$item_num_to.' - '.$item_num_last.' 項</span>'; 
		}
	echo '</div>';
	
	echo '<div class="pull-right">'; 
	echo '<ul class="pager">';
		echo '<li>第 '.$pager->getCurrentPageID().' 頁，共 '.$pager->numPages().' 頁 </li>';
		if($links['back'])
		{
			echo ''.$links['back'].'';
		}
		if($links['next'])
		{
			echo ''.$links['next'].'';
		}
	echo '</ul>';
 	echo '</div>';
	echo '</div>';
}

//選擇按鈕
function print_select_pager()
{
	$url_l = explode('/',getenv("REQUEST_URI"));
	$url_r = explode('?',$url_l[count($url_l)-1]);
	$page = $url_r[0];
	if($url_r[1])
	{
		$url_r[1] = '?'.$url_r[1];
	}
	//消去舊紀錄
	if(strpos($url_r[1],'&pageID'))
	{
		$query = substr($url_r[1],0,strpos($url_r[1],'&pageID'));
		$a = 1;
	}
	elseif(strpos($url_r[1],'?pageID'))
	{
		$query = substr($url_r[1],0,strpos($url_r[1],'?pageID'));
		$a = 2;
	}
	else
	{
		$query = $url_r[1];
		$a = 3;
	}
	
	//?和&
	if($query)
	{
		$sign = '&';
	}
	else
	{
		$sign = '?';
	}
    
	echo '<input type="text" class="input-mini" name="pageID" id="pageID" value="" />  ';
	echo '<input type="button" class="btn btn-info" value="提交" onclick="change_pages();" />';
	echo '<script>';
	echo 'function change_pages()';
	echo '{';
	echo 'var pageID = $("#pageID").val();';
	echo 'window.location.href="'.$page.$query.$sign.'pageID='.'" + pageID;';
	echo 'return true;';
	echo '}';
	echo '</script>';
}
?>