<?php
require_once "app/models/Customer.php";
require_once "app/blocks/Core/template.php";
require_once "app/blocks/Layout.php";
class Controller_Customer extends Controller_Core_Base{
    public function listAction(){
        try{
            $customerModel = Mage::getModel("customer");
            $data = $customerModel->getAll();

            $this->renderTemplate('customer/list.phtml', ['data'=> $data]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function editAction(){
        try{
            $customerModel = Mage::getModel("customer");
            $id = $this->getRequest()->get('id');
            if($id){
                if(!$customerModel->load($id)){
                    throw new Exception("Invalid Customer ID");
                }
            }
            $this->renderTemplate('customer/edit.phtml', ['data'=> $customerModel]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function saveAction(){
        try{
            $data = $this->getRequest()->post('customer');
            $customerModel = Mage::getModel("customer");
        
            if(isset($data['customer_id']) && $data['customer_id']){
                $customerModel->load($data['customer_id']);
            }

            foreach($data as $key => $value){
                $customerModel->$key = $value;
            }
        
            $customerModel->save();
            $this->redirect('list', 'customer');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function deleteAction(){
        try{
            $id = $this->getRequest()->get('id');
            $customerModel = Mage::getModel("customer");
            if($id){
                $customerModel->load($id);
                $customerModel->delete();
            }
            $this->redirect('list', 'customer');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
}
?>