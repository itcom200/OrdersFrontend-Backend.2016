
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
	text-align: left;
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
.container .content table tr th {
	text-align: center;
}
.container .content table {
	text-align: left;
}
.container .content h2 {
	text-align: left;
}
#apDiv1 {
	position:absolute;
	left:520px;
	top:93px;
	width:236px;
	height:142px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:155px;
	top:99px;
	width:346px;
	height:35px;
	z-index:2;
}
-->
</style>
</head>

<body>
<div class="container">
  <div class="content">
<table width="960" border="0">
      <tr>
        <td width="78"><a href="HOME.php"><img src="Image/honda.png" alt="" width="199" height="71" /></a></td>
        <td width="282"><h5><a href="MB-RQ1.php">RESERVATIONS OF QUEUE</a></h5></td>
        <td width="183"><h5><a href="MB-PC1.php">POST  COMMENT</a></h5></td>
        <td width="198"><h5><a href="VE-BB.php" target="new">BULLETIN BOARD</a></h5></td>
        <td width="197"><h5 align="left"><a href="VE-CH.php" target="new">CONTACT HONDA</a></h5></td>
      </tr>
    </table>
<p>&nbsp;</p>
<table width="834" border="0">
  <tr>
    <td width="35">&nbsp;</td>
    <td width="495"><h2>Completed Post Comment</h2></td>
    <td width="290"><h6><a href="VE-PC.php">View post comment you&lt;ClicK!&gt;</a></h6></td>
  </tr>
</table>
<table width="892" height="293" border="0">
  <tr>
    <td width="53" height="32"><h3>
      <?php
	
	if(!copy($_FILES['img']['tmp_name'],$_FILES['img']['name']))
$pic=$_FILES['img']['name'];


$con=mysql_connect("localhost","root","1234") 
or die ("ไม่สามารถเชื่อมต่อได้ฐานข้อมูลได้".mysql_error());
mysql_db_query("pro","SET NAMES UTF8");

$sql="insert into dbpost
values ('$postID','$UserLogin','$Heading','$fine')";

$result=mysql_query($sql) or die ("เชื่อมได้แล้วแต่ตารางผิดพลาด".mysql_error());



?>
    </h3></td>
    <td width="157" bgcolor="#FFFF99"><h3>ผู้โพส </h3></td>
    <td width="668" bgcolor="#FFFF99"><p><?php echo $UserLogin;?></p></td>
  </tr>
  <tr>
    <td height="81"><h3></h3>      <h3>&nbsp;</h3></td>
    <td bgcolor="#FFFF99"><h3>หัวข้อกระทู้ </h3></td>
    <td bgcolor="#FFFF99"><p><?php echo $Heading;?></p></td>
  </tr>
  <tr>
    <td height="172">&nbsp;</td>
    <td bgcolor="#FFFF99"><h3>รายละเอียด </h3></td>
    <td bgcolor="#FFFF99"><p><?php echo $fine;?></p></td>
  </tr>
</table>
<p>&nbsp;</p>
  </div>
  <table width="488" border="0">
    <tr>
      <td width="138"><h5><a href="MB-logout.php">Log Out</a></h5></td>
      <td width="183"><h5><a href="MB-changepassword.php">Change Password</a></h5></td>
      <td width="153"><h5><a href="MB-RQ3.php">Repair Status</a></h5></td>
    </tr>
  </table>
</div>
</body>

</html>
