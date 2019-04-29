<?php


class BinQueryRequest
{
    public  $ServiceType; 
    public  $OperationType; 
    public  $Token; 
    public  $BIN; 
    public  $BaseUrl;
	

    public static function Execute(BinQueryRequest $request)
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
        "    <BIN>" . $this->BIN . "</BIN>\n" .
        "</WIRECARD>";
        $xml_data = iconv("UTF-8","ISO-8859-9", $xml_data);
         return $xml_data;
        
    }
}