<?php session_start();
include 'connect.php';
include 'funcs.php';
if(isset($_GET['pid']))
{
		$p=sprintf("INSERT INTO `tblbasket` ( `userid` , `productid` )VALUES ('%s', '%s');",$_SESSION['us'],$_GET['pid']);
	mysql_query($p);
	
	$p=sprintf("update tblproducts set emtiyaz=emtiyaz+1 where productid='%s'",$_GET['pid']);
	mysql_query($p);
	
	
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>