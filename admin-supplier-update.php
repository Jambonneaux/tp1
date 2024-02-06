<?php 


require_once('classes/CRUD.php');
$crud = new CRUD;
$update = $crud->update('supplier', $_POST);

header('location:admin-list-supplier.php');

?>