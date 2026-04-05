<?php
require_once "app/models/Core/table.php";
class models_Product extends models_Core_Table{
    public $tableName = 'product';
    public $primaryKey = 'product_id';
}

?>