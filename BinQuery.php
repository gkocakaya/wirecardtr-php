<?php include('menu.php');?>
<h2>BIN Sorgulama</h2>


<fieldset>
    <legend><label style="font-weight:bold;width:250px;">BIN Sorgulama Bilgileri</label></legend>
    <label style="font-weight:bold;">Servis Adı &nbsp; :   &nbsp; </label> MerchantQueries<br>
    <label style="font-weight:bold;">Operasyon Adı &nbsp; :&nbsp; </label> BinQueryOperation <br>
    <label style="font-weight:bold;">UserCode  &nbsp;:  &nbsp;</label> Wirecard tarafından verilen değer <br>
    <label style="font-weight:bold;">Pin &nbsp;:  &nbsp;</label> Wirecard tarafından verilen değer <br>
    <label style="font-weight:bold;">BIN &nbsp;:&nbsp;  </label> Kredi kartı numaranızın ilk 6 hanesi <br>


</fieldset>

<br />
<form action="" method="post" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <legend><label style="font-weight:bold;width:250px;">BIN Sorgulama Detayları</label></legend>

        <!-- Text input-->

        <div class="form-group">
            <label class="col-md-4 control-label" for="">Kredi kartı numaranızın ilk 6 hanesi</label>
            <div class="col-md-4">
                <input name="bin" class="form-control input-md">
            </div>
        </div>

    </fieldset>


    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
            <button type="submit" id="" name="" class="btn btn-success">BIN Sorgula</button>
        </div>
    </div>
</form>

<?php if (!empty($_POST)): ?>
<?php
   
   /**
     * Setting ayarlarını settings sınıfı içerisinden alıyoruz.
     * Token bilgilerini ve Üye işyeri oluşturmak için  gerekli olan BinQueryRequest sınıfını formdan gelen bilgilerle doldurup, xml servis çağrısını başlatıyoruz.
     * Xml Servis çağrısı sonucunda oluşan servis çıktısını ekrana xml formatında yazdırıyoruz.
     */
    $settings=new Settings();
    $request = new BinQueryRequest();
	$request->ServiceType = "MerchantQueries";
    $request->OperationType = "BinQueryOperation";
    $request->BIN = $_POST["bin"];


    $request->Token= new Token();
    $request->Token->UserCode=$settings->UserCode;
    $request->Token->Pin=$settings->Pin;
    $request->BaseUrl = $settings->BaseUrl;

   

    $response = BinQueryRequest::execute($request); 
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 

<?php include('footer.php');?>