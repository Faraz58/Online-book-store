<?php
include ('connect.php');
if(isset($_GET['id']))
{
	$p="delete from tblcat where catid=".$_GET['id'];
	mysql_query($p);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>