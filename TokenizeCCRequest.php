<?php


/**
 * Direk Kart Saklama yöntemi ile kart saklama servisi için gerekli olan alanların tanımlandığı sınıftır.
 * Bu sınıf içerisinde execute metodu ile servis çağrısı başlatılır.
 * Execute metodu içerisinde tanımlanan "toXmlString" metodu gerekli xml metninin oluşturulmasını sağlar.
 * Execute metodu içerisinde tanımlanan url adresine oluşturulan xml post edilir.
 */
class TokenizeCCRequest
{
    public  $ServiceType; 
    public  $OperationType; 
    public  $Token;
    public  $CreditCardNumber; 
    public  $NameSurname;
    public  $ExpiryDate;
    public  $CVV;
    public  $CustomerId;
    public  $ValidityPeriod;
    public  $IPAddress;
    public  $Port;
    public  $BaseUrl;


    public static function Execute(TokenizeCCRequest $request)
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
        "    <CreditCardNumber>" . $this->CreditCardNumber . "</CreditCardNumber>\n" . 
        "    <NameSurname>" . $this->NameSurname . "</NameSurname>\n" . 
        "    <ExpiryDate>" . $this->ExpiryDate . "</ExpiryDate>\n" . 
        "    <CVV>" . $this->CVV . "</CVV>\n" . 
        "    <CustomerId>" . $this->CustomerId . "</CustomerId>\n" . 
        "    <ValidityPeriod>" . $this->ValidityPeriod . "</ValidityPeriod>\n" . 
        "    <IPAddress>" . $this->IPAddress . "</IPAddress>\n" . 
        "    <Port>" . $this->Port . "</Port>\n" . 
        "</WIRECARD>";
        // echo $xml_data;
         //$xml_data = iconv("UTF-8","ISO-8859-9", $xml_data);
         return $xml_data;
    }
}
