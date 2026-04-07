<?php
require_once "app/boot.php";
class Mage{
    public static function init(){
        Boot::init();
    }
    public static function getBlock($name){
        $block = "app/Block/" . $name . ".php";
        if(file_exists($block)){
            require_once $block;
            $className = "Block_" . str_replace("/", "_", $name);
            return new $className();
        }
        return false;
    }

    public static function getController($name){
        $controller = "app/Controllers/" . $name . ".php";
        if(file_exists($controller)){
            require_once $controller;
            $className = "Controllers_" . str_replace("/", "_", $name);
            return new $className();
        }
        return false;
    }

    public static function getModel($name){
        $model = "app/models/" . $name . ".php";
        if(file_exists($model)){
            require_once $model;
            $className = "models_" . str_replace("/", "_", $name);
            return new $className();
        }
        return false;
    }
}
Mage::init();
?>