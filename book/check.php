<?php
session_start();
ob_start();

include 'connect.php';

if($_POST['userid']=='admin' && $_POST['pass']=='123')
{
	header("location:adminpanel.php");}
	
else {
	$p="select * from tbluser where userid='".$_POST['userid']."' and pass='".$_POST['pass']."'";
	
	$r=mysql_query($p);
	
	$k=mysql_num_rows($r);
	$rows=mysql_fetch_assoc($r);
	
	if($k==1)
	{
		$_SESSION['us']=$rows['userid'];
		$_SESSION['login']=1;
		
	}
	else
	{
		$_SESSION['msg']="لطف نام کاربری و کلمه عبور را بررسی نمایید ";
		$_SESSION['login']=0;
		
		}
		
	header("location:index.php");
	
}
?>
<?php
    ob_end_flush();
?>