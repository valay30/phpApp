<?php
class Models_Request{
    public function get($key,$value=null){
        if(!$_GET['$key']){
            return $value;
        }
        return $_GET['$key'];
    }
    public function post(){

    }
    public function isPost(){
        
    }
}
?>