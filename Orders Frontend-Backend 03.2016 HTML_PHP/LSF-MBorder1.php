<?php require_once('Connections/conpro.php'); ?>
<?php


mysql_select_db($database_conpro, $conpro);
$query_Recordset2 = "SELECT * FROM dbmembers";
$Recordset2 = mysql_query($query_Recordset2, $conpro) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);


mysql_select_db($database_conpro, $conpro);
$query_Recordset3 = "SELECT * FROM  dbmembers_order";
$Recordset3 = mysql_query($query_Recordset3, $conpro) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
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
	text-align: left;
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
	text-align: center;
}
-->
</style></head>

<body>
<div class="container">
  <div class="content">
    <h1>&nbsp;</h1>
    <h1>ค้นหาสถานะการส่งซ่อม</h1>
    <p>&nbsp;</p>
    <table width="959" border="0">
      <tr>
        <td bgcolor="#66FF99"><h5>ค้นหา</h5></td>
      </tr>
      <tr>
        <td><form id="form2" name="form1" method="post" action="LSF-MBorder2.php">
          สถานะ
              <select name="Status" id="Status">
            <option value="ส่งซ่อม" selected="selected">ส่งซ่อม</option>
            <option value="รออะไหล่">รออะไหล่</option>
            <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
            <option value="พร้อมส่งมอบ">พร้อมส่งมอบ</option>
            <option value="เสร็จสิ้น">เสร็จสิ้น</option>
          </select>
          <input type="submit" name="button" id="button" value="  ค้นหา  " />
        </form></td>
      </tr>
      <tr>
        <td width="352" height="27" bgcolor="#FFFFFF"><form id="form3" name="form3" method="post" action="LSF-MBorder2 - 2.php">
          ผูใช้
              <select name="username" id="username">
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset2['username']?>"<?php if (!(strcmp($row_Recordset2['username'], $row_Recordset2['username']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset2['username']?></option>
            <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
          </select>
          <input type="submit" name="button2" id="button2" value="  ค้นหา  " />
        </form></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><form id="form" name="form3" method="post" action="LSF-MBorder2 - 3.php">
          วันนัดหมาย
          <select name="MembersDate" id="MembersDate">
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset3['MembersDate']?>"<?php if (!(strcmp($row_Recordset3['MembersDate'], $row_Recordset3['MembersDate']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset3['MembersDate']?></option>
            <?php
} while ($row_Recordset3 = mysql_fetch_assoc($Recordset3));
  $rows = mysql_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysql_fetch_assoc($Recordset3);
  }
?>
          </select>
          <input type="submit" name="button3" id="button3" value="  ค้นหา  " />
        </form></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><form id="form4" name="form3" method="post" action="LSF-MBorder2 - 4.php">
          ซื่อ
              <label>
            <input type="text" name="keyword" id="keyword" />
          </label>
          <input type="submit" name="button4" id="button4" value="  ค้นหา  " />
        </form></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><form id="form5" name="form3" method="post" action="LSF-MBorder2 - 5.php">
        ที่อยู่
        <label>
            <input type="text" name="keyword2" id="keyword2" />
          </label>
          <input type="submit" name="button5" id="button5" value="  ค้นหา  " />
        </form></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><form id="form6" name="form3" method="post" action="LSF-MBorder2 - 6.php">
          เบอร์โทร
              <label>
            <input type="text" name="keyword3" id="keyword3" />
          </label>
          <input type="submit" name="button6" id="button6" value="  ค้นหา  " />
        </form></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><img src="Image/sBuy.jpg" width="348" height="349" /></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><a href="LFS-MB.php">&lt;&lt; BACK</a>    <!-- end .content --></p>
  </div>
<!-- end .container --></div>
</body>
</html>
