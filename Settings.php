<?php

/*
Tüm çağrılarda kullanılacak olan ayarların tutulduğu kısımdır.
*/
class Settings
{      
    public function Settings()
    {
    	$environment = $this->Environment."Environments";
        $this->{$environment}();
    }
    private function TestEnvironments()
    {
    	/**
    	 * Wirecard tarafından sizlere verilen Test User Code bilgisi
    	 */
    	
    	$this->UserCode = "";
    	/**
    	 * Wirecard tarafından sizlere verilen Test Pin bilgisi
    	 */
        $this->Pin = "";

        /**
         * Wirecard web servisleri Test API ucu
         */
        $this->BaseUrl="https://test.3pay.com/sgate/Gate";
		/**
		*Wirecard tarafından sizlere verilen Private HashKey bilgisi
		*/ 
		$this->HashKey="";
    }
    private function ProductionEnvironments()
    {
    	/**
    	 * Wirecard tarafından sizlere verilen Test User Code bilgisi
    	 */
    	
    	$this->UserCode = "";
    	/**
    	 * Wirecard tarafından sizlere verilen Test Pin bilgisi
    	 */
        $this->Pin = "";

        /**
         * Wirecard web servisleri Test API ucu
         */
        $this->BaseUrl="https://www.wirecard.com.tr/SGate/Gate";
		/**
		*Wirecard tarafından sizlere verilen Private HashKey bilgisi
		*/ 
		$this->HashKey="";
    }
    public $UserCode;
    public $Pin;
    public $BaseUrl;
	public $HashKey;
    /**
     * Test ortamında işlem yapıyorsanız, bu değişkenin değeri Test olmalıdır.
     * Canlı ortamda işlem yapıyorsanız, bu değişkenin değeri Production olmalıdır.
     */
    public $Environment = 'Production';
    
}