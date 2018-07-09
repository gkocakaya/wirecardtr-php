<?php include('menu.php');?>
<h2>Abonelik Ücreti Değiştirme</h2>
<br/>


<br />
<br />
<form action="" method="post">
    <!-- Text input-->
    <div class="form-group">
        <div class="row">

            <label class="col-md-12 control-label" for="">Abonelik Numarası</label>
            <div class="col-md-3">
                <input name="subscriberId" type="text" value=""  class="form-control" required="">
            </div>
        </div>
        <div class="row">

            <label class="col-md-12 control-label" for="">Abonelik Ücreti</label>
            <div class="col-md-3">
                <input name="price" type="text" value=""  class="form-control" required="">
            </div>
        </div>
        <div class="row">
            <label class="col-md-12 control-label" for=""></label>
            <div class="col-md-4">
                <br />
                <button type="submit" id="" name="" class="btn btn-danger">Abonelik Ücretini Değiştir </button>
            </div>
        </div>
       
    </div>
</form>
<?php if (!empty($_POST)): ?>
<?php

     /**
     * Setting ayarlarını settings sınıfı içerisinden alıyoruz.
     * Token bilgilerini ve Üye işyeri 3d secure ile ödeme için  gerekli olan MarketPlaceSale3DOrMpSaleRequest sınıfını formdan gelen bilgilerle doldurup, xml servis çağrısını başlatıyoruz.
     * Xml Servis çağrısı sonucunda oluşan servis çıktısını ekrana xml formatında yazdırıyoruz.
     */
    $date = date("Ymd", time() + 86400);
    $settings=new Settings();
    $request = new SubscriberChangePriceRequest();
	$request->ServiceType = "SubscriberManagementService";
    $request->OperationType = "ChangePriceBySubscriber";
    $request->Token= new Token();
    $request->Token->UserCode=$settings->UserCode;
    $request->Token->Pin=$settings->Pin;
    $request->BaseUrl = $settings->BaseUrl;
    $request->SubscriberId = $_POST["subscriberId"];
    $request->Price = $_POST["price"];
    $request->Description ="Odeme değiştirme";
    $request->ValidFrom =$date;
    $response = SubscriberChangePriceRequest::execute($request); // Ücret değişimi için gerekli olan servis çağrısının başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 
<?php include('footer.php');?>