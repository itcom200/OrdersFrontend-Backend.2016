<?php require_once('Connections/conpro.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";


function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  
  $isValid = False; 

  if (!empty($UserName)) { 
   
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
   
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "MB-home.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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
$query_Recordset1 = "SELECT * FROM dbmembers";
$Recordset1 = mysql_query($query_Recordset1, $conpro) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);



mysql_select_db($database_conpro, $conpro);
$query_Recordset2 = "SELECT * FROM dbmembers_product";
$Recordset2 = mysql_query($query_Recordset2, $conpro) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);



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
<table width="958" height="353" border="0">
      <tr>
        <td width="952"><form id="form1" name="form1" method="post" action="MB-RQ2.php">
          <p>&nbsp;</p>
          <table width="948" border="0">
            <tr>
              <td width="89">&nbsp;</td>
              <td width="142">Username</td>
              <td width="10">:</td>
              <td width="601"><label>
                <input name="txtusername" type="text" id="txtusername" value="<?php echo $MM_Username; ?>" size="10" readonly="readonly" />
              Date of arrival :
              <input name="txtMembersDate" type="text" id="txtMembersDate" size="10" />
              *01/01/1016</label></td>
              <td width="84">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Name</td>
              <td>:</td>
              <td><input name="txtName" type="text" id="txtName" size="50" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Address</td>
              <td>:</td>
              <td><label>
                <textarea name="txtAddress" id="txtAddress" cols="50" rows="5"></textarea>
              </label></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Tel</td>
              <td>:</td>
              <td><input name="txtTel" type="text" id="txtTel" size="35" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Email</td>
              <td>:</td>
              <td><input name="txtEmail" type="text" id="txtEmail" size="35" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Status</td>
              <td>:</td>
              <td><input name="txtStatus" type="text" id="txtStatus" value="ส่งซ่อม" size="5" readonly="readonly" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>Select an issue</td>
              <td>:</td>
              <td><label>
                <select name="mbProductID" id="mbProductID">
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset2['mbProductID']?>"<?php if (!(strcmp($row_Recordset2['mbProductID'], $row_Recordset2['mbProductID']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset2['mbDetail']?></option>
            <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
          </select>
              </label></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="button" id="button" value="Submit" /></td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </form></td>
      </tr>
    </table>
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
<?php
mysql_free_result($Recordset1);
?>
</html>
