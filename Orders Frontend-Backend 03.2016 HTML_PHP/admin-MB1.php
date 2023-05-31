<?php require_once('Connections/conpro.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "LFS-home.php";
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<table width="1396" height="178" border="0">
  <tr>
    <td width="68" height="76">&nbsp;</td>
    <td width="1318"><h1> เรียกดูข้อมูลผู้ใช้สมาชิก</h1>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="96">&nbsp;</td>
    <td><table width="1318" height="94" border="1">
      <tr>
        <td bgcolor="#66FFCC">ID</td>
        <td bgcolor="#66FFCC">Username</td>
        <td bgcolor="#66FFCC">Password</td>
        <td bgcolor="#66FFCC">Accesslevel</td>
        <td bgcolor="#66FFCC">Firstname</td>
        <td bgcolor="#66FFCC">Lastname</td>
        <td bgcolor="#66FFCC">Address</td>
        <td bgcolor="#66FFCC">Tel</td>
        <td bgcolor="#66FFCC">Email</td>
        <td bgcolor="#66FFCC">Del.</td>
      </tr>
      <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['mbID']; ?></td>
        <td><?php echo $row_Recordset1['username']; ?></td>
        <td><?php echo $row_Recordset1['password']; ?></td>
        <td><?php echo $row_Recordset1['accesslevel']; ?></td>
        <td><?php echo $row_Recordset1['firstname']; ?></td>
        <td><?php echo $row_Recordset1['lastname']; ?></td>
        <td><?php echo $row_Recordset1['Address']; ?></td>
        <td><?php echo $row_Recordset1['Tel']; ?></td>
        <td><?php echo $row_Recordset1['Email']; ?></td>
        <td><a href="admin-MB11.php?mbID=<?php echo  $row_Recordset1['mbID']?>">X</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
</table>
<table width="338" height="76" border="0">
  <tr>
    <td width="68">&nbsp;</td>
    <td width="254"><p>Number of Records =
        <?php 
echo mysql_num_rows($Recordset1)?>
    </p>
    <p><a href="admin-home1.php">&lt;&lt; BACK</a></p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
