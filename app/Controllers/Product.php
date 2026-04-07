<?php
require_once "app/models/Product.php";
require_once "app/Block/Core/template.php";
require_once "app/Block/Core/Layout.php";
class Controllers_Product extends Controllers_Core_Base{
    public function listAction(){
        // $productModel = new models_Product();
        $productModel = Mage::getModel("product");
        $data = $productModel->getAll();
        $block = Mage::getBlock("product/list");
        $block->setData($data);
        // $this->renderTemplate('product/list.phtml', ['data'=> $data]);
        // $this->renderTemplate($block->getTemplate().'.phtml', ['data'=> $data]);
        
        $layout = $this->getLayout();
        $layout->addChild('product/list', $block);
        $layout->toHtml();

    }
    public function editAction(){
        // $productModel = new models_Product();
        $productModel = Mage::getModel("product");
        $id = $this->getRequest()->get('id');
        if($id){
            // $productModel->load($id);
            if(!$productModel->load($id)){
                throw new Exception("Invalid Product ID");
            }
        }
        $this->renderTemplate('product/edit.phtml', ['data'=> $productModel]);
        // $block = Mage::getBlock("product/edit");
        // $block->toHtml();
    }
    public function saveAction(){
        $data = $this->getRequest()->post('product');
        // $productModel = new models_Product();
        $productModel = Mage::getModel("product");
        
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
        // $productModel = new models_Product();
        $productModel = Mage::getModel("product");
        if($id){
            $productModel->load($id);
            $productModel->delete();
        }
        $this->redirect('list', 'product');
    }
    
}
?>