<?php
class Block_Core_template{
    protected $template;
    protected $data = [];

    public function setTemplate($template){
        $this->template = $template;
        return $this;
    }
    
    public function getTemplate()
    {
        return $this->template;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getData($key = null)
    {
        return $this->data;
    }

    public function toHtml(){
        $data = $this->getData();
        require __DIR__ . '/../../templates/' . $this->template . '.phtml';
    }
}

?>