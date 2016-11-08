<?php
require_once('inc/inc.php');
require_once('head.php');


//========== 接收參數 op ==========

$act = ft($_POST['act'],0);
$url = ft($_POST['url'],1);
$name = ft($_POST['name'],1);
$type = ft($_POST['type'],0);

//========== 接收參數 ed ==========

if($act == 1)
{
	$db->debug();
	if($url != '' && $name != '')
	{
		$sql ="SELECT suc_id FROM system_user_class ";
		
		$r_user_class = $db->dbSelect($sql,$arr_input);	
		
		foreach($r_user_class as $row)
		{
			$sql = "INSERT INTO system_auth_option ";
			
			$arr_input['sao_type'] = $type;
			$arr_input['sao_page'] = $url;
			$arr_input['sao_name'] = $name;
			$arr_input['sao_sucid'] = $row['suc_id'];
			
			$result = $db -> dbInsert($sql,$arr_input);
			
			unset($arr_input);
		}
	}
	else
	{
		echo '欄位為空';
	}
}
?>
<div id="content" class="span10">
    <div class="span6" style="margin-left:auto; margin-right:auto; float:none;">
    	<form id="mod_form" name="mod_form" method="post" action="" class="bs-docs-example form-horizontal"s>
            	<div class="control-group">
                    <label class="control-label">???</label>
                    <div class="controls" style="margin-top:5px;">
                    </div>
                </div>
            	<div class="control-group">
                    <label class="control-label">分類：</label>
                    <div class="controls" style="margin-top:5px;">
						<select name="type" id="type" class="span12">
							<?php
							if(count($web_type_sys) > 0)
							{
								foreach($web_type_sys as $key => $row)
								{
									echo '<option value="'.$key.'" >'.$key.'. '.$row.'</option>';
								}
							}
							?>
						</select>
                    </div>
                </div>
            	<div class="control-group">
                     <label class="control-label">頁面連結：</label>
                    <div class="controls" style="margin-top:5px;">
                        <input type="text" value="" size="30" name="url" id="url" class="input">
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="local_fee">頁面名稱：</label>
                    <div class="controls">
                        <input type="text" value="" size="30" name="name" id="name" class="input">
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
                <input type="hidden" name="act" id="act" value="1" />
            
            <div class="control-group"> 
                <label class="control-label" for="id"></label>
                <div class="controls">
                    <input type="submit" class="btn btn-primary" value="新增" />
                </div>
            </div>
            
		</form>
    </div>
</div>
</div>

<?php
require_once('foot.php');
?>
