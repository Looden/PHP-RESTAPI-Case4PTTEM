<?php
define("PROJECT_ROOT_PATH", "");
 
// veritabani bilgileri
require_once PROJECT_ROOT_PATH . "includes/db_config.php";
 
// temel controller fonks.
require_once PROJECT_ROOT_PATH . "controller/api/BaseController.php";
 
// model
require_once PROJECT_ROOT_PATH . "model/ProductModel.php";
?>