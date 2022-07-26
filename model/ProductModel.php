<?php
require_once PROJECT_ROOT_PATH . "model/database.php";
 
class ProductModel extends Database
{
    public function getProducts($limit, $order) { // sorguya limit verebiliyoruz, default deger (10K) productcontroller.php de...
    

	switch(strtoupper($order))	{ // uride, random varyok kontrolune gore sorgu olustur

		case "RAND":
        		return $this->select("SELECT * FROM products ORDER BY RAND() LIMIT ?", ["i", $limit]);
		break;

		default:
        		return $this->select("SELECT * FROM products ORDER BY id ASC LIMIT ?", ["i", $limit]);

				}

   							 }


	public function getClient($code)	{


		return $this->select("SELECT * FROM clients WHERE request_code = ? ORDER BY id ASC LIMIT 1", ["s", $code]);

					}




}

?>