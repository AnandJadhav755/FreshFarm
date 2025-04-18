
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer - Transactions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
</head>
<style>
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
        padding: 12px 15px;
        border: 0px solid #ddd;
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

    @media only screen and (min-device-width:320px) and (max-device-width:480px) {

        .table thead {
            display: none;
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
    <br>
    <div class="container">
        <div class="text-left">
            <h3 class="mt-2">Your Transactions </h3>
            <hr style="margin-top:-0.5%">
        </div>
        <br>

        <table class="table">
            <thead>
                <th>Farmer Name</th>
                <th>Phone</th>
                <th>PickUp Location</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Amount</th>
            </thead>
                
            <tbody>
            <?php
            getBuyerTransaction();
            ?>
            </tbody>
        </table>
        <br><br>
        <a href="?bhome">
            <button type="button" class="btn  btn-lg border border-dark" style="background-color:#FFD700;color:black;">Continue Shopping
                <i class="fas fa-shopping-bag ml-2" aria-hidden="true"></i></button>
        </a>
    </div>

</body>

</html>