<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
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
	text-align: center;
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

/* ~~ this fixed width container surrounds the other divs ~~ */
.container {
	width: 960px;
	background-color: #FFF;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout */
}

/* ~~ the header is not given a width. It will extend the full width of your layout. It contains an image placeholder that should be replaced with your own linked logo ~~ */
.header {
	background-color: #ADB96E;
}

/* ~~ This is the layout information. ~~ 

1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

*/

.content {

	padding: 10px 0;
}

/* ~~ The footer ~~ */
.footer {
	padding: 10px 0;
	background-color: #CCC49F;
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
.clearfloat { /* this class can be placed on a <br /> or empty div as the final element following the last floated div (within the #container) if the #footer is removed or taken out of the #container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style>
</head>

<body>

<div class="container">
  <div class="content">
    <p>
      <?php
mysql_connect("localhost","root","1234");
mysql_db_query("pro","SET NAMES UTF8");

$strSQL = "SELECT * FROM dborder WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery = mysql_query($strSQL)  or die(mysql_error());
$objResult = mysql_fetch_array($objQuery);
?>
    </p>
    <table width="960" border="0">
      <tr>
        <td width="331"><h1>ใบสั่งซื้อ</h1>
        <p><img src="Image/honda.png" alt="" width="199" height="71" /></p></td>
      </tr>
    </table>
    <table width="960" border="0">
      <tr>
        <td width="369">&nbsp;</td>
        <td width="581"><p>&nbsp;</p>
        <p>&nbsp;</p></td>
      </tr>
    </table>
    <table width="957" border="1">
      <tr>
        <td width="134" height="29">OrderID</td>
        <td width="321"><?php echo $objResult["OrderID"];?></td>
        <td width="480" rowspan="5"><img src="Image/acc.png" width="457" height="162" /></td>
      </tr>
      <tr>
        <td width="134">Name</td>
        <td width="321"><?php echo $objResult["Name"];?></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><?php echo $objResult["Address"];?></td>
      </tr>
      <tr>
        <td>Tel</td>
        <td><?php echo $objResult["Tel"];?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $objResult["Email"];?></td>
      </tr>
    </table>
    <br />
    <table width="960"  border="1">
      <tr>
        <td width="120" bgcolor="#FFFF99"><h3>รหัสสินค้า</h3></td>
        <td width="416" bgcolor="#FFFF99"><h3>สินค้าและบริการ</h3></td>
        <td width="141" bgcolor="#FFFF99"><h3>ราคา</h3></td>
        <td width="89" bgcolor="#FFFF99"><h3>จำนวน</h3></td>
        <td width="160" bgcolor="#FFFF99"><h3>รวม</h3></td>
      </tr>
      <?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM dborders_detail WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery2 = mysql_query($strSQL2)  or die(mysql_error());

while($objResult2 = mysql_fetch_array($objQuery2))
{
		$strSQL3 = "SELECT * FROM dbproduct WHERE ProductID = '".$objResult2["ProductID"]."' ";
		$objQuery3 = mysql_query($strSQL3)  or die(mysql_error());
		$objResult3 = mysql_fetch_array($objQuery3);
		$Total = $objResult2["Qty"] * $objResult3["ProductPrice"];
		$SumTotal = $SumTotal + $Total;
	  ?>
      <tr>
        <td><?php echo $objResult2["ProductID"];?></td>
        <td><?php echo $objResult3["ProductDetail"];?></td>
        <td><?php echo $objResult3["ProductPrice"];?></td>
        <td><?php echo $objResult2["Qty"];?></td>
        <td><?php echo number_format($Total,2);?></td>
      </tr>
      <?php
 }
  ?>
    </table>
    <table width="956" border="0">
      <tr>
        <td width="784" bgcolor="#FFFF99"><h3>รวมทั้งสิ้น&nbsp;</h3></td>
        <td width="156" bgcolor="#FFFF99"><?php echo number_format($SumTotal,2);?></td>
      </tr>
    </table>
    <p>&nbsp; </p>
    <h1>&nbsp;</h1>
    <table width="343" height="131" border="0">
      <tr>
        <td width="225" height="127"><img src="Image/bc.png" width="225" height="103" /></td>
        <td width="108"><img src="Image/bc02.jpg" width="111" height="125" /></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  <!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
<!-- end .container --></div>
<?php
mysql_close();
?>
</body>
</html>
