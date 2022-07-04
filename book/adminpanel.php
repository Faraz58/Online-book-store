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
        </ul>
    </div>
    
</div>
<!---- End Right ---->

<!---- center ---->
<div class="center2">
	<div class="title"><div class="icon-title"></div><div class="txt-title">بخش مدیریت</div></div>
    <div class="content">
    	<p align="center" style="font-family:byekan; font-size:16px; color:red;">به بخش مدیریت خوش آمدید</p>
        
        <table width="200px" border="0px" height="auto" style="float:right; margin:0px 70px 10px 0px;"><tr><td>
     <ul style="list-style:url(images/panel-icon.png); font-family:byekan; font-size:16px; margin:5px 10px 15px 0px;">
        	<li><a href="category.php" style="color:#000;">مدیریت دسته ها</a></li>
            <li><a href="products.php" style="color:#000;">مدیریت محصولات</a></li>
            <li><a href="order.php" style="color:#000;">مدیریت سفارشات</a></li>
            <li><a href="users.php" style="color:#000;">مدیریت کاربران</a></li>
     </ul></td></tr></table>
     
     <table width="auto" border="0px" height="auto" style="float:left; margin:0px 0px 10px 50px;"><tr><td>
     <img src="images/admin-Man.jpg" style="border:2px solid #000000; border-radius:10px;">
        </td></tr></table>

    
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