

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">



    <title>Farmer - Insert Product</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .my-form,
        .login-form {
            font-family: Raleway, sans-serif;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }
    button {
        width: 100%;
        max-width: 200px;
        height: 40px;
        padding: 10px 20px;  /* Ensure consistent padding */
        text-align: center;
        font-size: 16px;
        background-color: #007bff;  /* Set consistent background color */
        border: 1px solid transparent;
        color: white;  /* Text color */
        transition: all 0.2s ease;
    }

button:focus, button:active {
    outline: none;
    box-shadow: none;  /* Prevent box-shadow when clicked */
    transform: none;  /* Prevent any transformation like scaling */
    background-color: #0056b3;  /* Optional: Change background on active */
}

    </style>
</head>

<body>
    <div class="container">
        <main class="my-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center font-weight-bold">Edit Existing Product <i class="fas fa-leaf"></i></h4>
                            </div>
                            <div class="card-body">

                                <form name="my-form" action="assets/php/actions.php" method="post" enctype="multipart/form-data">
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $orders=productDetailsById($_GET['id']);   
                                        }
                                     ?>

                                    <input type="hidden" name="product_id" value="<?= $orders['product_id'] ?>">

                                    <div class="form-group row">
                                        <label for="full_name" class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Title:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="full_name" class="form-control" name="product_title" value="<?= $orders['name']?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Stock:(In kg)</label>
                                        <div class="col-md-6">
                                            <input type="text" id="full_name" class="form-control" name="product_stock" value="<?= $orders['quantity']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Categories:</label>
                                        <div class="col-md-6">
                                        <select name="product_cat" id="product_cat" class="form-control" disabled>
                                            <?php 
                                                  $cat_id=$orders['category_id'];
                                                  $row=getCategoriesById($cat_id);
                                                  $cat_title = $row['name'];

                                                if (!empty($cat_title)) {
                                                    echo "<option value=\"$cat_id\" selected>$cat_title</option>";
                                                } else {
                                                    echo "<option value=\"\">Select a Category</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_expiry" class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Expiry :</label>
                                        <div class="col-md-6">
                                            <input id="product_expiry" class="form-control" type="date" name="product_expiry" value="<?= $orders['product_expiry']?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="nid_number" class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product MRP : (Per kg)</label>
                                        <div class="col-md-6">
                                            <input type="text" id="nid_number" class="form-control" name="product_price" value="<?= $orders['price']?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_desc" class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">
                                            Product Description:
                                        </label>
                                    <div class="col-md-6">
                                        <textarea name="product_desc" id="product_desc" class="form-control" rows="3" required>
                                        <?= isset($orders['description']) ?$orders['description']: '' ?>
                                        </textarea>
                                    </div>
                                </div>


                                    <div class="form-group row">
                                        <label for="nid_number3" class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Type:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="nid_number3" class="form-control" name="product_type" value="<?= $orders['product_type']?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row d-flex justify-content-between">
                                            
                                            <div class="col-md-4 text-left">
                                                <button type="submit" class="btn btn-primary" name="update_pro">
                                                    UPDATE
                                                </button>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <button type="submit" class="btn btn-danger" name="delete_pro">
                                                    DELETE
                                                </button>
                                            </div>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>

    <body>

</html>
