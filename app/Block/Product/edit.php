<?php
require_once "app/Block/Core/template.php";
class Block_Product_edit extends Block_Core_template{
    public function __construct(){
        $this->setTemplate('product/edit');
    }
}

?>