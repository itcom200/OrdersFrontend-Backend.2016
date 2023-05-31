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
$query_Recordset1 = "SELECT * FROM dbmembers_orders_detail where mbOrderID = '$mbOrderID'";
$Recordset1 = mysql_query($query_Recordset1, $conpro) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


mysql_select_db($database_conpro, $conpro);
$query_Recordset2 = "SELECT * FROM dbmembers_order where mbOrderID='$mbOrderID'";
$Recordset2 = mysql_query($query_Recordset2, $conpro) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);


mysql_select_db($database_conpro, $conpro);
$query_Recordset3 = "SELECT * FROM dbmembers_product";
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
tr {
	text-align: left;
}
</style>
</head>

<body>
<p>&nbsp;</p>
<p><h1>&nbsp;</h1>
<h1>ออเดอร์การส่งซ่อมเลขที่ #  <?php echo $row_Recordset1['mbOrderID']; ?></h1>
<table width="1330" border="1">
  <tr>
    <td width="142" bgcolor="#66FF99"><strong>Username</strong></td>
    <td width="164" bgcolor="#66FF99"><strong>Date</strong></td>
    <td width="187" bgcolor="#66FF99"><strong>Name</strong></td>
    <td width="340" bgcolor="#66FF99"><strong>Address</strong></td>
    <td width="124" bgcolor="#66FF99"><strong>Tel</strong></td>
    <td width="201" bgcolor="#66FF99"><strong>Email</strong></td>
    <td width="126" bgcolor="#66FF99"><strong>Status</strong></td>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_Recordset2['username']; ?></td>
    <td><?php echo $row_Recordset2['mbOrderDate']; ?></td>
    <td><?php echo $row_Recordset2['Name']; ?></td>
    <td><?php echo $row_Recordset2['Address']; ?></td>
    <td><?php echo $row_Recordset2['Tel']; ?></td>
    <td><?php echo $row_Recordset2['Email']; ?></td>
    <td><?php echo $row_Recordset2['Status']; ?></td>
    </tr>
  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</table>
&nbsp;
</p>
<table width="1018" border="1">
  <tr>
    <td width="95" bgcolor="#66FF99"><strong>DetailID</strong></td>
    <td width="87" bgcolor="#66FF99"><strong>OrderID</strong></td>
    <td width="87" bgcolor="#66FF99"><strong>ProductID</strong></td>
    <td width="576" bgcolor="#66FF99"><strong>Detail</strong></td>
    <td width="139" bgcolor="#66FF99"><strong>Price</strong></td>
  </tr>
  <?php do { ?>
  <tr>
    <td height="23"><?php echo $popp=$row_Recordset1['mbDetailID']; ?></td>
    <td><?php echo $poop=$row_Recordset1['mbOrderID']; ?></td>
    <td><?php echo $oo=$row_Recordset1['mbProductID']?></td>
    <td><?php mysql_select_db($database_conpro, $conpro);
$query_Recordset3 = "SELECT * FROM dbmembers_product where mbProductID = '$oo'";
$Recordset3 = mysql_query($query_Recordset3, $conpro) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3); 

do { 
echo $row_Recordset3['mbDetail'];
?>
</td>
    <td><?php echo $row_Recordset3['mbPrice'];  ?></td>
    <?php } while ( $row_Recordset3 = mysql_fetch_assoc($Recordset3)); ?>
    </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
</body>
</html>
