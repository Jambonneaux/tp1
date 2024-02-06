<?php 


require_once('classes/CRUD.php');

$crud = new CRUD;
$insert = $crud->insert('meat', $_POST);

print_r($_POST);

header("location:admin-list-meats.php");































?>