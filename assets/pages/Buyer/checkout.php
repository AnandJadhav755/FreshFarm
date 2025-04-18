<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        /* margin-left:10px; */
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

    body {
        margin: 0;
        padding: 0px;
        font-family: sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table td,
    .table th {
        padding: 10px 10px;
        border: 1px solid #ddd;
        text-align: center;
        font-size: 16px;
    }

    .table th {
        background-color: #292b2c;
        color: goldenrod;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    .goback {
        /* text-align:none; */
        width: 20%;
        /* margin-left:10%; */
        margin-right: -7%;
        margin-left: 0%
    }

    .placeorder {
        /* text-align:none; */
        width: 20%;
        margin-right: -3.5%;
    }

    .hey {
        width: 50%;
    }

    @media only screen and (min-device-width:320px) and (max-device-width:480px) {
        .table thead {
            display: none;
        }

        .hey {
            width: 100%;
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
        }

        .right {
            display: none;
            background-color: #ff5500;
        }

        /* 
            .settings{
            margin-left:79%;
        } */
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

        /* .pic{
        height:auto;
    } */

        /* .mobtext{
        display:none;
    }
    .destext{
        display:inline-block;
        width:90%;
        margin-left: 5%;
        margin-right: 5%;
    } */
        .goback {
            text-align: center;
            width: 50%;
            margin-left: 25%;

            /* margin-left:10%; */
            margin-right: 0%;
        }

        .placeorder {
            width: auto;
            margin-bottom: -10%;
            margin-top: 10%;
            margin-left: 22%;
        }

        .payment {
            width: 90%;
            margin-left: 20%;
            

        }

        .text {
            text-align: center;
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

    <form action="assets/php/actions.php?checkout" method="post">
    

        <div class="container mt-2">
            <div class="text">
                <br>
                <h3 style="font-family:Georgia, 'Times New Roman', Times, serif">Select PickUp Point </h3>
            </div>
            <hr style="margin-top:-0.5%">
            <form>
                <div class=" float-none float-sm-none float-md-none float-lg-right float-xl-rightcheckout mr-0 p-2 mb-5   " style="border-radius:5%;">
                    <h4 style="font-family: sans-serif"><b>Grand total = Rs. <?php echo $_SESSION['grandtotal']; ?> </b></h4>
                </div>
               <h4 style="font-family:Georgia, 'Times New Roman', Times, serif">
                    <select name="region" id="region" required>
                    <option value="Hinjewadi">Hinjewadi</option>
                    <option value="Wakad">Wakad</option>
                    <option value="Baner">Baner</option>
                    <option value="Kothrud">Kothrud</option>
                    <option value="Hadapsar">Hadapsar</option>
                    <option value="Viman Nagar">Viman Nagar</option>
                    <option value="Kharadi">Kharadi</option>
                </select>
            </h4>
        </div>
        <div class="container mt-5">
            <div class="text">
                <h3 style="font-family:Georgia, 'Times New Roman', Times, serif">Check your Items </h3>
            </div>
            <hr style="margin-top:-0.5%">
            <table class="table">
                <thead>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Total (in Rs)</th>
                    <!-- <th>Status</th> -->
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
                                        <td data-label="Sr.No"><?=$i + 1 ?></td>
                                        <td data-label="Name"><?=$product_title ?></td>
                                        <td data-label="quantity "><?=$quantity ?></td>
                                        <td data-label="Total (in Rs)"><?=$subtotal ?></td>
                                        
                                    </tr>
                                </tbody>

                             <?php
                                $i++;
                            }
                            
                        }      
                    
                 ?>
            </table>
        </div>

       
        <div class="container mt-5">
            <div class="text">
                <h3 style="font-family:Georgia, 'Times New Roman', Times, serif">Select Your Payment Mode</h3>
            </div>
            <hr style="margin-top:-0.5%">

            <div class="payment">
                <h4>Payment Options :-
                    <input type="radio" aria-label="Radio button for following text input" name="payment" value="paytm"   required>
                    <img src="assets/images/upi.png" alt="upi" class="upi" style="width: 50px; height: 40px;">
                    <input type="radio" aria-label="Radio button for following text input" name="payment" value="cod" required>
                    <img src="assets/images/cod.jpg" alt="cod" class="cod" style="height:37px">
                </h4>
            </div>
            <div class="float-none float-sm-none float-md-none float-lg-right float-xl-right placeorder">
                <a href="#"><button type="submit" name="submit" class="btn btn-lg  border border-dark " style="font-size:22px;color:black;background-color:#FFD700">
                        Place Order
                        <i class="fas fa-thumbs-up"></i>
                    </button>
                </a>
            </div>
    </form>



    <br> <br><br>
    <div class="float-none float-sm-none float-md-none float-lg-right float-xl-right goback ">
        <a href="?cartpage"><button type="button" class="btn btn-lg  border border-dark  " style="font-size:22px;color:black;background-color:#FFD700;margin-left:-8%;">
                <i class="fas fa-arrow-left"></i> Go Back </button></a>
    </div>
    </div>

    <br>
    
</body>

</html>
