<?php require_once('Connections/conpro.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_conpro, $conpro);
$query_Recordset1 = "SELECT * FROM dbmembers_product";
$Recordset1 = mysql_query($query_Recordset1, $conpro) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
.container .content table {
	text-align: left;
}
-->
</style></head>

<body>

<div class="container">
  <div class="content">
    <h1>เรียกดูข้อมูลบริการส่งซ่อมต่างๆ</h1>
    <table width="959" border="1">
      <tr>
        <td width="144" bgcolor="#66FF99"><h3>ไอดี</h3></td>
        <td width="570" bgcolor="#66FF99"><h3>ปัญหา</h3></td>
        <td width="181" bgcolor="#66FF99"><h3>ราคา</h3></td>
        <td width="36" bgcolor="#FF0000"><h3>&nbsp;</h3></td>
      </tr>
      <?php do { ?>
        <tr>
          <td bgcolor="#66CCFF"><?php echo $uu=$row_Recordset1['mbProductID']; ?></td>
          <td><?php echo $row_Recordset1['mbDetail']; ?></td>
          <td><?php echo $row_Recordset1['mbPrice']; ?></td>
          <td rowspan="6" bgcolor="#FF6633"><a href=LFS-MBvis2.php?mbProductID=<?php echo $row_Recordset1["mbProductID"]?> onClick="return confirm('คุณต้องการลบข้อมูล')">ลบ</a></td>
        </tr>
        <tr>
          <td bgcolor="#FFFF99"><h3>สาเหตุ*1</h3></td>
          <td colspan="2"><?php echo $row_Recordset1['M1']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFF99"><h3>สาเหตุ*2</h3></td>
          <td colspan="2"><?php echo $row_Recordset1['M2']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFF99"><h3>สาเหตุ*3</h3></td>
          <td colspan="2"><?php echo $row_Recordset1['M3']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFF99"><h3>สาเหตุ*4</h3></td>
          <td colspan="2"><?php echo $row_Recordset1['M4']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFF99"><h3>สาเหตุ*5</h3></td>
          <td colspan="2"><?php echo $row_Recordset1['M5']; ?></td>
        </tr>
        <tr>
          <td bgcolor="#66FF99"><h3>ไอดี</h3></td>
          <td bgcolor="#66FF99"><h3>ปัญหา</h3></td>
          <td bgcolor="#66FF99"><h3>ราคา</h3></td>
          <td bgcolor="#FF0000"><h3>&nbsp;</h3></td>
        </tr>
        <?php  } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>&nbsp;
   
    <p>&nbsp;</p>
    <h5><a href="LFS-MB.php">&lt;&lt; BACK</a></h5>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
