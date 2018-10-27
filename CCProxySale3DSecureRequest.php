<?php


/**
 * Bu sınıf içerisinde CCProxySale3DSecure servis çağrısı yapabilmek için gerekli olan servis alanlarını ifade eder.
 * Bu sınıf içerisinde execute metodu içerisinde toXmlString metodunda xml servis çağrısını başlatmak için gerekli xml datasını oluşturup, post işelmini başlatıyoruz.
 */
class CCProxySale3DSecureRequest
{
    public  $ServiceType; 
    public  $OperationType; 
    public  $Token; 
    public  $CreditCardInfo; 
    public  $MPAY; 
    public  $CurrencyCode; 
    public  $Port; 
    public  $ErrorURL; 
    public  $SuccessURL; 
    public  $IPAddress; 
    public  $PaymentContent; 
    public  $InstallmentCount; 
    public  $Description; 
    public  $ExtraParam; 
    public  $CardTokenization;
    public  $BaseUrl; 
    public static function Execute(CCProxySale3DSecureRequest $request)
    {
        return  restHttpCaller::post($request->BaseUrl, $request->toXmlString());
    }    
    
    //Post edilmesi istenen xml metni oluşturulup bu xml metni belirtilen adrese post edilir.
    public function toXmlString()
    {
        $xml_data = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n" .
        "<WIRECARD>\n" .
        "    <ServiceType>" . $this->ServiceType . "</ServiceType>\n" .
        "    <OperationType>" . $this->OperationType . "</OperationType>\n" .
        "    <Token>\n" .
        "    <UserCode>" .$this->Token->UserCode . "</UserCode>\n" .
        "    <Pin>" .$this->Token->Pin . "</Pin>\n" .
        "    </Token>\n" .
        "    <CreditCardInfo>\n" .
        "        <CreditCardNo>" . $this->CreditCardInfo->CreditCardNo . "</CreditCardNo>\n" .
        "        <OwnerName>" . $this->CreditCardInfo->OwnerName . "</OwnerName>\n" .
        "        <ExpireYear>" . $this->CreditCardInfo->ExpireYear . "</ExpireYear>\n" .
        "        <ExpireMonth>" . $this->CreditCardInfo->ExpireMonth . "</ExpireMonth>\n" .
        "        <Cvv>" . $this->CreditCardInfo->Cvv . "</Cvv>\n" .
        "        <Price>" . $this->CreditCardInfo->Price . "</Price>\n" .
        "    </CreditCardInfo>\n" .
        "    <CardTokenization>\n" .
        "        <RequestType>" . $this->CardTokenization->RequestType . "</RequestType>\n" .
        "        <CustomerId>" . $this->CardTokenization->CustomerId . "</CustomerId>\n" .
        "        <ValidityPeriod>" . $this->CardTokenization->ValidityPeriod . "</ValidityPeriod>\n" .
        "        <CCTokenId>" . $this->CardTokenization->CCTokenId . "</CCTokenId>\n" .
        "    </CardTokenization>\n" .
        "    <MPAY>" . $this->MPAY . "</MPAY>\n" .
        "    <CurrencyCode>" . $this->CurrencyCode . "</CurrencyCode>\n" .
        "    <Port>" . $this->Port . "</Port>\n" . 
        "    <ErrorURL>" . $this->ErrorURL . "</ErrorURL>\n" . 
        "    <SuccessURL>" . $this->SuccessURL . "</SuccessURL>\n" . 
        "    <IPAddress>" . $this->IPAddress . "</IPAddress>\n" .
        "    <PaymentContent>" . $this->PaymentContent . "</PaymentContent>\n" .
        "    <InstallmentCount>" . $this->InstallmentCount . "</InstallmentCount>\n" .
        "    <Description>" . $this->Description . "</Description>\n" .
        "    <ExtraParam>" . $this->ExtraParam . "</ExtraParam>\n" .
        "</WIRECARD>";
        $xml_data = iconv("UTF-8","ISO-8859-9", $xml_data);
         return $xml_data;
    }
}