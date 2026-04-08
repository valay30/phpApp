<?php
class block_Core_template
{
    protected $template;
    protected $children = [];
    protected $data = [];
    protected $layout;
    protected $parent = null;
    
    public function __construct()
    {
        $this->setTemplate('layout');
    }

    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setChildren(array $children)
    {
        $this->children = $children;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function addChild($key, $value)
    {
        $this->children[$key] = $value;
    }

    public function removeChild($key)
    {
        unset($this->children[$key]);
    }

    public function getChild($key)
    {
        return $this->children[$key];
    }

    public function setData(array $data){
        $this->data = $data;
        return $this;
    }

    public function getData($key = null){
        return $this->data;
    }

    public function setLayout($layout){
        $this->layout = $layout;
    }

    public function getLayout(){
        return $this->layout;
    }

    public function toHtml()
    {
        // require __DIR__ . '/../../templates/' . $this->getTemplate() . '.phtml';
        if(!file_exists(ROOT_PATH . DS . 'app' . DS . 'templates' . DS . $this->getTemplate() . '.phtml')){
            echo "File not available";
        }
        include ROOT_PATH . DS . 'app' . DS . 'templates' . DS . $this->getTemplate() . '.phtml';
    }
    public function render(){
        $this->toHtml();
    }

        public function addData($key, $value)
    {
        $this->data[$key] = $value;
    }
    public function removeData($key)
    {
        unset($this->data[$key]);
    }

    public function getDataValue($key)
    {
        return $this->data[$key];
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

}
