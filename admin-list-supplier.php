<?php 

require_once('classes/CRUD.php');

$crud = new CRUD;
$select = $crud->select('supplier', 'name', 'desc');




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Suppliers</title>
</head>
<body class="table-gradient">
    <section>
        <h1><a href="index.php">Supplier List</a></h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                </table>
                </div>
                <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <?php
                        foreach ($select as $row){         
                        ?>            
                        <tr>
                            <td><a href="admin-show-supplier.php?id=<?=$row['id'];?>"><?= $row['name']; ?></a></td>
                            <td><?= $row['phone']; ?></td>
                            <td><?= $row['email']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
    <div>
      <a href="admin-create-supplier.php" class="btn">New Supplier</a>
    </div>
</body>