<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing div. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the divs, instead of the divs themselves, gets rid of any box model math. A nested div with side padding can also be used as an alternate method. */
	text-align: left;
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}
/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}

/* ~~ this fixed width container surrounds all other elements ~~ */
.container {
	width: 960px;
	background: #FFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout */
}

/* ~~ This is the layout information. ~~ 

1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

*/
.content {

	padding: 10px 0;
}

/* ~~ miscellaneous float/clear classes ~~ */
.fltrt {  /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class can be placed on a <br /> or empty div as the final element following the last floated div (within the #container) if the overflow:hidden on the .container is removed */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
#apDiv1 {
	position:absolute;
	left:853px;
	top:30px;
	width:28px;
	height:26px;
	z-index:1;
}
-->
</style></head>

<body>
<div class="container">
  <div class="content"><!-- end .content -->
    <table width="200" border="0">
      <tr>
        <td height="27"><table width="952" border="0">
          <tr>
            <td width="10" height="33">&nbsp;</td>
            <td width="810"><h2>
              <?php 
$con=mysql_connect("localhost","root","1234") 
or die ("ไม่สามารถเชื่อมต่อได้ฐานข้อมูลได้".mysql_error());
mysql_db_query("pro","SET NAMES UTF8");

$sql="insert into dbmembers
values ('mbID','$username','$password','$accesslevel','$firstname','$lastname','$Address','$Tel','$Email')";
$result=mysql_query($sql) or die ("เชื่อมได้แล้วแต่ตารางผิดพลาด".mysql_error());



?>
              <?php echo " สมัครสมาชิกเป็นที่เรียบร้อยลองล๊อกอินดูสิ ";?><a href="LFS-P0.php"></a></h2></td>
            <td width="118"><h3><a href="MB-home.php">LOGIN</a></h3></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><img src="Image/111dfs.jpg" width="955" height="715" /></td>
      </tr>
    </table>
  <p>&nbsp;</p></div>
<!-- end .container --></div>
</body>
</html>