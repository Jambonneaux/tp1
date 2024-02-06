<?php 


require_once('classes/CRUD.php');
$crud = new CRUD;
$update = $crud->update('meat', $_POST);

header('location:admin-list-meats.php');

?>