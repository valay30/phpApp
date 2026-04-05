<?php
require_once "app/models/Category.php";
class Controllers_Category extends Controllers_Core_Base{
    public function listAction(){
        $categoryModel = new models_Category();
        $data = $categoryModel->getAll();

        $this->renderTemplate('category/list.phtml', ['data'=> $data]);
    }
    public function editAction(){
        $categoryModel = new models_Category();
        $id = $this->getRequest()->get('id');
        if($id){
            // $categoryModel->load($id);
            if(!$categoryModel->load($id)){
                throw new Exception("Invalid Category ID");
            }
        }
        $this->renderTemplate('category/edit.phtml', ['data'=> $categoryModel]);
    }
    public function saveAction(){
        $data = $this->getRequest()->post('category');
        $categoryModel = new models_Category();
        
        if(isset($data['category_id']) && $data['category_id']){
            $categoryModel->load($data['category_id']);
        }

        foreach($data as $key => $value){
            $categoryModel->$key = $value;
        }
        
        $categoryModel->save();
        $this->redirect('list', 'category');
    }
    public function deleteAction(){
        $id = $this->getRequest()->get('id');
        $categoryModel = new models_Category();
        if($id){
            $categoryModel->load($id);
            $categoryModel->delete();
        }
        $this->redirect('list', 'category');
    }
    
}
?>