<?php
require_once "app/controllers/Core/Base.php";
require_once "app/models/Core/Request.php";
require_once "app/controllers/Product.php";
require_once "app/controllers/Category.php";
require_once "app/controllers/Customergroup.php";
require_once "app/controllers/Customer.php";
require_once "app/controllers/Productmedia.php";

class Boot extends Controllers_Core_Base{
    public static function init(){
        $request = new models_Core_Request();
        $controller = "Controllers_" . ucfirst($request->get("c","index"));
        $controllerObject = new $controller(); 
        $controllerObject->dispatch();
    }
}

?>