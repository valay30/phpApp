<?php
require_once "app/models/Core/table.php";
class model_Product extends model_Core_Table{
    public $tableName = 'product';
    public $primaryKey = 'product_id';
}

?>