<?php
require_once "app/boot.php";
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', getcwd());
define('APP_PATH', ROOT_PATH . DS . 'app');

class Mage{
    public static function init(){
        Boot::init();
    }
    public static function getBlock($name){
        $block = "app/blocks/" . $name . ".php";
        if(file_exists($block)){
            require_once $block;
            $className = "block_" . str_replace("/", "_", $name);
            return new $className();
        }
        return false;
    }

    public static function getController($name){
        $controller = "app/Controllers/" . $name . ".php";
        if(file_exists($controller)){
            require_once $controller;
            $className = "Controller_" . str_replace("/", "_", $name);
            return new $className();
        }
        return false;
    }

    public static function getModel($name){
        $model = "app/models/" . $name . ".php";
        if(file_exists($model)){
            require_once $model;
            $className = "model_" . str_replace("/", "_", $name);
            return new $className();
        }
        return false;
    }
}
Mage::init();
?>