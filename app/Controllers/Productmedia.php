<?php
require_once "app/models/Productmedia.php";
require_once "app/blocks/Core/template.php";
require_once "app/blocks/Layout.php";

class Controller_Productmedia extends Controller_Core_Base{
    public function listAction(){
        try{
            $productmediaModel = Mage::getModel("productmedia");
            $data = $productmediaModel->getAll();

            $this->renderTemplate('productmedia/list.phtml', ['data' => $data]);
        }catch(Exception $e){   
            echo $e->getMessage();
        }
    }
    public function editAction()
    {
        try{
            $productmediaModel = Mage::getModel("productmedia");
            $id = $this->getRequest()->get('id');
            if ($id) {
                if (!$productmediaModel->load($id)) {
                    throw new Exception("Invalid Product Media ID");
                }
            }
            $this->renderTemplate('productmedia/edit.phtml', ['data' => $productmediaModel]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function saveAction()
    {
        try{
            $data = $this->getRequest()->post('productmedia');
            $productmediaModel = Mage::getModel("productmedia");

            if (isset($data['product_media_id']) && $data['product_media_id']) {
                $productmediaModel->load($data['product_media_id']);
            }

            foreach ($data as $key => $value) {
                $productmediaModel->$key = $value;
            }

            $productmediaModel->save();
            $this->redirect('list', 'productmedia');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function deleteAction()
    {
        try{
            $id = $this->getRequest()->get('id');
            $productmediaModel = Mage::getModel("productmedia");
            if ($id) {
                $productmediaModel->load($id);
                $productmediaModel->delete();
            }
            $this->redirect('list', 'productmedia');
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
