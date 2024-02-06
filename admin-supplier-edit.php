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
    <title>Edit Shipment</title>

    <link rel="stylesheet" href="css/style.css">
</head>
    <body class="body-solid">
        <div class="container">
            <div class="frame">
                <h1>Edit shipment</h1>
                <form action="admin-supplier-update.php" method="post">
                    <input type="hidden" name="id" value="<?= $id;?>">
                    <label>Current Company name :
                        <small><?=$name?></small>
                    </label>
                    <label>New Company name
                        <input type="text" name="name" value="<?=$name?>" class="form-styling">
                    </label>
                    <label>Current Phone :
                        <small><?=$phone?></small>
                    </label>
                    <label>New Phone
                        <input type="text" name="phone" value="<?=$phone?>" class="form-styling">
                    </label>
                    <label>Current Email :
                        <small><?=$email?></small>
                    </label>
                    <label>New Email
                        <input type="text" name="email" value="<?=$email?>" class="form-styling">
                    </label>                                                                       
                    <input type="submit" class="btn-left" value="Update">
                </form>
            </div>  
        </div>  
        
    </body>
</html>