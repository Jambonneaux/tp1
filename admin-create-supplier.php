<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Supplier</title>

    <link rel="stylesheet" href="css/style.css">
</head>
    <body class="body-solid">
        <div class="container">
            <div class="frame">
                <h1>New Supplier</h1>
                <form action="admin-store-supplier.php" method="post">
                    <label>Company
                        <input type="text" name="name" class="form-styling">
                    </label>
                    <label>Phone
                        <input type="text" name="phone" class="form-styling">
                    </label>
                    <label>Email
                        <input type="email" name="email" class="form-styling">
                    </label>
                    <input type="submit" class="btn-left" value="Save">
                </form>
            </div>
        </div>
        
    </body>
</html>