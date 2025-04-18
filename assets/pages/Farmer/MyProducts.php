<br>
<div class=content_item>
     <label style="font-size :30px; text-shadow: 1px 1px 1px gray;"><b>All Products</b></label>
          <?php
               if (isset($_SESSION['Auth'])) {

                    echo "<a href='?InsertProduct'>
                    <button class='btn btn-warning btn-lg p-3 m-3 font-weight-bold'>Add New Product <i class='fas fa-plus-square p-2 fa-1x'></i>
                    </button>
                    </a>";
               } else {
                       echo "<a href='../auth/FarmerLogin.php'>
                         <button class='btn btn-warning btn-lg p-3 m-3 font-weight-bold'>Add New Product <i class='fas fa-plus-square p-2 fa-1x'></i>
                         </button>
                          </a>";
                }
               ?>

          </div>

          <br>
          <main>
               <div class="products">
                    <?php
                    
                    if (isset($_SESSION['Auth'])) {
                         getFarmerProductsImage();
                    } else {
                         echo "<br><br><h1 align = center>Please Login!</h1><br><br><hr>";
                    }
                    ?>
               </div>
               <br> <br>
               <hr>
          </main>
