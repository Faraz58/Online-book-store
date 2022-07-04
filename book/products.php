<?php  
include ('connect.php');
include ('funcs.php');

if(isset($_POST['catid'])&&isset($_POST['proname']))
{
$s=$_FILES['pic']['size'];
$t=$_FILES['pic']['type'];
$n=$_FILES['pic']['tmp_name'];

$fp=fopen($n,'r');
$pic=fread($fp,filesize($n));


	$p=sprintf("INSERT INTO `tblproducts` (`catid`, `name`, `gheymat`,`nevisande`,`nasher`, `pic`, `tozihat`, `emtiaz`, `date`)
VALUES ('%s', '%s', '%s', '%s', '%s', 0x%s , '%s', '0', '%s');",$_POST['catid'],$_POST['proname'],
$_POST['price'],$_POST['nevisande'],$_POST['nasher'],bin2hex($pic),
$_POST['tozihat'], $date=time());
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
	<div class="title"><div class="icon-title"></div><div class="txt-title">مدیریت محصولات</div></div>
    <div class="content">
    <p align="center" style="font-family:tahoma; font-size:12px; color:red;">
    لطفاً تمام فیلد ها را به طور کامل پر کنید . 
    <br />
    خالی گذاشتن هر یک از فیلد ها باعث ایجاد خطا می گردد.
    </p>
    <form method="post" action="" enctype="multipart/form-data" onSubmit="return checkinput(proname.value,catid.value,price.value,pic.value)">
    <table width="auto" border="0" dir="rtl">

<tr><td align="right" valign="middle" class="label">نام محصول : </td>
   	<td><input type="text" name="proname" class="input" id="name">
    </td></tr>

<tr><td align="right" valign="middle" class="label">دسته بندی : </td>
   	<td><select name="catid" id="catid" class="input" type="text">
        <option value=""></option>
        <?php 
			$r=mysql_query("select * from tblcat");
			$i=0;
			while($rows=mysql_fetch_assoc($r))
			echo '<option value="'.$rows['catid'].'">'.$rows['name'].'</option>'
		?>
        </select>
        </td></tr>

<tr><td align="right" valign="middle" class="label">قیمت : </td>
   	<td><input type="text" name="price" class="input" id="price">
    </td></tr>

<tr><td align="right" valign="middle" class="label">نویسنده : </td>
   	<td><input type="text" name="nevisande" class="input" id="nevisande">
    </td></tr>

<tr><td align="right" valign="middle" class="label">ناشر : </td>
   	<td><input type="text" name="nasher" class="input" id="nasher">
    </td></tr>

<tr><td align="right" valign="middle" class="label">تصویر : </td>
   	<td><input type="file" name="pic" class="input" id="pic">
    </td></tr>
        
<tr><td align="right" valign="middle" class="label">توضیحات : </td>
   	<td><textarea name="tozihat" cols="30" rows="5" type="text" id="tozihat"></textarea>
    </td></tr>
      
<tr><td align="center" valign="middle">
    <input type="submit" name="cat-submit" value="ثبت" class="submit"></td></tr>

</table>
<br />
    </form>
    	<table border="0px" width="600px" align="center" class="tbl-cat">
        <tr align="center">
        <td width="20px">ردیف</td>
        <td width="100px">نام محصول</td>
        <td width="80px">کد محصول</td>
        <td width="100px">عنوان دسته</td>
        <td width="100px">قیمت</td>
        <td width="100px">تصویر کالا</td>
        <td width="100px">حذف</td>
        </tr>
        
        <?php 
		$i=0;
		$r=mysql_query("select * from tblproducts");
			while($rows=@mysql_fetch_assoc($r))
			{
		echo"<tr align=center>";
        echo"<td>".++$i.'</td>';
        echo"<td>".$rows['name']."</td>";
        echo"<td>".$rows['productid']."</td>";
        echo"<td>".$rows['catid']."</td>";
        echo"<td>".$rows['gheymat']."</td>";
		echo"<td><img src='picproduct.php?id=".$rows['productid']."' width=80 height=80 /></td>";
        echo"<td><a href=delproduct.php?id=".$rows['productid'].">حذف</a></td>";}
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