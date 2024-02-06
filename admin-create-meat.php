<?php 


require_once('classes/CRUD.php');
$crud = new CRUD;
$select = $crud->select('supplier');





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Meat</title>

    <link rel="stylesheet" href="css/style.css">
</head>
    <body class="body-solid">
        <div class="container">
            <div class="frame">
            <h1>New entry</h1>
                <form action="admin-store-meat.php" method="post">
                    <label>Arrival date
                        <input class="form-styling"type="date" name="arrival">
                    </label>
                    <label>Type
                        <input type="text" name="type" class="form-styling">
                    </label>
                    <label>Quantity
                        <input type="text" name="quantity" class="form-styling">
                    </label>
                    <label>Origin
                        <input type="text" name="origin" class="form-styling">
                    </label>
                    <label for="">Supplier
                        <select name="idSupplier" id="" class="form-styling">
                            <?php 
                                foreach ($select as $row){
                                    echo $row['id'];
                            ?>

                            <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>

                            <?php 
                                }
                            ?>
                        </select>
                    </label>                   
                    <input type="submit" class="btn-left" value="Save">              
                </form>
            </div>
        </div>
        
    </body>
</html>