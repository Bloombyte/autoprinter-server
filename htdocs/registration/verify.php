<?php 
session_start();
$link = mysqli_connect("localhost","root","","autoprinter_database");
 $un=$_POST['uname'];
 $pw=$_POST['psw'];
$q = "SELECT * FROM user_info WHERE user_name LIKE '".$un."' AND pwd LIKE '".$pw."'";
$result=mysqli_query($link,$q);
if(mysqli_num_rows($result)>0)
{
  $cat =mysqli_fetch_assoc($result);
  $_SESSION['id']=$cat['id'];
  redirect ('index.php');
}
else
{

redirect ('login.php?login=unsuccess');

}
function redirect($page)
{
	echo '<script type="text/javascript">
	
	window.location ="'.$page.'";
    </script>';
}
?>
