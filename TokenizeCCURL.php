<?php include('menu.php');?>

<h2>Url yöntemi ile kart saklama</h2>
<fieldset>
    <legend><label style="font-weight:bold;width:250px;">Servis bilgileri</label></legend>
    <label style="font-weight:bold;">Servis Adı &nbsp; :   &nbsp; </label> WDTicket<br>
    <label style="font-weight:bold;">Operasyon Adı &nbsp; :&nbsp; </label> TokenizeCCURL <br>
    <label style="font-weight:bold;">UserCode  &nbsp;:  &nbsp;</label> Wirecard tarafından verilen değer <br>
    <label style="font-weight:bold;">Pin &nbsp;:  &nbsp;</label> Wirecard tarafından verilen değer <br>
    <label style="font-weight:bold;">ErrorURL &nbsp;:  &nbsp;</label> İşlem hatalı gerçekleşirse yönlendirilecek olan sayfa <br>
    <label style="font-weight:bold;">SuccessURL &nbsp;:  &nbsp;</label> İşlem başarılı gerçekleşirse yönlendirilecek olan sayfa <br>
    <label style="font-weight:bold;">CustomerId &nbsp;:  &nbsp;</label> Bu alan kredi kartıyla sizin istediğiniz degerler arasında iletisim kurulması için kullanılır. Kredi kartıyla fatura ödemesi, kredi kartıyla sipariş numarasında eşleşme için yada boş gönderilebilir. <br>
    <label style="font-weight:bold;">IPAddress &nbsp;:  &nbsp;</label>İşlem sahibine ait IP adresi <br>
    <label style="font-weight:bold;">ValidityPeriod &nbsp;:  &nbsp;</label>Tokenize edilen sifreli kartın geçerlilik suresi <br>

</fieldset>

<br />
<form action="" method="post" class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  CustomerId: </label>
            <div class="col-md-4">
                <input value="" name="customerId" class="form-control input-md">
            </div>
        </div>

    </fieldset>
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
            <button type="submit" id="" name="" class="btn btn-danger">Url yöntemi ile kartı sakla</button>
        </div>
    </div>
</form>

<?php if (!empty($_POST)): ?>
<?php
     /**
     * Setting ayarlarını settings sınıfı içerisinden alıyoruz.
     * Token bilgilerini ve Üye işyeri gğncelleme için  gerekli olan MarketPlaceAddOrUpdateRequest sınıfını formdan gelen bilgilerle doldurup, xml servis çağrısını başlatıyoruz.
     * Xml Servis çağrısı sonucunda oluşan servis çıktısını ekrana xml formatında yazdırıyoruz.
     */
    $settings=new Settings();
    $request = new TokenizeCCURLRequest();
	$request->ServiceType = "WDTicket";
    $request->OperationType = "TokenizeCCURL";
    $request->CustomerId = $_POST["customerId"];
    $request->IPAddress = "";
    $request->ValidityPeriod = "20";
    $request->ErrorURL = "http://localhost:5000/cardTokenizeSuccess.php";
    $request->SuccessURL = "http://localhost:5000/cardTokenizeFail.php";
    $request->Token= new Token();
    $request->Token->UserCode=$settings->UserCode;
    $request->Token->Pin=$settings->Pin;
    $request->BaseUrl = $settings->BaseUrl;

    $response = TokenizeCCURLRequest::execute($request); //TokenizeCCURL servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 

<?php include('footer.php');?>
