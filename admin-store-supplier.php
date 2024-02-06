<?php 


require_once('classes/CRUD.php');

$crud = new CRUD;
$insert = $crud->insert('supplier', $_POST);

header("location:admin-list-supplier.php?id=$insert")































?>