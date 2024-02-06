<?php 


if(isset($_GET['id']) && $_GET['id']!=null){

    require_once('classes/CRUD.php');

    $crud = new CRUD;
    $selectId = $crud->selectId('supplier', $_GET['id'], 'admin-list-supplier');

    extract($selectId);


}else{

    header('admin-list-supplier');

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
                <p class="form-styling"><strong>Company name:</strong> <?= $name; ?></p>
                <p class="form-styling"><strong>Phone:</strong> <?= $phone; ?></p>
                <p class="form-styling"><strong>Email:</strong> <?= $email; ?></p>

                <div class="grid">                
                    <a href="admin-supplier-edit.php?id=<?= $id; ?>" class="btn-left">Edit</a>
                    
                    <form action="admin-supplier-delete.php" method="post">
                        <input type="hidden" value="<?= $id; ?>" name="id">
                        <button type="" class="btn-right">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>