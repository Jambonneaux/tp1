<?php 


if(isset($_GET['id']) && $_GET['id']!=null){

    require_once('classes/CRUD.php');

    $crud = new CRUD;
    $selectId = $crud->selectId('meat', $_GET['id'], 'admin-list-meats');
    $crud2 = new CRUD;
    $select = $crud2->select('supplier', 'name');

    extract($selectId);


}else{

    header('admin-list-meats');

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipments Details</title>

    <link rel="stylesheet" href="css/style.css">
</head>
    <body class="body-solid">
        <div class="container">
            <div class="frame">
                <h1>Shipment detail</h1>
                <p class="form-styling"><strong>Arrival date:</strong> <?= $arrival; ?></p>
                <p class="form-styling"><strong>Type:</strong> <?= $type; ?></p>
                <p class="form-styling"><strong>Quantity:</strong> <?= $quantity; ?></p>
                <p class="form-styling"><strong>Origin:</strong> <?= $origin; ?></p>
                <p class="form-styling">
                <?php 
                    foreach ($select as $row){
            
                        if ($idSupplier == $row['id']) {
                            $idSupplier = $row['name'];
                        }
                
                    }
                    ?>
                    <strong>Supplier:</strong> <?= $idSupplier; ?>
                    <?php 
                    
                    ?>
                </p>
                <div class="grid">                
                    <a href="admin-meat-edit.php?id=<?= $id; ?>" class="btn-left">Edit</a>
                    
                    <form action="admin-meat-delete.php" method="post">
                        <input type="hidden" value="<?= $id; ?>" name="id">
                        <button type="" class="btn-right">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>