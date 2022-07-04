<?php
session_start();
ob_start();

 include ('connect.php');
 include ('funcs.php');
 
if(isset($_POST['userid'])&&isset($_POST['password']))
{
	$p=sprintf("INSERT INTO `book`.`tbluser` (`userid`, `pass`, `codeposti`, `tell`, `address`)
VALUES ('%s', '%s', '%s', %s , '%s');",$_POST['userid'],$_POST['password'],$_POST['codeposti'],
$_POST['tell'], $_POST['address']);
	$r=mysql_query($p);
	if($r)
	$msg="<font color=green>ثبت نام با موفقیت انجام شد . اکنون می توانید وارد سایت شوید.</font>";
	else 
	$msg="<font color=red>خطا در ثبت نام !</font>";
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ثبت نام</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="body">
<!---- Heade ---->
<div class="header"></div>
<div class="top-menu">
	<ul>
    	<li><a href="index.php">صفحه اصلی</a></li>
    </ul>
</div>
<!---- End Heade ---->

<!---- Right ---->
<div class="right">
	<div class="title"><div class="icon-title"></div><div class="txt-title">دسته بندی کتب</div></div>
    <div class="right-menu">
    	<ul>
                <?php
					$p="select * from tblcat";
					$r=mysql_query($p);
					while ($row=mysql_fetch_assoc($r))
					echo '<li><a href="?cat='.$row['catid'].'">'.$row['name'].'</a></li>';
				?>
       	</ul>
    </div>
   <?php include ('login.php'); ?>
    
</div>
<!---- End Right ---->

<!---- center ---->
<div class="center">
	<div class="title"><div class="icon-title"></div><div class="txt-title">ثبت نام</div></div>
    <div class="content">
    <p align="center" style="font-family:tahoma; font-size:12px; color:red;">
    لطفاً تمام فیلد ها را به طور کامل پر کنید . 
    <br />
    خالی گذاشتن هر یک از فیلد ها باعث ایجاد خطا می گردد.
    </p>
   	  <form method="post" action="">
        <p align="center"><?php if(isset($msg)) echo $msg; ?></p>          
            <table width="auto" border="0" align="right" dir="rtl">
  <tbody>
    <tr>
      <td align="right" valign="middle" class="label">نام کاربری : </td>
      <td align="right" valign="middle"><input type="text" name="userid" id="userid" class="input"></td>
      
    </tr>
    <tr>
      <td align="right" valign="middle" class="label">رمز عبور : </td>
      <td align="right" valign="middle"><input type="text" name="password" id="password" class="input"></td>
    </tr>
    
    <tr>
      <td align="right" valign="middle" class="label">کد پستی : </td>
      <td align="right" valign="middle"><input type="text" name="codeposti" id="codeposti" class="input"></td>
      
    </tr>
    <tr>
      <td align="right" valign="middle" class="label">تلفن : </td>
      <td align="right" valign="middle"><input type="text" name="tell" rows="5" id="tell" class="input"></td>
      
    </tr>
    
    <tr>
      <td align="right" valign="middle" class="label">آدرس : </td>
      <td align="right" valign="middle"><textarea name="address" rows="5" id="address"></textarea></td>
      
    </tr>
    
    <tr>
    <td align="right" valign="middle"><input type="submit" name="submit" id="submit" value="ثبت نام" class="submit"></td>
      <td align="right" valign="middle"><input type="reset" name="Reset" id="Reset" value="انصراف" class="submit"></td>
      
    </tr>
  </tbody>
</table>
</form>     
    </div>
    
    
</div>
<!---- End center ---->

<!---- left ---->
<div class="left">

	<div class="title"><div class="icon-title"></div><div class="txt-title">تبلیغات</div></div>
    <div class="ads">
    	<div class="pic-ads"><a href="#"><img src="images/ads12.gif"></a></div>
        <div class="pic-ads"><a href="#"><img src="images/ads-120-240-1.gif"></a></div>
    </div>
    
    <div class="title"><div class="icon-title"></div><div class="txt-title">جستجو</div></div>
    <div class="search">
    <form method="post" action="">
            <table width="auto" border="0" align="center" dir="rtl">
  <tbody>
    <tr>
      <td align="right" valign="middle" class="label">نام کتاب مورد نظر : </td></tr>
      <tr><td><input type="text" name="search" id="search" class="input"></td>
      
    
 <td align="right" valign="middle"><input type="submit" name="submit" id="submit" value="جستجو" class="submit"></td>
</tr>
  </tbody>
</table>
 </form>
 <?php
		if(isset($_POST['search']))
		{
			$s=$_POST['search'];
			$p=("select * from tblproducts where name='$s'");
			$r=mysql_query($p);
			if ($rows=@mysql_fetch_assoc($r))
				{
				echo '
				<table width=240 class=p-forosh>
   				<tr align=center >
      
				<td width=80><img src="picproduct.php?id='.$rows['productid'].'" width=70 height=70 class=p-forosh-img></td>
				<td width=160>'.$rows['name'].'<br>
				<a href="addbasket.php?pname='.$rows['name'].'& pid='.$rows['productid'].'">
			  	<img src="images/baskets2.png"></a>
			 	</td></tr>
				</table>
				<table width=100%><tr><td align=center><div></div></td></tr></table>';}
			else echo '<div class=label>کالای مورد نظر یافت نشد</div>';}
		?>
 </div>
 
	<div class="title"><div class="icon-title"></div><div class="txt-title">پرفروش ترین ها</div></div>
    <div class="search">
    <div class="fav">
    	<?php
					$p="select * from tblproducts order by emtiaz desc limit 0,10";
					$r=mysql_query($p);
					while ($rows=@mysql_fetch_assoc($r))
					{
					echo '<table width=240 class=p-forosh>
    <tr align=center >
      
      <td width=80><img src="picproduct.php?id='.$rows['productid'].'" width=70 height=70 class=p-forosh-img></td>
	  <td width=160>'.$rows['name'].'<br>
	  <a href="addbasket.php
	  ?pname='.$rows['name'].'&
	  pid='.$rows['productid'].'
	  
	  ">
	  <img src="images/baskets2.png"></a>
	  </td>
    </tr>
</table>
<table width=100%><tr><td align=center><div></div></td></tr></table>';}
				?>

    </div>
    
    </div>
 
</div>
<!---- End left ---->

<!---- footer ---->
<div class="footer">
	<div class="footer-box">&copy; کلیه حقوق مادی و معنوی این سایت محفوظ می باشد . </div>
</div>
<!---- End footer ---->
</body>
</html>
<?php
    ob_end_flush();
?>