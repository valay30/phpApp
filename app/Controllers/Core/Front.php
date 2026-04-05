<?php
class Controllers_Core_Front{
    protected $request;
    public function dispatch(){
        $this->request = $this->getRequest();
        $action = $this->request->get("a","index") . "Action";
        $this->$action();
    }
    public function setRequest($request){
        $this->request = $request;
    }
    public function getRequest(){
        if(!$this->request){
            $this->request = new Models_Request();
        }
        return $this->request;
    }
}

?>