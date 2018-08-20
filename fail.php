<?php include('menu.php');?>
<?php
   
   $orderId =$_POST['OrderId'];
   $MPAY=$_POST['MPAY'];
   $Statuscode=$_POST['StatusCode'];
   $ResultCode=$_POST['ResultCode'];
   $ResultMessage=$_POST['ResultMessage'];
   $LastTransactionDate=$_POST['LastTransactionDate'];
   $MaskedCCNo=$_POST['MaskedCCNo'];
   $CCTokenId=$_POST['CCTokenId'];
   $ExtraParam=$_POST['ExtraParam'];
   print "<h3>Sonuç:</h3>";
   echo "<pre>";
   echo "OrderID: ";
   echo  $_POST['OrderId'];
   echo "</br>";
   echo "MPAY: ";
   echo $_POST['MPAY'];
   echo "</br>";
   echo "Statuscode: ";
   echo $_POST['StatusCode'];
   echo "</br>";
   echo "ResultCode: ";
   echo $_POST['ResultCode'];
   echo "</br>";
   echo "ResultMessage: ";
   echo $_POST['ResultMessage'];
   echo "</br>";
   echo "LastTransactionDate: ";
   echo $_POST['LastTransactionDate'];
   echo "</br>";
   echo "MaskedCCNo: ";
   echo $_POST['MaskedCCNo']; 
   echo "</br>";
   echo "CCTokenId: ";
   echo $_POST['CCTokenId']; 
   echo "</br>";
   echo "ExtraParam: ";
   echo $_POST['ExtraParam'];  
   echo "</br>";
    echo "</pre>";
?>	
<?php include('footer.php');?>