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


$colname_Recordset1 = "-1";
if (isset($_POST['keyword'])) {
  $colname_Recordset1 = $_POST['keyword'];
}
mysql_select_db($database_conpro, $conpro);
$query_Recordset2 = sprintf("SELECT * FROM dbmembers_order WHERE Name LIKE %s ORDER BY mbOrderID ASC", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
$Recordset2 = mysql_query($query_Recordset2, $conpro) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
//where Status='$Status'






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
	background-color: #FFFFFF;
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
body table {
	text-align: center;
}
-->
</style></head>

<body>
<h1>&nbsp;</h1>
<h1><?php echo $keyword ?></h1>
<p>&nbsp;</p>
<table width="2381" border="1">
  <tr>
    <td width="94" bgcolor="#66FF99">OrderID</td>
    <td width="215" bgcolor="#66FF99">วันนัดหมาย</td>
    <td width="215" bgcolor="#66FF99">วันลงทะเบียน</td>
    <td width="168" bgcolor="#66FF99">Username</td>
    <td width="258" bgcolor="#66FF99">ชือ</td>
    <td width="344" bgcolor="#66FF99">ที่อยู่</td>
    <td width="185" bgcolor="#66FF99">เบอร์</td>
    <td width="320" bgcolor="#66FF99">Email</td>
    <td width="143" bgcolor="#66FF99">สถานะ</td>
    <td width="127" bgcolor="#66FF99">&nbsp;</td>
    <td width="210" bgcolor="#66FF99">&nbsp;</td>
    <td width="26" bgcolor="#66FF99">&nbsp;</td>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $oo1=$row_Recordset2['mbOrderID']; ?></td>
    <td><?php echo $oo2=$row_Recordset2['MembersDate']; ?></td>
    <td><?php echo $oo2=$row_Recordset2['mbOrderDate']; ?></td>
    <td><?php echo $oo3=$row_Recordset2['username']; ?></td>
    <td><?php echo $oo4=$row_Recordset2['Name']; ?></td>
    <td><?php echo $oo5=$row_Recordset2['Address']; ?></td>
    <td><?php echo $oo6=$row_Recordset2['Tel']; ?></td>
    <td><?php echo $oo7=$row_Recordset2['Email']; ?></td>
    <td><?php echo $oo8=$row_Recordset2['Status']; ?></td>
    <td><a href="LSF-MBorder3.php?mbOrderID=<?php echo  $row_Recordset2['mbOrderID']?>" target="_blank">รายการส่งซ่อม</a></td>
    <td><form id="form1" name="form1" method="post" action="LSF-MBorderEd.php?mbOrderID=<?php echo  $row_Recordset2['mbOrderID']?>">
      <label>
          <select name="txtselect" id="txtselect">
            <option value="ส่งซ่อม">ส่งซ่อม</option>
            <option value="รออะไหล่">รออะไหล่</option>
            <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
            <option value="พร้อมส่งมอบ">พร้อมส่งมอบ</option>
            <option value="เสร็จสิ้น">เสร็จสิ้น</option>
          </select>
        </label>
        <input type="submit" name="button" id="button" value="Submit" />
    </form></td>
    <td><a href="LSF-MBorderDel.php?mbOrderID=<?php echo  $row_Recordset2['mbOrderID']?>">ลบ</a></td>
  </tr>
  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</table>
<p>Number of Records = <?php 
echo mysql_num_rows($Recordset2)?>
<p>
<p><a href="LSF-MBorder1.php">&lt;&lt;BACK</a></p>
</body>
</html>
<?php


mysql_free_result($Recordset2);

?>
