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
   echo "OrderID: $orderId" +"</br>";
   echo "MPAY: $MPAY";
   echo "Statuscode: $Statuscode"+"</br>";
   echo "ResultCode: $ResultCode"+"</br>";
   echo "ResultMessage: $ResultMessage"+"</br>";
   echo "LastTransactionDate: $LastTransactionDate"+"</br>";
   echo "MaskedCCNo: $MaskedCCNo"+"</br>";
   echo "CCTokenId: $CCTokenId"+"</br>";
   echo "ExtraParam: $ExtraParam"+"</br>";

    echo "</pre>";
?>	 
<?php include('footer.php');?>