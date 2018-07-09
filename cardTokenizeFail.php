<?php include('menu.php');?>

<?php
   
   
   $statusCode =$_POST['StatusCode'];
   $resultCode=$_POST['ResultCode'];
   $resultMessage=$_POST['ResultMessage'];
   $tokenId=$_POST['TokenId'];
   $maskedCCNo=$_POST['MaskedCCNo'];
   $customerId=$_POST['CustomerId'];


   print "<h3>Sonuç:</h3>";
   echo "<pre>";
   echo "Statuscode: $statusCode"+"</br>";
   echo "ResultCode: $resultCode"+"</br>";
   echo "ResultMessage: $resultMessage"+"</br>";
   echo "TokenId: $tokenId"+"</br>";
   echo "MaskedCCNo: $maskedCCNo"+"</br>";
   echo "CustomerId: $customerId"+"</br>";
   echo "</pre>";
?>	 
<?php include('footer.php');?>