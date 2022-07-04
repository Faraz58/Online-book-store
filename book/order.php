<?php  
include ('connect.php');
include ('funcs.php');
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
	<div class="title"><div class="icon-title"></div><div class="txt-title">مدیریت سفارشات</div></div>
    <div class="content">
    
    	<table border="0px" width="800px" align="center" class="tbl-cat">
        <tr align="center">
        <td width="10px" style="border-left:1px solid #000000;">ردیف</td>
        <td width="60px" style="border-left:1px solid #000000;">کد سفارش</td>
        <td width="80px" style="border-left:1px solid #000000;">نام محصول</td>
        <td width="70px" style="border-left:1px solid #000000;">نام کاربر</td>
        <td width="50px" style="border-left:1px solid #000000;">قیمت</td>
        <td width="10px" style="border-left:1px solid #000000;">تعداد</td>
        <td width="50px" style="border-left:1px solid #000000;">قیمت کل</td>
        <td width="190px" style="border-left:1px solid #000000;">آدرس</td>
        <td width="70px" style="border-left:1px solid #000000;">تلفن</td>
        <td width="200px" style="border-left:1px solid #000000;">توضیحات</td>
        <td width="10px">حذف</td>
        </tr>
        
        
        <?php
			
		
		$r=mysql_query("select * from tblorder");
		$i=0;
		while($rows=mysql_fetch_assoc($r))
		{
		
					$p="select * from tblbasket where userid='".$rows['userid']."' and flag=".$rows['orderid'];
					$r2=mysql_query($p);
					
					$sum=0;
					$sum2=0;
					while($rows2=@mysql_fetch_assoc($r2))
					{
					$sum2+=$rows2['tedad'];
					$sum+=getProductPrice($rows2['productid']);
					
		
			echo "<tr align=center>";
			echo "<td>".++$i."</td>";
			echo "<td>".$rows['orderid']."</td>";
			echo "<td>".getproductName($rows2['productid'])."</td>";
			echo "<td>".$rows['userid']."</td>";
			echo "<td>".getProductPrice($rows2['productid'])."</td>";
			echo "<td>".$sum2."</td>";
			echo "<td>".addCama(strval($sum))."</td>";
			echo "<td>".$rows['address']."</td>";
			echo "<td>".$rows['tell']."</td>";
			echo "<td>".$rows['tozihat']."</td>";
			echo "<td><a href=delorder.php?id=".$rows['orderid'].">حذف</a></td>";
			
			
			echo "</tr>";
					}
		}
	
	
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
<?php
    ob_end_flush();
?>