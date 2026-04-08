<?php
require_once "app/blocks/Core/template.php";
class block_Layout extends block_Core_template {
    public function __construct()
    {
        $headerBlock = Mage::getBlock('Layout/header');
        $this->addChild('header', $headerBlock);

        $contentBlock = Mage::getBlock('Layout/content');
        $this->addChild('content', $contentBlock);

        $footerBlock = Mage::getBlock('Layout/footer');
        $this->addChild('footer', $footerBlock);
    }
}
