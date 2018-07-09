<?php


/**
 * Abonelik servisi Ücret değişimi için bu metod kullanılır.
 * Bu sınıf içerisinde execute metodu ile servis çağrısı başlatılır.
 * Execute metodu içerisinde tanımlanan "toXmlString" metodu gerekli xml metninin oluşturulmasını sağlar.
 * Execute metodu içerisinde tanımlanan url adresine oluşturulan xml post edilir.
 */
class SubscriberChangePriceRequest
{
    public  $ServiceType; 
    public  $OperationType; 
    public  $Token;
    public  $Price;
    public  $SubscriberId; 
    public  $Description;
    public $ValidFrom;


    public static function Execute(SubscriberChangePriceRequest $request)
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
        "    <Price>" . $this->Price . "</Price>\n" .
        "    <ValidFrom>" . $this->ValidFrom . "</ValidFrom>\n" .
        "    <SubscriberId>" . $this->SubscriberId . "</SubscriberId>\n" .
        "    <Description>" . $this->Description . "</Description>\n" .
        "</WIRECARD>";
        echo($xml_data);
         return $xml_data;
       
    }
}