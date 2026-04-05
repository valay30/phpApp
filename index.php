<?php
require_once "app/boot.php";
class Mage{
    public static function init(){
        Boot::init();
    }
}
Mage::init();
?>