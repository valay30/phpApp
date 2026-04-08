<?php
require_once "app/models/Customergroup.php";
require_once "app/blocks/Core/template.php";
require_once "app/blocks/Layout.php";
class Controller_Customergroup extends Controller_Core_Base{
    public function listAction(){
        try{
            $customergroupModel = Mage::getModel("customergroup");
            $data = $customergroupModel->getAll();

            $this->renderTemplate('customergroup/list.phtml', ['data'=> $data]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function editAction(){
        try{
            $customergroupModel = Mage::getModel("customergroup");
            $id = $this->getRequest()->get('id');
            if($id){
                if(!$customergroupModel->load($id)){
                    throw new Exception("Invalid Customer Group ID");
                }
            }
            $this->renderTemplate('customergroup/edit.phtml', ['data'=> $customergroupModel]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
    public function saveAction(){
        try{
            $data = $this->getRequest()->post('customergroup');
            $customergroupModel = Mage::getModel("customergroup");
        
            if(isset($data['customer_group_id']) && $data['customer_group_id']){
                $customergroupModel->load($data['customer_group_id']);
            }

            foreach($data as $key => $value){
                $customergroupModel->$key = $value;
            }
        
            $customergroupModel->save();
            $this->redirect('list', 'customergroup');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function deleteAction(){
        try{
            $id = $this->getRequest()->get('id');
            $customergroupModel = Mage::getModel("customergroup");
            if($id){
                $customergroupModel->load($id);
                $customergroupModel->delete();
            }
            $this->redirect('list', 'customergroup');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>