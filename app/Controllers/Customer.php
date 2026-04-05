<?php
require_once "app/models/Customer.php";
class Controllers_Customer extends Controllers_Core_Base{
    public function listAction(){
        $customerModel = new models_Customer();
        $data = $customerModel->getAll();

        $this->renderTemplate('customer/list.phtml', ['data'=> $data]);
    }
    public function editAction(){
        $customerModel = new models_Customer();
        $id = $this->getRequest()->get('id');
        if($id){
            if(!$customerModel->load($id)){
                throw new Exception("Invalid Customer ID");
            }
        }
        $this->renderTemplate('customer/edit.phtml', ['data'=> $customerModel]);
    }
    public function saveAction(){
        $data = $this->getRequest()->post('customer');
        $customerModel = new models_Customer();
        
        if(isset($data['customer_id']) && $data['customer_id']){
            $customerModel->load($data['customer_id']);
        }

        foreach($data as $key => $value){
            $customerModel->$key = $value;
        }
        
        $customerModel->save();
        $this->redirect('list', 'customer');
    }
    public function deleteAction(){
        $id = $this->getRequest()->get('id');
        $customerModel = new models_Customer();
        if($id){
            $customerModel->load($id);
            $customerModel->delete();
        }
        $this->redirect('list', 'customer');
    }
    
}
?>