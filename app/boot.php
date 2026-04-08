<?php
require_once "app/controllers/Core/Base.php";
require_once "app/models/Core/Request.php";
require_once "app/controllers/Product.php";
require_once "app/controllers/Category.php";
require_once "app/controllers/Customergroup.php";
require_once "app/controllers/Customer.php";
require_once "app/controllers/Productmedia.php";

class Boot extends Controller_Core_Base{
    public static function init(){
        $request = Mage::getModel("core/request");
        $controller = Mage::getController($request->get("c","index"));
        
        $controller->dispatch();
    }
}

?>