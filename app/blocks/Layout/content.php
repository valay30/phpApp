<?php
require_once "app/blocks/Core/template.php";
class block_Layout_content extends block_Core_template{
    public function __construct()
    {
        $this->setTemplate('layout/content');
    }
}

?>