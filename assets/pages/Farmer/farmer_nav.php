<nav class="navbar navbar-expand-xl ">
     <button class="navbar-toggler" data-toggle="collapse" style="margin-left:-20px;" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"><i class="fas fa-bars p-1 " style="color:green;font-size:20px; "></i></span>
     </button>
     <a class="float-left" href="?farmerHomepage">
          <img src="assets/images/logo.jpg" class="float-left mr-2 moblogo" alt="Logo" style="height:50px;">
     </a>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="proicon">
               <?php
                      if (!isset($_SESSION['Auth'])) {
                         echo "<a href='?login'> <div class='text-success  logins '></div></a>";
                    }
               ?>
          </div>
     </div>

     <div class=" flex-row-reverse right ">
          <div class="p-2 cart">
               <div class='loginz'>
                    <?php echo "Hello,".$_SESSION['userdata']['first_name'] ?>
                </div>
          </div>
          <div class="dropdown p-2 settings ">
               <button class="btn  dropdown-toggle text-success" style="margin-top:-20px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Settings
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                         if (isset($_SESSION['Auth'])) {
                              echo "<a href='?FarmerProfile' class='dropdown-item' style='padding-right:-20px;'>Profile</a>";
                              echo "<a href='?transactions' class='dropdown-item' style='padding-right:-20px;'>Orders</a>";
                              echo "<a href='?reports' class='dropdown-item' style='padding-right:-20px;'>Reports</a>";
                               echo "<a href='assets/php/actions.php?logout' class='dropdown-item' style='padding-right:-20px;'>Logout</a>";
                         } else {
                              echo "<a href='?login'> <div class='dropdown-item' style='padding-right:-20px;'>Login</div></a>";
                          }
                    ?>
               </div>
           </div>
     </div>
</nav>
<br>
<div class="row" style="text-align:center;">
     <div class="col-md-3 col-sm-12">
          <a href="?farmerHomepage" id="navbar"><i class="fa fa-home" aria-hidden="true"></i><label>Home</label></a>
     </div>
     <div class="col-md-3 col-sm-12">
          <a href="?MyProducts" id="navbar"><i class="fa fa-leaf" aria-hidden="true"></i><label>My Products</label></a>
     </div>
     <div class="col-md-3 col-sm-12">
          <a href="?transactions" id="navbar"><i class="fa fa-exchange" aria-hidden="true"></i><label>My Transactions</label></a>
     </div>
     <div class="col-md-3 col-sm-12">
          <a href="?aboutus" id="navbar"><i class="fa fa-phone fa-rotate-vertical" aria-hidden="true"></i><label>About Us</label></a>
     </div>
</div>
          <hr>