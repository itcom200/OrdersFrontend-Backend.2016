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

/* ~~ this fixed width container surrounds all other elements ~~ */
.container {
	width: 960px;
	background-color: #FFF;
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
-->
</style></head>

<body>

<div class="container">
  <div class="content">
    <form id="form1" name="form1" method="post" action="admin-P22.php">
      <table width="959" height="507" border="0">
        <tr>
          <td width="50" height="140">&nbsp;</td>
          <td colspan="4"><h1>Update<strong></strong>
            <?php 
 $con=mysql_connect("localhost","root","1234") 
or die ("ไม่สามรถเชื่อมต่อได้".mysql_error());
mysql_db_query("pro","SET NAMES UTF8");

$sql="select* from dbproduct where ProductID= '$ProductID' ";
//แสดงผล
$result = mysql_query($sql)
or die ("select error".mysql_error());
$rs=mysql_fetch_array($result);
// value="<?php echo $rs["id"] >"

?>
          </h1></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="94">ID</td>
          <td width="7">:</td>
          <td width="575"><label>
            <input name="ProductID" type="text" id="ProductID" value="<?php echo $rs["ProductID"] ?>" size="10" readonly="readonly" />
          </label></td>
          <td width="211">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="94">Type</td>
          <td>:</td>
          <td><select name="ProductType" id="ProductType">
            <option>เลือก...</option>
            <option value="บริการ">บริการ</option>
            <option value="สินค้า">สินค้า</option>
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Detail</td>
          <td>:</td>
          <td><textarea name="ProductDetail" id="ProductDetail" cols="45" rows="5"><?php echo $rs["ProductDetail"] ?></textarea></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Price</td>
          <td>:</td>
          <td><input name="ProductPrice" type="text" id="ProductPrice" value="<?php echo $rs["ProductPrice"] ?>" size="30" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>:</td>
          <td><input type="submit" name="button" id="button" value="Update" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="95">&nbsp;</td>
          <td><a href="admin-P1.php">&lt;&lt; BACK</a></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
  <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>