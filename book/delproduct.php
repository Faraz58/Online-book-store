<?php
include ('connect.php');
if(isset($_GET['id']))
{
	$p="delete from tblproducts where productid=".$_GET['id'];
	mysql_query($p);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>