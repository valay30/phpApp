<?php
class Block_Core_Layout
{
    protected $template;
    protected $children = [];
    protected $layout;
    public function __construct() {
        $this->setTemplate('layout');
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setLayout($template)
    {
        $this->template = $template;
    }

    public function getLayout()
    {
        return $this->template;
    }

    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function unset($key)
    {
        unset($this->children[$key]);
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
    public function toHtml() {
        require __DIR__ . '/../../templates/' . $this->getTemplate() . '.phtml';
    }
}
