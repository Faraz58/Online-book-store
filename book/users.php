<?php  
include ('connect.php');
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
	<div class="title"><div class="icon-title"></div><div class="txt-title">مدیریت کاربران</div></div>
    <div class="content">
    
    	<table border="0px" width="550px" align="center" class="tbl-cat">
        <tr align="center">
        <td width="20px">ردیف</td>
        <td width="100px">نام کاربری</td>
        <td width="100px">رمز عبور</td>
        <td width="100px">تلفن</td>
        <td width="210px">آدرس</td>
        <td width="20px">حذف</td>
        </tr>
        
        <?php 
		$i=0;
		$r=mysql_query("select * from tbluser");
			while($rows=@mysql_fetch_assoc($r))
			{
		echo"<tr align=center>";
        echo"<td>".++$i.'</td>';
        echo"<td>".$rows['userid']."</td>";
        echo"<td>".$rows['pass']."</td>";
        echo"<td>".$rows['tell']."</td>";
        echo"<td>".$rows['address']."</td>";
        echo"<td><a href=deluser.php?id=".$rows['pass'].">حذف</a></td>";}
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