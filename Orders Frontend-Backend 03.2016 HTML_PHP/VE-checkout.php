<?php
session_start();
?>
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
.container .content table tr td table tr td {
	text-align: left;
}
.container .content table tr td form table {
	text-align: left;
	color: #000;
}
.container .content table {
	text-align: center;
}
-->
</style>


</head>

<body>

<div class="container">
  <div class="content">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h1>ยืนยันการสั่งซื้อ</h1>
    <p>&nbsp;</p>
    <p>
      <?php
mysql_connect("localhost","root","1234");
mysql_db_query("pro","SET NAMES UTF8");
?>
    </p>
    <table width="960"  border="1">
      <tr>
        <td width="191" bgcolor="#FFFF99"><h3>รหัสสินค้า</h3></td>
        <td width="353" bgcolor="#FFFF99"><h3>สินค้าและการบริการ</h3></td>
        <td width="134" bgcolor="#FFFF99"><h3>ราคา</h3></td>
        <td width="140" bgcolor="#FFFF99"><h3>จำนวน</h3></td>
        <td width="108" bgcolor="#FFFF99"><h3>รวม</h3></td>
      </tr>
      <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM dbproduct WHERE ProductID = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
		$objResult = mysql_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["ProductPrice"];
		$SumTotal = $SumTotal + $Total;
	  ?>
      <tr>
        <td><?php echo $_SESSION["strProductID"][$i];?></td>
        <td><?php echo $objResult["ProductDetail"];?></td>
        <td><?php echo $objResult["ProductPrice"];?></td>
        <td><?php echo $_SESSION["strQty"][$i];?></td>
        <td><?php echo number_format($Total,2);?></td>
      </tr>
      <?php
	  }
  }
  ?>
    </table>
    <table width="959" border="0">
      <tr>
        <td width="196" height="27" bgcolor="#FFFF99"><h3>ราคารวม </h3></td>
        <td width="640" bgcolor="#FFFF99"><h3>&nbsp;</h3></td>
        <td width="109" bgcolor="#FFFF99"><?php echo number_format($SumTotal,2);?></td>
      </tr>
    </table>
    <table width="960" height="325" border="0">
      <tr>
        <td width="65" height="321">&nbsp;</td>
        <td width="885"><br><br>
<form name="form1" method="post" action="VE-save_checkout.php">
  <table width="821" border="1">
    <tr>
      <td width="126" bgcolor="#FFFF99">Name</td>
      <td width="679" bgcolor="#FFFF99"><input name="txtName" type="text" size="50"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFF99">Address</td>
      <td bgcolor="#FFFF99"><textarea name="txtAddress" cols="50"></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#FFFF99">Tel</td>
      <td bgcolor="#FFFF99"><input name="txtTel" type="text" size="25"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFF99">Email</td>
      <td bgcolor="#FFFF99"><input name="txtEmail" type="text" size="25"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFF99">Status</td>
      <td bgcolor="#FFFF99"><label>
        <input name="txtStatus" type="text" id="txtStatus" value="รอการยืนยัน" size="6" readonly="readonly" />
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#FFFF99">&nbsp;</td>
      <td bgcolor="#FFFF99"><input type="submit" name="Submit" value="      สั่งซื้อ      " />
        <input type="reset" name="Reset" id="button" value="ยกเลิก" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>

        
        &nbsp;</td>
      </tr>
    </table>
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
