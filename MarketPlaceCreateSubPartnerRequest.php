<?php

/**
 * Pazaryeri oluşturma veya güncelleme için gerekli olan alanların tanımlandığı sınıftır.
 * Bu sınıf içerisinde execute metodu ile servis çağrısı başlatılır.
 * Execute metodu içerisinde tanımlanan "toXmlString" metodu gerekli xml metninin oluşturulmasını sağlar.
 * Execute metodu içerisinde tanımlanan url adresine oluşturulan xml post edilir.
 */
class MarketPlaceCreateSubPartnerRequest
{
    public  $ServiceType; 
    public  $OperationType; 
    public  $Token; 
    public  $UniqueId; 
    public  $SubPartnerType; 
    public  $BaseUrl;
	

    public static function Execute(MarketPlaceCreateSubPartnerRequest $request)
    {
        return  restHttpCaller::post($request->BaseUrl, $request->toXmlString());
    }    
    
    //Post edilmesi istenen xml metni oluşturulup bu xml metni belirtilen adrese post edilir.
    public function toXmlString()
    {
        $xml_data = "<?xml version=\"1.0\" encoding=\"ISO-8859-9\"?>\n" .
        "<WIRECARD>\n" .
        "    <ServiceType>" . $this->ServiceType . "</ServiceType>\n" .
        "    <OperationType>" . $this->OperationType . "</OperationType>\n" .
        "    <Token>\n" .
                "    <UserCode>" .$this->Token->UserCode . "</UserCode>\n" .
                "    <Pin>" .$this->Token->Pin . "</Pin>\n" .
        "    </Token>\n" .
        "    <UniqueId>" . $this->UniqueId . "</UniqueId>\n" .
        "    <SubPartnerId>" . $this->SubPartnerId . "</SubPartnerId>\n" .
        "    <SubPartnerType>" . $this->SubPartnerType . "</SubPartnerType>\n" .
        "    <Name>" . $this->Name . "</Name>\n" .
        "    <BranchName>" . $this->BranchName . "</BranchName>\n" .
        
        "</WIRECARD>";
        $xml_data = iconv("UTF-8","ISO-8859-9", $xml_data);
         return $xml_data;
        
    }
}