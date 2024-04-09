<?php
$con = mysqli_connect('localhost:3500','root','');
$db = mysqli_select_db($con, 'sistema_login');
	
if(!$con || !$db)
{
	echo "<pre>";
	echo mysqli_error($con);
	echo "</pre>";
}
?>