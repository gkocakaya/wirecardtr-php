<?php include('menu.php');?>

<h2>Direk kart saklama</h2>
<fieldset>
    <legend><label style="font-weight:bold;width:250px;">Servis bilgileri</label></legend>
    <label style="font-weight:bold;">Servis Adı &nbsp; :   &nbsp; </label> WDTicket<br>
    <label style="font-weight:bold;">Operasyon Adı &nbsp; :&nbsp; </label> TokenizeCCURL <br>
    <label style="font-weight:bold;">UserCode  &nbsp;:  &nbsp;</label> Wirecard tarafından verilen değer <br>
    <label style="font-weight:bold;">Pin &nbsp;:  &nbsp;</label> Wirecard tarafından verilen değer <br>
    <label style="font-weight:bold;">IPAddress &nbsp;:  &nbsp;</label>İşlem sahibine ait IP adresi <br>
    <label style="font-weight:bold;">ValidityPeriod &nbsp;:  &nbsp;</label>Tokenize edilen sifreli kartın geçerlilik suresi <br>
</fieldset>

<br />
<br />
<form action="" method="post" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <legend><label style="font-weight:bold;width:250px;">Kart Bilgileri</label></legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="">Kart Sahibi Adı Soyadı:</label>
            <div class="col-md-4">
                <input value="Ahmet Yılmaz" name="ownerName" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Kart Numarası:</label>
            <div class="col-md-4">
                <input value="4282209004348015" name="creditCardNo" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Son Kullanma Tarihi Ay/Yıl: </label>
            <div class="col-md-4">
                <input value="12" name="expireMonth" class="form-control input-md" width="50px">
                <input value="2022" name="expireYear" class="form-control input-md" width="50px">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  CVC: </label>
            <div class="col-md-4">
                <input value="123" name="cvv" class="form-control input-md">
            </div>
        </div>
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
            <button type="submit" id="" name="" class="btn btn-danger"> Kart Sakla</button>
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
    $expiryDates = $_POST["expireMonth"];
    $expiryDates .= "/";  
    $expiryDates .= $_POST["expireYear"];
    $settings=new Settings();
    $request = new TokenizeCCRequest();
	$request->ServiceType = "CCTokenizationService";
    $request->OperationType = "TokenizeCC";

    $request->CustomerId = $_POST["customerId"];
    $request->CreditCardNumber =$_POST["creditCardNo"] ;
    $request->NameSurname =$_POST["ownerName"];
    $request->ExpiryDate =$expiryDates;
    $request->CVV = $_POST["cvv"];;
    $request->Port = "";
    $request->IPAddress = "";
    $request->ValidityPeriod = "20";
    $request->Token= new Token();
    $request->Token->UserCode=$settings->UserCode;
    $request->Token->Pin=$settings->Pin;
    $request->BaseUrl = $settings->BaseUrl;
    
  

    $response = TokenizeCCRequest::execute($request); //TokenizeCC servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 

<?php include('footer.php');?>
