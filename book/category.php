<?php  
include ('connect.php');

if(isset($_POST['catname']))
{
	$p="INSERT INTO `tblcat` (`name`) VALUES ('".$_POST['catname']."');";
	mysql_query($p);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>فروشگاه کتاب</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="body">
<!---- Heade ---->
<div class="header"></div>
<div class="top-menu">
	<ul>
    	<li><a href="index.php">صفحه اصلی</a></li>
        <li><a href="register.php">ثبت نام</a></li>
    </ul>
</div>
<!---- End Heade ---->

<!---- Right ---->
<div class="right">
	<div class="title"><div class="icon-title"></div><div class="txt-title">مدیریت</div></div>
    <div class="right-menu">
    	<ul>
        	<li><a href="category.php">مدیریت دسته ها</a></li>
            <li><a href="products.php">مدیریت محصولات</a></li>
            <li><a href="order.php">مدیریت سفارشات</a></li>
            <li><a href="users.php">مدیریت کاربران</a></li>
            <li><a href="adminpanel.php">بخش مدیریت</a></li>
        </ul>
    </div>
    
</div>
<!---- End Right ---->

<!---- center ---->
<div class="center2">
	<div class="title"><div class="icon-title"></div><div class="txt-title">مدیریت دسته ها</div></div>
    <div class="content">
    
    <form action="" method="post">
    <table width="auto" border="0" dir="rtl" cellpadding="5px">

<tr>
	<td align="right" valign="middle" class="label">نام دسته : </td></tr>
    
<tr>
	<td><input type="text" name="catname" class="input"></td>
</tr>    
<tr>  
	<td align="center" valign="middle">
    <input type="submit" name="cat-submit" value="ثبت" class="submit"></td>
</tr>

</table>
<br />
    </form>
    	<table border="0px" width="600px" align="center" class="tbl-cat">
        <tr align="center">
        <td width="100px">ردیف</td>
        <td width="100px">کد دسته</td>
        <td width="300px">عنوان دسته</td>
        <td width="100px">حذف</td>
        </tr>
        
        <?php 
		$i=0;
		$r=mysql_query("select * from tblcat");
			while($rows=@mysql_fetch_assoc($r))
			{
		echo"<tr align=center>";
        echo"<td>".++$i.'</td>';
        echo"<td>".$rows['catid']."</td>";
        echo"<td>".$rows['name']."</td>";
        echo"<td><a href=delcat.php?id=".$rows['catid'].">حذف</a></td>";}
		?>
        </table>

    
</div>
</div>
<!---- End center ---->



<!---- footer ---->
<div class="footer">
	<div class="footer-box">&copy; کلیه حقوق مادی و معنوی این سایت محفوظ می باشد . </div>
</div>
<!---- End footer ---->
</body>
</html>