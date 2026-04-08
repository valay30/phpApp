<?php
require_once "app/models/Core/table.php";
class model_Category extends model_Core_Table{
    public $tableName = 'category';
    public $primaryKey = 'category_id';
}
?>