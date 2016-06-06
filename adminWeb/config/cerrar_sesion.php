<?php
session_start();
session_destroy();
$parametros_cookies = session_get_cookie_params(); 
setcookie(session_name(),0,1,$parametros_cookies["path"]);


echo "<meta http-equiv ='refresh' content='0;url=http://".$_SERVER["SERVER_NAME"]."/sicaweb/ '>";
			
?>