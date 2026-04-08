<?php
require_once "app/blocks/Core/template.php";
class block_Product_edit extends block_Core_template{
    public function __construct(){
        $this->setTemplate('product/edit');
    }
}

?>