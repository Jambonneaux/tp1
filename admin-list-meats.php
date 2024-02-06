<?php 

require_once('classes/CRUD.php');

$crud = new CRUD;
$select = $crud->select('meat', 'arrival');
$crud2 = new CRUD;
$select_supplier = $crud2->select('supplier', 'name');


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Meats</title>
    </head>
<body class="table-gradient">
    <section>
        <h1> <a href="index.php">Meat shipment in</a></h1>
            <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Arrival</th>
                        <th>Quantity</th>
                        <th>Origin</th>
                        <th>Supplier</th>
                    </tr>
                </thead>
            </table>
            </div>
            <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">            
                <tbody>
                    <?php
                foreach ($select as $row){
                    foreach ($select_supplier as $row_supplier){
                        if ($row['idSupplier'] == $row_supplier['id']) {
                            $row['idSupplier'] = $row_supplier['name'];                        
                        }
                        
                    }
                    ?>            
                <tr>
                    <td><a href="admin-show-meat.php?id=<?=$row['id'];?>"><?= $row['type']; ?></a></td>
                    <td><?= $row['arrival']; ?></td>
                    <td><?= $row['quantity']; ?></td>
                    <td><?= $row['origin']; ?></td>
                    <td><?= $row['idSupplier']; ?></td>
                </tr>
                <?php
                
                }                
                ?>
                </tbody>
            </div>    
        </table>
    </section>
    <div>
        <a href="admin-create-meat.php" class="btn">New Arrival</a>
    </div>
</body>