<?php 
if(isset($_GET['id']) && $_GET['id']!=null){

    require_once('classes/CRUD.php');

    $crud = new CRUD;
    $selectId = $crud->selectId('meat', $_GET['id'], 'admin-index');
    $crud2 = new CRUD;
    $select = $crud2->select('supplier', 'name');

    extract($selectId);

}else{

    header('admin-index');

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
                <form action="admin-meat-update.php" method="post">
                    <input type="hidden" name="id" value="<?= $id;?>">
                    <label>Current Arrival date :
                        <small><?=$arrival?></small>
                    </label>
                    <label>New Arrival date
                        <input type="date" name="arrival" value="<?=$arrival?>" class="form-styling">
                    </label>
                    <label>Current Type :
                        <small><?=$type?></small>
                    </label>
                    <label>New Type
                        <input type="text" name="type" value="<?=$type?>" class="form-styling">
                    </label>
                    <label>Current Quantity :
                        <small><?=$quantity?></small>
                    </label>
                    <label>New Quantity
                        <input type="text" name="quantity" value="<?=$quantity?>" class="form-styling">
                    </label>
                    <label>Current Origin :
                        <small><?=$origin?></small>
                    </label>
                    <label>New Origin
                        <input type="text" name="origin" value="<?=$origin?>" class="form-styling">
                    </label>                
                    <label for="">Supplier
                        <select name="idSupplier" id="" class="form-styling">
                            <?php 
                                foreach ($select as $row){
                            ?>

                            <option selected="<?= $idSupplier; ?>" value="<?= $row['id']; ?>"><?= $row['name']; ?></option>

                            <?php 
                                }
                            ?>
                        </select>
                    </label>               
                    <input type="submit" class="btn-left" value="Update">
                </form>
            </div>  
        </div>  
        
    </body>
</html>