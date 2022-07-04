<?php
include ('connect.php');
$id=intval($_GET["id"]);
if(isset($id))
{
	$p="delete from `tbluser` where pass=$id";
	mysql_query($p);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>