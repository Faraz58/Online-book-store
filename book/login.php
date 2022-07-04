<?php
if(isset($_SESSION['login']))
{
 if($_SESSION['login']!=1)
{
?>
	<div class="title"><div class="icon-title"></div><div class="txt-title">ورود کاربران</div></div>
    <div class="right-menu">
    
    	<form method="post" action="check.php">
            <table width="auto" border="0" align="center" dir="rtl">

<tr>
	<td align="right" valign="middle" class="label">نام کاربری : </td></tr>
    
<tr>
	<td><input type="text" name="userid" class="input"></td>
</tr>
      
<tr>
	<td align="right" valign="middle" class="label">رمز عبور : </td>
</tr>

<tr>
    <td><input type="password" name="pass" class="input"></td>
</tr>
      
<tr>   
	<td align="center" valign="middle">
    <input type="submit" name="submit2" value="ورود" class="submit"></td>
</tr>

</table>
 </form>
 
 <form method="post" action="register.php">
 <table width="auto" border="0" align="center" dir="rtl">
 	<tr>   
	<td align="center" valign="middle">
    <input type="submit" name="submit3" id="submit3" value="ثبت نام" class="submit"></td>
</tr>
 </table>
 </form>
 </div>
	<?php  }
	else
	{
	?>
		
		<div class="title"><div class="icon-title"></div><div class="txt-title">خوش آمدید</div></div>
    <div class="right-menu">
    
    	<form method="post" action="logout.php">
            <table width="auto" border="0" align="center" dir="rtl">

<tr>
	<td align="right" valign="middle" class="label">کاربر گرامی ؛ <?php echo $_SESSION['us'] ?> خوش آمدید</td></tr>
      
<tr>   
	<td align="center" valign="middle">
    <input type="submit" name="submit3" id="submit3" value="خروج" class="submit"></td>
</tr>

</table>
 </form>
 <p align="center" style="font-family:byekan; font-size:16px; color:red;">سبد خرید شما</p>
		  
                <table width="100%">
                  <tr style="border:1px solid #000; font-family:byekan; font-size:12px;">
                  	<td width="12%" style="border:1px solid #000;"><div align="center">ردیف</div></td>
                    <td width="40%" style="border:1px solid #000;"><div align="center">نام کالا </div></td>
                    <td width="9%" style="border:1px solid #000;"><div align="center">قیمت</div></td>
					<td width="28%" style="border:1px solid #000;"><div align="center">تعداد</div></td>
                    <td width="11%" style="border:1px solid #000;"><div align="center">حذف</div></td>
                    
                    
                    
                  </tr>
                  
                    <?php    
					
					$p="select * from tblbasket where userid='".$_SESSION['us']."' and flag=0";
					$r=mysql_query($p);
					$i=0;
					$sum=0;
					$sum2=0;
					while($rows=@mysql_fetch_assoc($r))
					{
					$sum2+=$rows['tedad'];
					$sum+=getProductPrice($rows['productid']);
					echo "
					<tr style=\"font-family:byekan; font-size:12px;\">
					<td align=center>".++$i."</td>
                    <td align=right>".getproductName($rows['productid'])."</td>
					<td align=left>".getProductPrice($rows['productid'])."</td>
					<td align=center>".$rows['tedad']."</td>
					<td><a href=delbasket.php?id=".($rows['productid']).">حذف</a></td>
					</tr>";
					}
					
					 ?>  
					<tr style="border:1px solid #000; font-family:byekan; font-size:12px;" align="center">
                    <td width="12%">&nbsp;</td>
                    <td width="40%">جمع کل خرید </td>
                    <td width="28%"><div align="center"><?php echo $sum; ?></div></td>
                    <td width="9%"><div align="center"><?php echo $sum2; ?></div></td>
                    <td width="11%"><div align="center"></div></td>
                    
					
                    
                    
					     </tr> 
              </table></td>
            </tr>
          </table>
		 
		  <p align="center">
		    <a href="kharid.php"><input name="submit6" type="submit" value="ثبت خرید" class="submit"></a>
		  </p>
          
    </div> 
	<?php	}} else { ?>
 
<div class="title"><div class="icon-title"></div><div class="txt-title">ورود کاربران</div></div>
    <div class="right-menu">
    
    	<form method="post" action="check.php">
            <table width="auto" border="0" align="center" dir="rtl">

<tr>
	<td align="right" valign="middle" class="label">نام کاربری : </td></tr>
    
<tr>
	<td><input type="text" name="userid" class="input"></td>
</tr>
      
<tr>
	<td align="right" valign="middle" class="label">رمز عبور : </td>
</tr>

<tr>
    <td><input type="password" name="pass" class="input"></td>
</tr>
      
<tr>   
	<td align="center" valign="middle">
    <input type="submit" name="submit2" value="ورود" class="submit"></td>
</tr>

</table>
 </form>
 
 <form method="post" action="register.php">
 <table width="auto" border="0" align="center" dir="rtl">
 	<tr>   
	<td align="center" valign="middle">
    <input type="submit" name="submit3" id="submit3" value="ثبت نام" class="submit"></td>
</tr>
 </table>
 </form>
 </div>
	<?php  } ?>
	