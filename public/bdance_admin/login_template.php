<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>B.DANCE 控制台</title>
<!--讓手機瀏覽器呈現正確的寬度-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">

<link rel="stylesheet" href="css/login.css" type="text/css" />
<script language="javascript" type="text/javascript">
function login()
{
	document.login_form.action = 'index.php?po=login';
	document.login_form.submit();
}
//定義的刷新請求
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</head>
<body>
<form id="login_form" name="login_form" method="post" action="#">
<input name="submit" id="submit" type="hidden" value="submit">
<div class='logindiv' id='www'>
    <table width='400px' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td height='200px' rowspan='3' width='5px' class='logintableleft'></td>
            <td height='200px' width='390px'>
                <table width='390px' cellpadding='0' cellspacing='0' border='0'>
                <tr>
                	<td height='30px' width='390px' class='logintabletop' valign="top">&nbsp;
                    	<div style="font-weight:bold; margin-top:-5px;">登入</div>
                    </td>
                </tr>
                <tr>
                    <td height='175px' width='390px' class='logintablemiddle'>
                        <table width='390px' cellpadding='0' cellspacing='0' border='0'>
                            <tr>
                                <td height='30px' width='120' align='right'>&nbsp;</td>
                                <td height='30px' colspan="2" align='left'>&nbsp;</td>
                            <tr>
                            <tr>
                                <td height='30px' width='120' align='right'>帳 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;號</td>
                                <td height='30px' colspan="2" align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="user_name" id="user_name" style='width:155px' type="text"></td>
                            <tr>
                            <tr>
                                <td height='30px' width='120' align='right'>密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碼</td>
                                <td height='30px' colspan="2" align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="user_passwd" id="user_passwd" style='width:155px' type="password"></td>
                            <tr>
							<!--
                            <tr>
                              <td height="30" align="right">驗 證 碼</td>
                              <td width="82">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="check_code" id="check_code" size="8" maxlength="4" type="text"></td>
                              <td width="188"><img src="captcha_code_file.php?rand=<?php echo rand(0,20);?>" id='captchaimg' style="cursor:pointer;"  onclick="refreshCaptcha();" ></td>
                            </tr>
							-->
                            <tr>
                                <td height='30px' colspan='3' align='center'>
									<input name="Submit" value="  登 入 " type="submit">
								</td>
                            <tr>
                                <td colspan='3' height='27px'><span></span></td>
                            <tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height='5px' width='390px' class='logintabledown'><span></span></td>
                </tr>
                </table>
            </td>
            <td height='200px' rowspan='3' width='5px' class='logintableright'></td>
        </tr>
        
    </table>
</div>
</form>
</body>
</html>