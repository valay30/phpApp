<?php
require_once "app/models/Category.php";
require_once "app/blocks/Core/template.php";
require_once "app/blocks/Layout.php";
class Controller_Category extends Controller_Core_Base{
    public function listAction(){
        try{
            $categoryModel = Mage::getModel("category");
            $data = $categoryModel->getAll();

            $this->renderTemplate('category/list.phtml', ['data'=> $data]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function editAction(){
        try{
            $categoryModel = Mage::getModel("category");
            $id = $this->getRequest()->get('id');
            if($id){
    
                if(!$categoryModel->load($id)){
                    throw new Exception("Invalid Category ID");
                }
            }
            $this->renderTemplate('category/edit.phtml', ['data'=> $categoryModel]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function saveAction(){
        try{
            $data = $this->getRequest()->post('category');
            $categoryModel = Mage::getModel("category");
            
            if(isset($data['category_id']) && $data['category_id']){
                $categoryModel->load($data['category_id']);
            }

            foreach($data as $key => $value){
                $categoryModel->$key = $value;
            }
            
            $categoryModel->save();
            $this->redirect('list', 'category');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function deleteAction(){
        try{
            $id = $this->getRequest()->get('id');
            $categoryModel = Mage::getModel("category");
            if($id){
                $categoryModel->load($id);
                $categoryModel->delete();
            }
            $this->redirect('list', 'category');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>