<?php
require_once "app/models/Product.php";
require_once "app/blocks/Core/template.php";
require_once "app/blocks/Layout.php";
class Controller_Product extends Controller_Core_Base
{
    public function listAction()
    {
        try {
            $productModel = Mage::getModel("product");
            $data = $productModel->getAll();
            $block = Mage::getBlock("product/list");
            $block->setData($data);

            $layout = $this->getLayout();
            $layout->addChild('product/list', $block);
            $layout->toHtml();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function editAction()
    {
        try {
            $productModel = Mage::getModel("product");
            $id = $this->getRequest()->get('id');
            if ($id) {
                if (!$productModel->load($id)) {
                    throw new Exception("Invalid Product ID");
                }
            }
            $this->renderTemplate('product/edit.phtml', ['data' => $productModel]);
            // $block = Mage::getBlock("product/edit");
            // $block->toHtml();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function saveAction()
    {
        try {
            $data = $this->getRequest()->post('product');
            $productModel = Mage::getModel("product");

            if (isset($data['product_id']) && $data['product_id']) {
                $productModel->load($data['product_id']);
            }

            foreach ($data as $key => $value) {
                $productModel->$key = $value;
            }

            $productModel->save();
            $this->redirect('list', 'product');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->get('id');
            $productModel = Mage::getModel("product");
            if ($id) {
                $productModel->load($id);
                $productModel->delete();
            }
            $this->redirect('list', 'product');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function sampleAction()
    {
        $layout = Mage::getBlock("Layout");
        $layout->setTemplate("layout");
        $footer = Mage::getBlock('layout/footer');
        
        $layout->getChild('content')->addChild('footer', $footer);

        echo "<pre>";
        print_r($layout);
        
        $layout->render();
    }
}
