
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
<style>
        .guard {
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #ffc857;
        /* background-color: #ffc857; */
        line-height: 0.1em;
        margin: 10px 0 20px;
        font-family: serif;
    }

    .guard span {
        background-color: white;
        padding: 0 10px;
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
.card{
 width: 14rem;

}
    @media only screen and (min-device-width:320px) and (max-device-width:480px) {
        /* .mycarousel {
            display: none;
        }

        .firstimage {
            height: auto;
            width: 90%;
        }
*/
        .card {
            width: 90%;
            margin-left: 5%;
            margin-right: 5%;
            margin-bottom:10%;

        }

       /* .col {
            margin-top: 20px;
        } */

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


    <div class="text-center container">
            <br>

            <b>
                <h1 class="guard text-center"style="  font-family: 'Times New Roman', Times, serif;"><span><b>Farmers</b></span>
                </h1>
            </b>
        </div>
    <div class="container mt-5">
        <div class="row">
            <?php
                $orders=getFarmer();
                
                if (count($orders) > 0) {
                    foreach ($orders as $order) {
                                $name=$order['first_name'];
                                $address=$order['address'];
                                
                                
            ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 ">
                <div class="card border-dark border" >
                    <div class="card-body ">
                        <h5 class="card-title text-center"><img src="assets/images/iconsmall.png" style=" margin-bottom:  10px;"></h5>
                        <h4 class="card-subtitle mb-2  text-center"><?=$name?></h4>
                        <p class="card-text text-center"><?=$address?><br><br>
                            <button type="button" class="btn  border-dark border" style="background-color:#FFD700;color:black">View Profile </button>
                        </p>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            </div>

        </div>


    </div>

</body>

</html>