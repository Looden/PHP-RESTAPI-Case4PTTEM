<?php
class BaseController	{

	public function __call($name, $arguments)	{
		$this->sendOutput('', array('HTTP/1.1 404 Not Found'));
							}
 
/* uri elemanlarini arraya atiyoruz */

	protected function getUriSegments()	{
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$uri = explode( '/', $uri );
 
		return $uri;
							}
 
/* sql sorgu parametlerini arraya atiyoruz */

	protected function getQueryStringParams()	{
		parse_str($_SERVER['QUERY_STRING'], $query);
		
		return $query;

							}
 
/* json datayi ekrana yazdiriyoruz */

	protected function sendOutput($data, $httpHeaders=array())	{

		header_remove('Set-Cookie');
 
		if (is_array($httpHeaders) && count($httpHeaders))	{
			foreach ($httpHeaders as $httpHeader)	{
				header($httpHeader);
									}
										}
 
		echo $data;

		exit;
										}




/* veriyi json dosyaya yazdir */

	protected function send2fileJSON($data, $folder_name)	{


		$filename = "generated_files/" . $folder_name . "/data.json";

 		$dirname = dirname($filename);


		if (!is_dir($dirname))	{
			mkdir($dirname, 0755, true);
						}

		$myfile = fopen($filename, "w") or die("Dosya acilamadi...");

		$json_pretty = json_encode(json_decode($data), JSON_PRETTY_PRINT);// dosya formatini guzelledik

		fwrite($myfile, $json_pretty);
		fclose($myfile);

							}


/* veriyi xml dosyaya yazdir */


	protected function send2fileXML($data, $folder_name) {

		$filePath = 'generated_files/' . $folder_name . '/products.xml';

 		$dirname = dirname($filePath);

		if (!is_dir($dirname))	{
			mkdir($dirname, 0755, true);
						}



		$dom = new DOMDocument('1.0', 'utf-8'); 
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$root = $dom->createElement('products'); 

		for($i=0; $i<count($data); $i++){
			$productId = $data[$i]['id'];  
			$productName = htmlspecialchars($data[$i]['name']);
			$productPrice = $data[$i]['price']; 
			$productCategory = $data[$i]['category'];  
			$product = $dom->createElement('product');
			$product->setAttribute('id', $productId);
			$name = $dom->createElement('name', $productName); 
			$product->appendChild($name); 
			$price = $dom->createElement('price', $productPrice); 
			$product->appendChild($price); 
			$category = $dom->createElement('category', $productCategory); 
			$product->appendChild($category);
			$root->appendChild($product);
							} // for
		$dom->appendChild($root); 
		$dom->save($filePath); 
							} // function
}
?>









