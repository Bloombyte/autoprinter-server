<?php
session_start();
function redirect($page)
{
	echo '<script type="text/javascript">
	
	window.location ="'.$page.'";
    </script>';
}
  if(!isset($_SESSION['id']))
  {
     redirect ('login.php');
  }

?>