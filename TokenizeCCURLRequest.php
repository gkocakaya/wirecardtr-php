<?php


/**
 * Url yöntemi ile kart saklama gerekli olan alanların tanımlandığı sınıftır.
 * Bu sınıf içerisinde execute metodu ile servis çağrısı başlatılır.
 * Execute metodu içerisinde tanımlanan "toXmlString" metodu gerekli xml metninin oluşturulmasını sağlar.
 * Execute metodu içerisinde tanımlanan url adresine oluşturulan xml post edilir.
 */
class TokenizeCCURLRequest
{
    public  $ServiceType; 
    public  $OperationType; 
    public  $Token;
    public  $CustomerId; 
    public  $ValidityPeriod;
    public  $ErrorURL; 
    public  $SuccessURL; 
    public  $IPAddress;
    public  $BaseUrl;


    public static function Execute(TokenizeCCURLRequest $request)
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
        "    <UserCode>" .urlencode($this->Token->UserCode) . "</UserCode>\n" .
        "    <Pin>" .urlencode($this->Token->Pin) . "</Pin>\n" .
        "    </Token>\n" .
        "    <CustomerId>" . $this->CustomerId . "</CustomerId>\n" . 
        "    <ValidityPeriod>" . $this->ValidityPeriod . "</ValidityPeriod>\n" . 
        "    <IPAddress>" . $this->IPAddress . "</IPAddress>\n" . 
        "    <ErrorURL>" . $this->ErrorURL . "</ErrorURL>\n" . 
        "    <SuccessURL>" . $this->SuccessURL . "</SuccessURL>\n" . 
        "</WIRECARD>";

         return $xml_data;
    }
}