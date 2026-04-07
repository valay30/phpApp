<?php
require_once "app/models/Productmedia.php";
class Controllers_Productmedia extends Controllers_Core_Base{
    public function listAction(){
        // $productmediaModel = new models_Productmedia();
        $productmediaModel = Mage::getModel("productmedia");
        $data = $productmediaModel->getAll();

        $this->renderTemplate('productmedia/list.phtml', ['data'=> $data]);
    }
    public function editAction(){
        // $productmediaModel = new models_Productmedia();
        $productmediaModel = Mage::getModel("productmedia");
        $id = $this->getRequest()->get('id');
        if($id){
            // $productmediaModel->load($id);
            if(!$productmediaModel->load($id)){
                throw new Exception("Invalid Product Media ID");
            }
        }
        $this->renderTemplate('productmedia/edit.phtml', ['data'=> $productmediaModel]);
    }
    public function saveAction(){
        $data = $this->getRequest()->post('productmedia');
        // $productmediaModel = new models_Productmedia();
        $productmediaModel = Mage::getModel("productmedia");
        
        if(isset($data['product_media_id']) && $data['product_media_id']){
            $productmediaModel->load($data['product_media_id']);
        }

        foreach($data as $key => $value){
            $productmediaModel->$key = $value;
        }
        
        $productmediaModel->save();
        $this->redirect('list', 'productmedia');
    }
    public function deleteAction(){
        $id = $this->getRequest()->get('id');
        // $productmediaModel = new models_Productmedia();
        $productmediaModel = Mage::getModel("productmedia");
        if($id){
            $productmediaModel->load($id);
            $productmediaModel->delete();
        }
        $this->redirect('list', 'productmedia');
    }
    
}
?>