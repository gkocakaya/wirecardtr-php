<?php

/**
 * Pazaryeri oluşturma veya güncelleme için gerekli olan alanların tanımlandığı sınıftır.
 * Bu sınıf içerisinde execute metodu ile servis çağrısı başlatılır.
 * Execute metodu içerisinde tanımlanan "toXmlString" metodu gerekli xml metninin oluşturulmasını sağlar.
 * Execute metodu içerisinde tanımlanan url adresine oluşturulan xml post edilir.
 */
class MarketPlaceAddOrUpdateRequest
{
    public  $ServiceType; 
    public  $OperationType; 
    public  $Token; 
    public  $UniqueId; 
    public  $SubPartnerType; 
    public  $Name; 
    public  $BranchName; 
    public  $ContactInfo; 
    public  $FinancialInfo; 
    public  $SubPartnerId;
    public  $BaseUrl;
	public	$AuthSignatoryName;
	public	$AuthSignatorySurname;
	public	$AuthSignatoryBirthDate;

    public static function Execute(MarketPlaceAddOrUpdateRequest $request)
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
        "    <ContactInfo>\n" .
        "        <Country>" . $this->ContactInfo->Country . "</Country>\n" .
        "        <City>" . $this->ContactInfo->City . "</City>\n" .
        "        <Address>" . $this->ContactInfo->Address . "</Address>\n" .
        "        <BusinessPhone>" . $this->ContactInfo->BusinessPhone . "</BusinessPhone>\n" .
        "        <MobilePhone>" . $this->ContactInfo->MobilePhone . "</MobilePhone>\n" .
        "        <Email>" . $this->ContactInfo->Email . "</Email>\n" .
        "        <InvoiceEmail>" . $this->ContactInfo->InvoiceEmail . "</InvoiceEmail>\n" .
        "    </ContactInfo>\n" .
        "    <FinancialInfo>\n" .
        "        <IdentityNumber>" . $this->FinancialInfo->IdentityNumber . "</IdentityNumber>\n" .
        "        <TaxOffice>" . $this->FinancialInfo->TaxOffice . "</TaxOffice>\n" .
        "        <TaxNumber>" . $this->FinancialInfo->TaxNumber . "</TaxNumber>\n" .
        "        <BankName>" . $this->FinancialInfo->BankName . "</BankName>\n" .
        "        <IBAN>" . $this->FinancialInfo->IBAN . "</IBAN>\n" .
		"        <TradeRegisterNumber>" . $this->FinancialInfo->TradeRegisterNumber . "</TradeRegisterNumber>\n" .
		"        <TradeChamber>" . $this->FinancialInfo->TradeChamber . "</TradeChamber>\n" .
        "    </FinancialInfo>\n" .
		"    <AuthSignatory>\n" .
        "        <Name>" . $this->AuthSignatoryName . "</Name>\n" .
        "        <Surname>" . $this->AuthSignatorySurname . "</Surname>\n" .
        "        <BirthDate>" . $this->AuthSignatoryBirthDate . "</BirthDate>\n" .
        "    </AuthSignatory>\n" .
        "</WIRECARD>";
        $xml_data = iconv("UTF-8","ISO-8859-9", $xml_data);
         return $xml_data;
        
    }
}