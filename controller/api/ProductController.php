<?php
class ProductController extends BaseController	{


	public function listAction()	{
		$strErrorDesc = '';
		$requestMethod = $_SERVER["REQUEST_METHOD"];
		$arrQueryStringParams = $this->getQueryStringParams();



		//client kpntrolu

		$clientModel = new ProductModel();

		if (isset($arrQueryStringParams['code']) && $arrQueryStringParams['code']) {
			$code = $arrQueryStringParams['code'];
															}
			$client = $clientModel->getClient($code); // client teyidi yapiyoruz.

			if($client)	{

				$folder_name = $client[0]['company_name'] . "-" . $code;

				//echo $folder_name;exit();


		// client check tamamlandi...




		$format = "JSON"; // default dosya formati json olarak ayarlandi

		if (isset($arrQueryStringParams['format']) && $arrQueryStringParams['format'])	{
			$format = strtoupper($arrQueryStringParams['format']);
														}



		$yazdir = 0; // default ekrana yazdirma

		if (isset($arrQueryStringParams['yazdir']) && $arrQueryStringParams['yazdir'])		{
			$yazdir = $arrQueryStringParams['yazdir'];
														}




		if (strtoupper($requestMethod) == 'GET') {

			try {

				$productModel = new ProductModel();
 				$intLimit = 10000; // uride yazilmazsa default deger
				$strOrder = "id ASC";  //default siralama
				$code = "";// default client code, gelmezse calistirma...



				if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
					$intLimit = $arrQueryStringParams['limit'];
															}


				if (isset($arrQueryStringParams['order']) && $arrQueryStringParams['order']) {
					$strOrder = $arrQueryStringParams['order'];
															}


 
				$arrProducts = $productModel->getProducts($intLimit, $strOrder); //json icin encode edilecek ve xml icin kullanilacak
				$responseData = json_encode($arrProducts);


			} catch (Error $e)	{
				$strErrorDesc = $e->getMessage().'Hata! Destek ile iletisime geciniz...';
				$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
						}

		} else {
			$strErrorDesc = 'Desteklenmeyen method';
			$strErrorHeader = 'HTTP/1.1 422';
			}



        // ekrana bas ve dosyalari olustur
	if (!$strErrorDesc) {


		switch($format)	{

			case "XML":
				$this->send2fileXML($arrProducts, $folder_name); // xml dosyaya yazdir

				if($yazdir == 1)	{

				header('Location: ../../generated_files/{$folder_name}/products.xml');

							}	else	{
				echo $format . " Dosyasi olusturuldu..."; 
									}


			break;

			case "JSON";
				$this->send2fileJSON($responseData, $folder_name); // json dosyaya yazdir
				$type = array('Content-Type: application/json', 'HTTP/1.1 200 OK');


				if($yazdir == 1)	{

				$this->sendOutput($responseData, $type);

							}	else	{
				echo $format . " Dosyasi olusturuldu..."; 
									}


			break;

			default:
				$this->send2fileJSON($responseData, $folder_name); // json dosyaya yazdir
				$type = array('Content-Type: application/json', 'HTTP/1.1 200 OK');

				if($yazdir == 1)	{

				$this->sendOutput($responseData, $type);

							}	else	{
				echo $format . " Dosyasi olusturuldu..."; 
									}
					}//switch





        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }


//client check sonu
					}	else	{

				echo "kayit_bulunamadi...";exit();

							}
//client check sonu




    }
}

?>