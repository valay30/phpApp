<?php
require_once "app/models/Product.php";
class Controllers_Product extends Controllers_Core_Base{
    public function listAction(){
        $productModel = new models_Product();
        $data = $productModel->getAll();

        $this->renderTemplate('product/list.phtml', ['data'=> $data]);
    }
    public function editAction(){
        $productModel = new models_Product();
        $id = $this->getRequest()->get('id');
        if($id){
            // $productModel->load($id);
            if(!$productModel->load($id)){
                throw new Exception("Invalid Product ID");
            }
        }
        $this->renderTemplate('product/edit.phtml', ['data'=> $productModel]);
    }
    public function saveAction(){
        $data = $this->getRequest()->post('product');
        $productModel = new models_Product();
        
        if(isset($data['product_id']) && $data['product_id']){
            $productModel->load($data['product_id']);
        }

        foreach($data as $key => $value){
            $productModel->$key = $value;
        }
        
        $productModel->save();
        $this->redirect('list', 'product');
    }
    public function deleteAction(){
        $id = $this->getRequest()->get('id');
        $productModel = new models_Product();
        if($id){
            $productModel->load($id);
            $productModel->delete();
        }
        $this->redirect('list', 'product');
    }
    
}
?>