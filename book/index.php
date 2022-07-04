<?php  
session_start();
ob_start();
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
 <?php
					define( 'perPage', 5);
					$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
					
					if(isset($_GET['cat']))
					{
					$p="select * from tblproducts  where catid=".$_GET['cat']." order by date desc";
					}
					
					else
					{$p="select * from tblproducts order by date desc LIMIT ".(perPage*($page-1)).", ".perPage."";}
					
					$r=mysql_query($p);
					while ($rows=@mysql_fetch_assoc($r))
					{
                    echo'         
	<div class="title"><div class="icon-title"></div><div class="txt-title">'.$rows['name'].'</div></div>
    <div class="content">
    	<div class="pic-book"><img src="picproduct.php?id='.$rows['productid'].'"></div>
        <div class="detail-book">
        	<table border="0px" width="370px" style="margin-top:8px;">
            	<tr>
                	<td width="60px"><b>نام کتاب :</b></td>
                    <td width="310px" colspan="3">'.$rows['name'].'</td>
                </tr>
                <tr>
                	<td width="60px"><b>موضوع :</b></td>
                    <td width="100px">'.getCatName($rows['catid']).'</td>
                    
                    <td width="60px"><b>نویسنده :</b></td>
                    <td>'.$rows['nevisande'].'</td>
                </tr>
                <tr>
                	<td width="60px"><b>ناشر :</b></td>
                    <td>'.$rows['nasher'].'</td>
                    
                    <td width="60px"><b>قیمت :</b></td>
                    <td style="color:#ff0000;">'.addCama(strval ($rows['gheymat'])).'&nbsp; ریال</td> 
                </tr>
                <tr>
                	<td width="60px" height="55px" valign="top"><b>جزئیات :</b></td>
                    <td colspan="3" valign="top">'.$rows['tozihat'].'</td>
                </tr>
            </table></div>'; ?>
        <?php if(isset($_SESSION['login'])) 
			{
				if ($_SESSION['login']!=0)
				{
		echo '
        <div class="add-basket"><a href="addbasket.php?pname='.$rows['name'].'&
	  pid='.$rows['productid'].'"><img src="images/baskets2.png"></a></div></div>';
			}
	  		else {
				echo'
        <div class="error-login-icon"><img src="images/login.png"></div>
        <div class="error-login-txt">برای خرید کتاب ؛ لطفاً عضو سایت شوید.</div>
        <div class="add-basket"><img src="images/baskets2.png"></div>
		</div>';
			}
			}
					?> 
                    
			 <?php if(!isset($_SESSION['login'])) 
			{
				echo'
        <div class="error-login-icon"><img src="images/login.png"></div>
        <div class="error-login-txt">برای خرید کتاب ؛ لطفاً عضو سایت شوید.</div>
        <div class="add-basket"><img src="images/baskets2.png"></div>
		</div>';
			} }?>
			
					
<?php
if(isset($_GET['cat']))
			{
									
			}

			
            else { 
			echo '<table cellpadding="5" cellspacing="5" id="page">
<tr><td>';
			echo 'صفحات سایت |';		
if($r>perPage)
    for($p=1; $p<= ceil($r/perPage); $p++)
	{
	
        echo '<a href="?page=', $p, '"> ', $p, '&nbsp;|</a>';}}					
			
			
echo'</td></tr></table>';
?>         
					
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