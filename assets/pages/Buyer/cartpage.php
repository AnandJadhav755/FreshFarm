
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
</head>
<style>
    .myfooter {
        background-color: #292b2c;

        color: goldenrod;
        margin-top: 15px;
    }

    .aligncenter {
        text-align: center;
    }

    a {
        color: goldenrod;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    nav {
        background-color: #292b2c;
    }

    .navbar-custom {
        background-color: #292b2c;
    }

    /* change the brand and text color */
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
        background-color: #292b2c;
    }

    .navbar-custom .navbar-nav .nav-link {
        background-color: #292b2c;
    }

    .navbar-custom .nav-item.active .nav-link,
    .navbar-custom .nav-item:hover .nav-link {
        background-color: #292b2c;
    }


    .mybtn {
        border-color: green;
        border-style: solid;
    }


    .right {
        display: flex;
    }

    .left {
        display: none;
    }

    .cart {

        margin-right: -9px;
    }

    .profile {
        margin-right: 2px;

    }

    .login {
        margin-right: -2px;
        margin-top: 12px;
        display: none;
    }

    .searchbox {
        width: 60%;
    }

    .lists {
        display: inline-block;
    }

    .moblists {
        display: none;
    }

    .logins {
        text-align: center;
        margin-right: -30%;
        margin-left: 35%;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table td,
    .table th {
        padding: 8px 8px;
        border: 0.5px solid black;
        text-align: center;
        font-size: 16px;
        background-color: white;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 0px solid #dee2e6;
    }

    .table th {
        background-color: #292b2c;
        color: goldenrod;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    .add {
        width: 40%;
    }

    @media only screen and (min-device-width:320px) and (max-device-width:480px) {


        .right {
            display: none;
            background-color: #ff5500;

        }


        .left {
            display: flex;
        }

        .moblogo {
            display: none;
        }

        .logins {
            text-align: center;
            margin-right: 35%;
            padding: 15px;
        }

        .searchbox {
            width: 95%;
            margin-right: 5%;
            margin-left: 0%;
        }

        .moblists {
            display: inline-block;
            text-align: center;
            width: 100%;
        }

        .table thead {
            display: none;
            background-color: #292b2c;
            color: goldenrod;
        }

        .table,
        .table tbody,
        .table tr,
        .table td {
            display: block;
            width: 100%;

        }

        .table tr {
            margin-bottom: 15px;

        }

        .table td {
            text-align: right;
            padding-left: 50%;
            text-align: right;
            position: relative;


        }

        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-size: 15px;
            font-weight: bold;
            text-align: left;
            /* background-color: #292b2c;
        color: goldenrod; */
        }

        .add {
            width: auto;
        }

        .emptycart {
            /* margin-left: 20%;
            width:80%;  */
            float: none;
            text-align: center;

        }

        .continueshopping {
            /* margin-top:20%;
            margin-left: 20%;  */
            float: none;
            text-align: center;
            margin-top: -20%;

        }

        .grandtotal {
            /* margin-right: 20%; */
            float: none;
            margin-top: 40%;
        }
    }
</style>

<body>
<nav class="navbar navbar-expand-xl ">
        <div class=" flex-row-reverse left ">
            <div class="p-2">
                <div class="icon2">
                    <a href="CartPage.php"> <i class="fa" style="font-size:30px; color:green ;margin-top:2px;">&#61562;</i></a>
                    <span id="icon" style="color:green"> <?php echo totalItems(); ?> </span>
                </div>
            </div>
            <div class="p-2 ml-5"><i class='far fa-user-circle' style='font-size:30px; color: green;margin-top:2px;'></i></div>
                <a class="float-left" href="bhome.php">
                <img src="assets/images/logo.jpg" class="float-left mr-5 ml-0 " alt="Logo" style="height:50px;">
                </a>
            </div>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars p-1 " style="color:green;margin-right:-9%;font-size:28px;"></i></span>
            </button>
            <a class="float-left" href="bhome.php">
                <img src="assets/images/logo.jpg" class="float-left mr-2 moblogo" alt="Logo" style="height:50px;">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="input-group mb-1 ml-2 searchbox">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search" style="font-size:20px;color:green; "></i></div>
                    </div>
                    <form action="?SearchResult" method="get" enctype="multipart/form-data">
                        <input type="text" class="form-control " id="inlineFormInputGroup" name="SearchResult" placeholder="Search for fruits,vegetables or crops " style="width:500px;">
                    </form>
                </div>
                <?php  
                    $buyer_name=$_SESSION['userdata']['first_name'];
                    echo @"<div class='text-success  logins mx-1 ml-5  '>Hello,$buyer_name</div>";
                    ?>
              
            </div>
            <div class=" flex-row-reverse right ">
                <div class="p-2 cart">
                    <div class="icon2">
                        <a href="?cartpage"> <i class="fa" style="font-size:30px; color:green">&#61562;</i></a>
                        <span id="icon" style="color:green"> <?php echo totalItems(); ?> </span>
                    </div>
                </div>
                <div class="dropdown p-2 settings ">
                    <button class="btn  dropdown-toggle text-success" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Settings
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href='?buyerprofile' class='dropdown-item  ' style='padding-right:-20px;'>Profile</a>
                        <a href='?Buyer_Transaction' class='dropdown-item ' style='padding-right:-20px;'>Transactions</a>
                        <a href='?farmers' class='dropdown-item' style='padding-right:-20px;' >Farmers</a>
                        <a href='assets/php/actions.php?logout' class='dropdown-item ' style='padding-right:-20px;'>Logout</a>
                    </div>
                </div>
                <div class="text-success  login">Login</div>
            </div>

</nav>
    <div class="container">

        <?php
      
            $temp = totalItems();
            echo   "<div class='text-left'>
                        <h3>Your Items :- $temp</h3>
                        <hr>";
        
        ?>

        <table class="table">
            <thead>
                <th>S.No</th>
                <th>Item Name</th>
                <th>Unit Price </th>
                <th style="width:25%;">Quantity</th>
                <th>Subtotal</th>
                <th>Delete</th>
            </thead>

            <?php
            $total = 0;
            $i=0;
                $orders=cartDetails($_SESSION['userdata']['user_id']);
              
                if (count($orders) > 0) {
                 foreach ($orders as $order) {
                             $product_title=$order['product_name'];
                             $product_price=$order['price'];
                             $subtotal =$order['subtotal'];
                             $product_id=$order['product_id'];
                             $quantity=$order['quantity'];
                             
                         

            ?>


                        <tbody>
                            <tr>
                                <td data-label="S.No" style="font-size:20px;"><?php echo $i+1; ?></td>
                                <td data-label="Item Name " style="font-size:20px;"><?php echo $product_title; ?></td>
                                <td data-label="Unit Price" style="font-size:20px;"><?php echo $product_price; ?></td>

                                <td data-label="Quantity p-0 " style="padding-top:1.5%;padding-bottom:-2%">
                                    <div class="d-flex justify-content-center " style="width:90%;padding-left:10%;">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <a href="assets/php/actions.php?AddQty=<?php echo $product_id; ?>">
                                                    <button class="btn btn-outline-secondary" style=" background-color:#292b2c;" type="button" id="button-addon1">
                                                        <b style="color:goldenrod"><i class="fas fa-plus"></i></b>
                                                    </button>
                                                </a>
                                            </div>
                                            <input type="number" class="form-control" oninput="this.value = Math.abs(this.value)" min="1" value='<?php echo $quantity ?>' name="qty" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <a href="assets/php/actions.php?MinusQty=<?php echo $product_id; ?>">
                                                    <button class="btn btn-outline-secondary" style=" background-color:#292b2c;" type="button" id="button-addon2">
                                                        <b style="color:goldenrod"><i class="fas fa-minus"></i></b>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                                <?php 
                                $subtotal = $_SESSION['quantity'][$i] * $product_price; 
                                ?>

                                <td data-label="Subtotal" style="font-size:20px;"><?php echo $subtotal; ?></td>
                                <?php $total = $total + $subtotal ?>
                                <td data-label="Delete" style="font-size:20px;"><a href="assets/php/actions.php?product_id=<?php echo $product_id; ?>" id="Deletionlink"><i class="far fa-times-circle"></i></a></td>
                            </tr>
                <?php
                $i++;
                    }
                    
                }
             ?>

                        </tbody>
        </table>

    </div>

    </div>


    <div class="container">
        <div class="float-none float-sm-none float-md-none float-lg-left float-xl-left  emptycart">
            <a href="assets/php/actions.php?emptyCart">
                <button type="button" class="btn btn-lg  border border-dark " style="font-size:22px;color:black;background-color:#FFD700">Empty Cart
                    <i class="fas fa-shopping-cart ml-1"></i></button>
            </a>
        </div>
    
        <br>
        <div class=" float-none float-sm-none float-md-none float-lg-right float-xl-rightcheckout mr-0 p-2 border border-dark  " style="border-radius:5%;">

            <h2>Grand total = Rs <?php echo $total; ?> </h2>


            <?php
                    $count = totalItems();
                    if ($count > 0) {
                        echo "<a href='?Checkout'>
                                <button type='button' class='btn btn-lg border border-dark d-flex mx-auto' 
                                    style='font-size:22px;color:black;background-color:#FFD700'>
                                    Checkout <i class='fas fa-arrow-right ml-2 mt-2 mb-1'></i>
                                </button>
                            </a>";
                    } else {
                        echo "<button type='button' class='btn btn-lg border border-dark d-flex mx-auto' 
                                style='font-size:22px;color:black;background-color:#FFD700' 
                                onclick='alert(\"Cart Is Empty\");'>
                                Checkout <i class='fas fa-arrow-right ml-2 mt-2 mb-1'></i>
                            </button>";
                    }
            ?>


        </div>


        <?php $_SESSION['grandtotal'] = $total; ?>
        <br>
        <br>
        <div class=" float-none float-sm-none float-md-none float-lg-left float-xl-left continueshopping mt-5">
            <a href="?bhome"><button type="button" class="btn btn-lg  border border-dark " style="font-size:22px;color:black;background-color:#FFD700">Continue Shopping
                    <i class="fas fa-shopping-bag ml-1"></i></button></a>
        </div>
    </div>
</body>

</html>