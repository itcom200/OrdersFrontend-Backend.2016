<?php
session_start();

mysql_connect("localhost","root","1234");
mysql_db_query("pro","SET NAMES UTF8");

  $Total = 0;
  $SumTotal = 0;

  $strSQL = "
	INSERT INTO dborder (OrderDate,Name,Address,Tel,Email,Status)
	VALUES
	('".date("Y-m-d H:i:s")."','".$_POST["txtName"]."','".$_POST["txtAddress"]."' ,'".$_POST["txtTel"]."','".$_POST["txtEmail"]."','".$_POST["txtStatus"]."') 
  ";
  mysql_query($strSQL) or die(mysql_error());

  $strOrderID = mysql_insert_id();

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO dborders_detail (OrderID,ProductID,Qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."') 
			  ";
			  mysql_query($strSQL) or die(mysql_error());
	  }
  }

mysql_close();

session_destroy();

header("location:VE-finish_order.php?OrderID=".$strOrderID);
?>
