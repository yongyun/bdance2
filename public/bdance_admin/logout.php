<?php
require_once('inc/inc.php');

setcookie('su_tk', '', time() - 3600);
setcookie('su_tk_key', '', time() - 3600);

echo "<script>alert('您已成功登出');location.href='index.php';</script>";

?>
