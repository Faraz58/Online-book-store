<?php
session_start();
ob_start();
 include ('connect.php');
 include ('funcs.php'); 
 
if(isset($_POST['address']))
{
$p=sprintf("INSERT INTO `tblorder` ( `userid`  , `address` , `codeposti` , `tell` , `tozihat` )VALUES ('%s', '%s', '%s','%s', '%s');",$_SESSION['us'],$_POST['address'],$_POST['codeposti'],$_POST['tell'],$_POST['tozihat']);
	mysql_query($p);
	
	$p="select * from tblorder order by orderid desc";
	$r=mysql_query($p);
	$rows=mysql_fetch_assoc($r);
	$o=$rows['orderid'];
	
	$p="update tblbasket set flag='".$rows['orderid']."' where flag=0 and userid='".$_SESSION['us']."'";
	mysql_query($p);
}
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ثبت خرید</title>
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
	<div class="title"><div class="icon-title"></div><div class="txt-title">ثبت خرید</div></div>
  <div class="content">
    <p class="order">برای تکمیل فرآیند خرید لطفاً ابتدا مبلغ مورد نظر را به شماره حساب 9876543210 نزد بانک ملی ایران واریز نموده و شماره فیش را در قسمت توضیحات وارد کنید.</p>
    <form method="post" action="" enctype="multipart/form-data">           
      <table width="auto" border="0" align="right" dir="rtl">
  <tbody>
  
    <tr>
      <td align="right" valign="middle" class="label">تلفن : </td>
      <td align="right" valign="middle"><input type="text" name="tell" id="tell" class="input"></td>
    </tr>
    <tr>
      <td align="right" valign="middle" class="label">آدرس : </td>
      <td align="right" valign="middle"><textarea name="address" rows="5" id="address"></textarea></td>
      
    </tr>
    <tr>
      <td align="right" valign="middle" class="label">کد پستی : </td>
      <td align="right" valign="middle"><input type="text" name="codeposti" id="codeposti" class="input"></td>
      
    </tr>
    <tr>
      <td align="right" valign="middle" class="label">توضیحات : </td>
      <td align="right" valign="middle"><textarea name="tozihat" rows="5" id="tozihat"></textarea></td>
      
    </tr>
    <tr>
    <td align="right" valign="middle"><input type="submit" name="submit" id="submit" value="ثبت خرید" class="submit"></td>
      <td align="right" valign="middle"><input type="reset" name="Reset" id="Reset" value="انصراف" class="submit"></td>
      
    </tr>
  </tbody>
</table>
</form>      
<?php
if(isset($_POST['address']))
 echo '
 <p style="font-family:byekan; font-size:14px; color:green; margin:10px 20px 10px 0px;">سفارش شما با موفقیت ثبت شد . <br>
 شماره سفارش شما : '.$o.'</p>
 '
 ?>	
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