<?php


$id = $_POST['id'];
require_once('classes/CRUD.php');

$crud = new CRUD;
$delete = $crud->delete('meat', $id, 'admin-list-meats');



















?>