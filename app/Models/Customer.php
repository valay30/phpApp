<?php
require_once "app/models/Core/table.php";
class model_Customer extends model_Core_Table{
    public $tableName = 'customer';
    public $primaryKey = 'customer_id';
    
}
?>