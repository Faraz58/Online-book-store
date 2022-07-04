<?php
include 'connect.php';
$id=intval($_GET["id"]);

if(isset($id))
{
$query="SELECT * FROM tblproducts WHERE productid='$id'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
if(mysql_num_rows($result)==1)
	{
	exit($row["pic"]);}
}
?>