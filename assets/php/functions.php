
<?php
require_once 'config.php';
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die("database is not connected");

//function for showing pages
function showPage($page,$data=""){
include("assets/pages/$page.php");
}
function showPageBuyer($page,$data=""){
    include("assets/pages/Buyer/$page.php");
}
function showPageFarmer($page,$data=""){
    include("assets/pages/Farmer/$page.php");
}

//function for show errors
function showError($field){
    if(isset($_SESSION['error'])){
        $error =$_SESSION['error'];
        if(isset($error['field']) && $field==$error['field']){
           ?>
    <div class="alert alert-danger my-2" role="alert">
      <?=$error['msg']?>
    </div>
           <?php
        }
    }
    }

    //function for show prevformdata
function showFormData($field){
    if(isset($_SESSION['formdata'])){
        $formdata =$_SESSION['formdata'];
        return $formdata[$field];
    }
 
}

//for checking duplicate email
function isEmailRegistered($email){
    global $db;
    $query="SELECT count(*) as row FROM users WHERE email='$email'";
    $run=mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}
function isUsernameRegistered($username){
    global $db;
    $query="SELECT count(*) as row FROM users WHERE username='$username'";
    $run=mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}

function validateSignupForm($form_data){
    $response=array();
    $response['status']=true;

        if(!$form_data['password']){
            $response['msg']="Passwordis not given";
            $response['status']=false;
            $response['field']='password';
        }
        
        if(isUsernameRegistered($form_data['username'])){
            $response['msg']="username is already registered";
            $response['status']=false;
            $response['field']='username';
        }

        if(isEmailRegistered($form_data['email'])){
            $response['msg']="email id is already registered";
            $response['status']=false;
            $response['field']='email';
        }

        if(!$form_data['pnumber']){
            $response['msg']="Phone Number is not given";
            $response['status']=false;
            $response['field']='pnumber';
        }

        if(!$form_data['address']){
            $response['msg']="address is not given";
            $response['status']=false;
            $response['field']='address';
        }

        if(!$form_data['lname']){
            $response['msg']="Last name is not given";
            $response['status']=false;
            $response['field']='lname';
        }

        if(!$form_data['fname']){
            $response['msg']="Fisrt name is not given";
            $response['status']=false;
            $response['field']='fname';
        }
        return $response;
    
    }
    
    
    //for validate the login form
    function validateLoginForm($form_data){
        
        $response=array();
        $response['status']=true;
        $blank=false;
          
            if(!$form_data['password']){
                $response['msg']="password is not given";
                $response['status']=false;
                $response['field']='password';
                $blank=true;
            }
           
            if(!$form_data['username_email']){
                $response['msg']="username/email is not given";
                $response['status']=false;
                $response['field']='username_email';
                $blank=true;
            }
    
            if(!$blank && !checkUser($form_data)['status'] ){
                $response['msg']="something is incorrect, we can't find you";
                $response['status']=false;
                $response['field']='checkuser';
            }else{
                $response['user']=checkUser($form_data)['user'];
            }
            return $response;
        }
    
    
    //for checking the user
    function checkUser($login_data){
    global $db;
     $username_email = $login_data['username_email'];
     $password=md5($login_data['password']);
    echo $username_email;
     $query = "SELECT * FROM users WHERE (email='$username_email' || username='$username_email') && password='$password'";
     $run = mysqli_query($db,$query);
     $data['user'] = mysqli_fetch_assoc($run)??array();
     if(count($data['user'])>0){
         $data['status']=true;
     }else{
        $data['status']=false;
    
     }
    
     return $data;
    }
    
    
    //for getting userdata by id
    function getUser($user_id){
        global $db;
        $query = "SELECT * FROM users WHERE id=$user_id";
        $run = mysqli_query($db,$query);
        return mysqli_fetch_assoc($run);
    
    }

    //for creating new user
function createUser($data){
    global $db;
    $first_name = mysqli_real_escape_string($db,$data['fname']);
    $last_name = mysqli_real_escape_string($db,$data['lname']);
    $address=mysqli_real_escape_string($db,$data['address']);
    $gender = $data['gender'];
    $type = $data['type'];
    $pnumber = mysqli_real_escape_string($db,$data['pnumber']);
    $email = mysqli_real_escape_string($db,$data['email']);
    $username = mysqli_real_escape_string($db,$data['username']);
    $password = mysqli_real_escape_string($db,$data['password']);
    $password = md5($password);
   
    $query = "INSERT INTO users(first_name,last_name,address,gender,user_type,phone_number,email,username,password) ";
    $query.="VALUES ('$first_name','$last_name','$address','$gender','$type','$pnumber','$email','$username','$password')"; 
    return mysqli_query($db,$query);
   }
   

   
//function for verify email
function resetPassword($email,$password){
    global $db;
    $password=md5($password);
    $query="UPDATE users SET password='$password' WHERE email='$email'";
    return mysqli_query($db,$query);
}

//for validating update form
function validateUpdateForm($form_data,$image_data){
    $response=array();
    $response['status']=true;
      

        if(!$form_data['username']){
            $response['msg']="username is not given";
            $response['status']=false;
            $response['field']='username';
        }
        
        if(!$form_data['last_name']){
            $response['msg']="last name is not given";
            $response['status']=false;
            $response['field']='last_name';
        }
        if(!$form_data['first_name']){
            $response['msg']="first name is not given";
            $response['status']=false;
            $response['field']='first_name';
        }
  
        if(isUsernameRegisteredByOther($form_data['username'])){
            $response['msg']=$form_data['username']." is already registered";
            $response['status']=false;
            $response['field']='username';
        }
    
       if($image_data['name']){
           $image = basename($image_data['name']);
           $type = strtolower(pathinfo($image,PATHINFO_EXTENSION));
           $size = $image_data['size']/1000;

           if($type!='jpg' && $type!='jpeg' && $type!='png'){
            $response['msg']="only jpg,jpeg,png images are allowed";
            $response['status']=false;
            $response['field']='profile_pic';
        }

        if($size>1000){
            $response['msg']="upload image less then 1 mb";
            $response['status']=false;
            $response['field']='profile_pic';
        }
       }

        return $response;
    
    }
    function getOrders($farmer_id){
        global $db;
        $query = "SELECT p.name, u.first_name, u.last_name, u.phone_number, o.pick_up_location as address , o.quantity, o.total_price as price
                    FROM  orders o JOIN users u ON o.customer_id = u.user_id
                    JOIN products p ON o.product_id = p.product_id
                    WHERE p.farmer_id = $farmer_id";
        $run = mysqli_query($db,$query);
        $orders = [];
        while ($row = mysqli_fetch_assoc($run)) {
            $orders[] = $row;
        }
    
        return $orders; 
    }

    function getFarmerProducts($farmer_id){
        global $db;
        $query = "SELECT * FROM products WHERE farmer_id = $farmer_id;";
        $run = mysqli_query($db,$query);
        $details = [];
        while ($row = mysqli_fetch_assoc($run)) {
            $details[] = $row;
        }
    
        return $details; ;
    }
    function getCategories(){
        global $db;
        $query = "SELECT * FROM category;";
        $run = mysqli_query($db,$query);
        $details = [];
        while ($row = mysqli_fetch_assoc($run)) {
            $details[] = $row;
        }
    
        return $details; ;
    }
    function getCategoriesById($id){
        global $db;
        $query = "SELECT * FROM category where category_id =$id;";
        $run = mysqli_query($db,$query);
        if ($row = mysqli_fetch_assoc($run)) {
            return $row;
        }
    
        return null ;
    }


    function addProduct($form_data,$image){
        global $db;
        $product_title = $form_data['product_title'];
        $product_cat = $form_data['product_cat'];
        $product_stock = $form_data['product_stock'];
        $product_price = $form_data['product_price'];
        $product_expiry = $form_data['product_expiry'];
        $product_desc = $form_data['product_desc'];
        $product_type = $form_data['product_type'];


        // getting image
        $product_image = $image['product_image']['name'];
        $product_image_tmp = $image['product_image']['tmp_name'];  // for server

        if (isset($_SESSION['Auth'])) {
            $image_dir="../images/$product_image";
            move_uploaded_file($product_image_tmp, $image_dir);
            $id = $_SESSION['userdata']['user_id'];
            $query = "insert into products (farmer_id,category_id, name, 
                                    description,price,quantity, photo_url, product_expiry,
                                    product_type) 
                                    values ('$id','$product_cat','$product_title','$product_desc','$product_price','$product_stock','$product_image','$product_expiry','$product_type')";
            return mysqli_query($db,$query);
        }
    }


    function getFarmerProductsImage()
    {
        global $db;
        if (!isset($_SESSION['userdata']['user_id'])) {
            echo "<br><br><hr><h1 align='center'>User not logged in!</h1><br><br><hr>";
            return;
        }
    
        $fid = $_SESSION['userdata']['user_id'];
        $query = "select * from products where farmer_id=$fid";
        $run = mysqli_query($db, $query);
        $count = 0;
        if ($run) {
            while ($row = mysqli_fetch_assoc($run)) {
                $count = $count + 1;
                $product_title =  $row['name'];
                $image =  $row['photo_url'];
                $price =  $row['price'];
                $id =     $row['product_id'];
                $path = "assets/images/" . $image;

                echo "
                    <div class='productbox'>
                        <a href='?FarmerProductDetails&id=$id'>
                        <img src='assets/images/$image' alt= 'Image Not Available' onerror=this.src='assets/images/noimage.jpg'>
                        </a>

                        <div>
                            <p><b>$product_title</b></p>
                            <p><b>Price : Rs $price</b></p>
                        </div>

                    </div>";
            }
        } else {
            echo "<br><br><hr><h1 align = center>Product Not Uploaded !</h1><br><br><hr>";
        }
    }
    function checkStokes($prod_id){
        global $db;
        $query = "select * from products where product_id=$prod_id";
        $run= mysqli_query($db, $query);
        $resultCheck = mysqli_num_rows($run);
        if ($resultCheck > 0) {
            return  mysqli_fetch_assoc($run);
        }
        else {
            return null; 
        }
    }
    function checkpwd($data){
        global $db;
        $response=array();
        $response['status']=true;
        $old_pwd = mysqli_real_escape_string($db, $data['old_pwd']);
        $new_pwd = mysqli_real_escape_string($db, $data['new_pwd']);
        if (!empty($old_pwd) && empty($new_pwd)) {
            $response['msg']="New password is required if you are changing it.";
            $response['status']=false;
            $response['field']='new_pwd';
        }
        if (empty($old_pwd) && !empty($new_pwd)) {
            $response['msg']="Old password is required to change the password.";
            $response['status']=false;
            $response['field']='old_pwd';
        }
    
        if (!empty($old_pwd) && !empty($new_pwd)) {
            $query = "SELECT password FROM users WHERE user_id='$uid'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);
    
            if (!$row || md5($old_pwd) !== $row['password']) {
                $response['msg']="Old password is incorrect.";
                $response['status']=false;
                $response['field']='old_pwd'; 
            } 
        }
        return $response;
    }
   function EditProfile($data) {
    global $db;
    $response = array();
    $response['status'] = true;

    $phone = mysqli_real_escape_string($db, $data['phonenumber']);
    $address = mysqli_real_escape_string($db, $data['address']);
    $email = mysqli_real_escape_string($db, $data['email']);
    $old_pwd = mysqli_real_escape_string($db, $data['old_pwd']);
    $new_pwd = mysqli_real_escape_string($db, $data['new_pwd']);
    $uid = $_SESSION['userdata']['user_id'];

    $query = "UPDATE users 
              SET phone_number = '$phone', 
                  address = '$address', 
                  email = '$email'";

    if (!empty($old_pwd) && !empty($new_pwd)) {
        $hashed_new_pwd = md5($new_pwd);
        $query .= ", password = '$hashed_new_pwd'";
    }

    $query .= " WHERE user_id='$uid'";

    if (mysqli_query($db, $query)) {
        // Update session data after a successful update
        $_SESSION['userdata']['phone_number'] = $phone;
        $_SESSION['userdata']['address'] = $address;
        $_SESSION['userdata']['email'] = $email;

        if (!empty($old_pwd) && !empty($new_pwd)) {
            $_SESSION['userdata']['password'] = $hashed_new_pwd; // Optional
        }

        return true;
    } else {
        return false;
    }
}
function productDetailsById($id){
    global $db;
    $getting_prod = "select * from products where product_id = $id";
    $run = mysqli_query($db, $getting_prod);
    $orders = [];
    if ($details = mysqli_fetch_assoc($run)) {
        return $details;
    }
    return $orders;

}


function checkUserType(){
    global $db;
    $user_id=$_SESSION['userdata']['user_id'];
    $query = "SELECT user_type FROM users WHERE user_id='$user_id'";
    $run = mysqli_query($db, $query);
    $data = mysqli_fetch_assoc($run);

    if($data && $data['user_type'] == 'Farmer'){ 
        return 1;
    } else {
        return 0;
    }
}

function totalItems(){
    global $db;
    if (isset($_SESSION['userdata']['user_id'])) {
        $customer_id = $_SESSION['userdata']['user_id'];
        $query = "SELECT COUNT(*) AS total_items 
                  FROM cart where customer_id = '$customer_id'";

        $run_query = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($run_query);

        return $data['total_items'];
    } else {
        return 0;
    }
}


function getProductsByCategory($category_id)
{
    global $db;

    $query = "SELECT * FROM products WHERE category_id = $category_id ORDER BY RAND() LIMIT 0,10";
    $run_query = mysqli_query($db, $query);

    while ($row_cat = mysqli_fetch_assoc($run_query)) {
        $product_name = $row_cat['name'];
        echo "<a class='dropdown-item' href='?SearchResult=$product_name'>$product_name</a>";
    }
}

function getCrops()
{
    getProductsByCategory(4); 
}

function getFruits()
{
    getProductsByCategory(2); 
}

function getVegetables()
{
   getProductsByCategory(1);
}
function getProducts()
{
    global $db;

    // Optimized query: Fetch products and farmer names in a single query
    $query = "SELECT p.product_id, p.farmer_id, p.name AS product_name, p.photo_url, p.price, u.first_name AS farmer_name
              FROM products p
              JOIN users u ON p.farmer_id = u.user_id
              ORDER BY RAND() 
              LIMIT 6";

    $run_query = mysqli_query($db, $query);
    
    echo "<br>";
    
    while ($row = mysqli_fetch_assoc($run_query)) {
        $product_id = $row['product_id'];
        $farmer_name = $row['farmer_name'];
        $product_title = $row['product_name'];
        $product_image = $row['photo_url'];
        $product_price = $row['price'];

        echo "
            <div class='col col-12 col-sm-12 col-md-4 col-xl-4 col-lg-4'>
                <div class='card pb-1 pl-1 pr-1 pt-0' style='height:542px'>
                    <br>
                    <div class='mt-0'><b>
                        <h4><img src='assets/images/iconsmall.png' style='width: 28px; margin-bottom: 10px;'> $farmer_name
                        </b></h4>
                    </div>
                    <img class='card-img-top' src='assets/images/$product_image' alt='Product Image' height='300px'>
                    <div class='card-body pb-0'>
                     <form action='assets/php/actions.php' method='get'>
                        <input type='hidden' name='add_cart' value='$product_id'>
                        <div class='row'>
                            <div class='col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12'>
                                <h5 class='card-title font-weight-bold'>$product_title</h5>
                            </div>
                            <div class='col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12'>
                                <div class='input-group mb-1'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text bg-warning border-secondary p-1' style='color:black;'><b>Quantity</b></span>
                                    </div>
                                    <input type='number'  name='quantity' class='form-control' style='width:50px;' aria-describedby='inputGroup-sizing-default' min='1' value='1'>
                                </div>
                            </div>
                        </div>
                        <p class='card-text mb-2 font-weight-bold'>PRICE: $product_price Rs/kg</p>
                        <div class='row'>
                            <div class='col-1 col-xl-3 col-lg-2 col-md-2 col-sm-2'></div>
                            <div class='col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12'>
                               <button type='submit' class='btn btn-warning border-secondary' style='color:black; font-weight:bold;'>
                                    Add to cart <img src='assets/images/carticons.png' height='20px'>
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        ";
    }
}




function getVegetablesHomepage()
{
    global $db;
    $query = "select * from products where category_id = 1 and not (photo_url = '') order by RAND() LIMIT 0,4";
    $run_query = mysqli_query($db, $query);
    while ($rows = mysqli_fetch_array($run_query)) {
        $product_id = $rows['product_id'];
        $product_title = $rows['name'];
        $product_image = $rows['photo_url'];
        $product_price = $rows['price'];
        $product_cat = $rows['category_id'];
        $product_type = $rows['product_type'];

        echo "<div class='column kolum'>
            <div class='img-thumbnail ''>
                 <a href='?SearchResult=$product_title'>
                    <img class='rounded mx-auto d-block images' src='assets/images/$product_image' width='350px' height='200px' alt='image'>
                 </a>
            </div>
        </div>";
    }
}

function getFruitsHomepage()
{
    global $db;
    $query = "select * from products where category_id = 2 and not (photo_url = '') order by RAND() LIMIT 0,4";
    $run_query = mysqli_query($db, $query);
    while ($rows = mysqli_fetch_array($run_query)) {
        $product_id = $rows['product_id'];
        $product_title = $rows['name'];
        $product_image = $rows['photo_url'];
        $product_price = $rows['price'];
        $product_cat = $rows['category_id'];
        $product_type = $rows['product_type'];
        echo "<div class='column kolum'>
            <div class='img-thumbnail ''>
                 <a href='?SearchResult=$product_title'>
                    <img class='rounded mx-auto d-block images' src='assets/images/$product_image' width='350px' height='200px' alt='image'>
                 </a>
            </div>
        </div>";
    }
}

function cart($product_id,$qty)
{
    global $db;
    
    $user_id = $_SESSION['userdata']['user_id']; 
    

    // Check if product already exists in the cart
    $check_cart_query = "SELECT quantity FROM cart WHERE customer_id = '$user_id' AND product_id = '$product_id'";
    $run_check = mysqli_query($db, $check_cart_query);

    if ($row = mysqli_fetch_assoc($run_check)) {
        // Update quantity if product exists
        $new_qty = $row['quantity'] + $qty;
        $update_query = "UPDATE cart SET quantity = '$new_qty' WHERE customer_id = '$user_id' AND product_id = '$product_id'";
        mysqli_query($db, $update_query);
    } else {
        // Insert new product into cart
        $insert_cart_query = "INSERT INTO cart (customer_id, product_id, quantity, price) 
                              SELECT '$user_id', '$product_id', '$qty', price FROM products WHERE product_id = '$product_id'";
        mysqli_query($db, $insert_cart_query);
    }

    header("location:../../?bhome");
}



function updateProduct($details){
    global $db;
   
        $product_id = $details['product_id'];
        $product_title = $details['product_title'];
        $product_stock = $details['product_stock'];
        $product_price = $details['product_price'];
        $product_expiry = $details['product_expiry'];
        $product_desc = $details['product_desc'];
        $product_type = $details['product_type'];
        $sql = "UPDATE products SET 
                    name='$product_title', 
                    quantity='$product_stock', 
                    price='$product_price', 
                    product_expiry='$product_expiry', 
                    description='$product_desc', 
                    product_type='$product_type'
                WHERE product_id='$product_id'";
    
        if (mysqli_query($db, $sql)) {
           return 1;
        } else {
           return 0;
        }
}

function deleteProduct($details){
    global $db;
    $product_id = $details['product_id'];

    $sql = "DELETE FROM products WHERE product_id='$product_id'";
    
    if (mysqli_query($db, $sql)) {
        return 1;
    } else {
       return 0;
    }
}

function insertReportData() {
    global $db;
    
    $query = "INSERT INTO sales_report (farmer_id, product_name, total_items_sold, total_price, month)
    SELECT 
        p.farmer_id,
        p.name AS product_name,
        o.quantity AS total_items_sold,
        o.total_price AS total_price,
        DATE_FORMAT(NOW(), '%Y-%m') AS month
        FROM orders o
        JOIN products p ON o.product_id = p.product_id
        GROUP BY p.farmer_id, p.name
        ON DUPLICATE KEY UPDATE 
        total_items_sold = VALUES(total_items_sold),
        total_price = VALUES(total_price)";

    if (mysqli_query($db, $query)) {
        return 1;
    } else {
        return 0;
    }
}


function fetch_sales_data($farmer_id){
    insertReportData();
    global $db;
    $query = "SELECT product_name,total_items_sold,total_price,month FROM sales_report WHERE farmer_id = $farmer_id";
    $run = mysqli_query($db,$query);
    $sales_data = [];
    while ($row = mysqli_fetch_assoc($run)) {
        $sales_data[] = $row;
    }
    return $sales_data;
}
function showSearchItem(){
    global $db;
    if (isset($_GET['SearchResult'])) {
        $search_query = $_GET['SearchResult'];
        $get_pro = "select * from products where name like '%$search_query%'";
        $run_pro = mysqli_query($db, $get_pro);
        $count = mysqli_num_rows($run_pro);
        if ($count > 0) {
             echo "<br>";
             while ($rows = mysqli_fetch_array($run_pro)) {
                  $product_id = $rows['product_id'];
                  $product_title = $rows['name'];
                  $product_image = $rows['photo_url'];
                  $product_price = $rows['price'];
                
                  $farmer_fk = $rows['farmer_id'];
                  $farmer_name_query = "select first_name from users where user_id = $farmer_fk";
                  $running_query_name = mysqli_query($db, $farmer_name_query);
                  while ($names = mysqli_fetch_array($running_query_name)) {
                      $farmer_name = $names['first_name'];
                  }
                  echo "
            <div class='col col-12 col-sm-12 col-md-4 col-xl-4 col-lg-4'>
                <div class='card pb-1 pl-1 pr-1 pt-0' style='height:542px'>
                    <br>
                    <div class='mt-0'><b>
                        <h4><img src='assets/images/iconsmall.png' style='width: 28px; margin-bottom: 10px;'> $farmer_name
                        </b></h4>
                    </div>
                    <img class='card-img-top' src='assets/images/$product_image' alt='Product Image' height='300px'>
                    <div class='card-body pb-0'>
                     <form action='assets/php/actions.php' method='get'>
                        <input type='hidden' name='add_cart' value='$product_id'>
                        <div class='row'>
                            <div class='col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12'>
                                <h5 class='card-title font-weight-bold'>$product_title</h5>
                            </div>
                            <div class='col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12'>
                                <div class='input-group mb-1'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text bg-warning border-secondary p-1' style='color:black;'><b>Quantity</b></span>
                                    </div>
                                    <input type='number'  name='quantity' class='form-control' style='width:50px;' aria-describedby='inputGroup-sizing-default' min='1' value='1'>
                                </div>
                            </div>
                        </div>
                        <p class='card-text mb-2 font-weight-bold'>PRICE: $product_price Rs/kg</p>
                        <div class='row'>
                            <div class='col-1 col-xl-3 col-lg-2 col-md-2 col-sm-2'></div>
                            <div class='col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12'>
                               <button type='submit' class='btn btn-warning border-secondary' style='color:black; font-weight:bold;'>
                                    Add to cart <img src='assets/images/carticons.png' height='20px'>
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        ";
             }
        } else {
             echo "<br><br><hr><h1 align = center>Product Not Available !</h1><br><br><hr>";
        }
   }
}
function getBuyerTransaction(){
    
    global $db;
             
    $user_id = $_SESSION['userdata']['user_id'];
    $sel_price = "SELECT * from orders WHERE customer_id = $user_id";
    $run_price = mysqli_query($db, $sel_price);
    $i = 0;

    while ($p_price = mysqli_fetch_array($run_price)) {
        $product_id = $p_price['product_id'];
        $qty = $p_price['quantity'];
        $total = $p_price['total_price'];
        $address = $p_price['pick_up_location'];
        $delivery = $p_price['status'];
       // $payment = $p_price['payment'];

        $pro_price = "select * from products where product_id='$product_id'";
        $run_pro_price = mysqli_query($db, $pro_price);
        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
            $product_title = $pp_price['name'];
            $farmer_id = $pp_price['farmer_id'];

            $query_name = "select * from users where user_id = $farmer_id";
            $run_query_name = mysqli_query($db, $query_name);
            while ($names = mysqli_fetch_array($run_query_name)) {
                $farmer_name = $names['first_name'];
                $farmer_phone = $names['phone_number'];
echo"
                <tr>
                    <td data-label='Farmer name'>$farmer_name</td>
                    <td data-label='Phone'> $farmer_phone</td>
                    <td data-label='Address'>$address</td>
                    <td data-label='Product'> $product_title</td>
                    <td data-label='Quantity'>$qty</td>
                    <td data-label='Amount'> $total </td>
                </tr>

";
            }
        }
        $i++;
    }

}

function cartDetails($user_id) {
    global $db;
    
    // Get the cart items for the given user
    $query = "SELECT product_id, quantity, price FROM cart WHERE customer_id = '$user_id'";
    $run = mysqli_query($db, $query);
    
    // Initialize array for storing cart details
    $orders = [];
    $i = 0;
    
    while ($p_cart = mysqli_fetch_array($run)) {
        $product_id = $p_cart['product_id'];
        $quantity = $p_cart['quantity'];
        $product_price = $p_cart['price'];

        // Fetch product name from the products table
        $pro_query = "SELECT name FROM products WHERE product_id = '$product_id'";
        $run_pro_query = mysqli_query($db, $pro_query);

        if ($pp_data = mysqli_fetch_array($run_pro_query)) {
            $product_name = $pp_data['name'];

            // Calculate the subtotal for the product (price * quantity)
            $subtotal = $quantity * $product_price;

            // Store the product details and subtotal in the cartItems array
            $orders[] = [
                'product_id' => $product_id,
                'product_name' => $product_name,
                'quantity' => $quantity,
                'price' => $product_price,
                'subtotal' => $subtotal
            ];
        }
        
        // Store the quantity in session for potential future use
        $_SESSION['quantity'][$i] = $quantity;
        $i++;
    }

    return $orders;
}



function AddQty($product_id){
    global $db;
    $customer_id = $_SESSION['userdata']['user_id'];
   
    $query = "select * from cart where product_id = '$product_id' AND customer_id= $customer_id";
    $run = mysqli_query($db,$query);
    while ($row = mysqli_fetch_array($run)) {
        $qty = $row['quantity'];
        $price=$row['price'];

    }
   
    if ($qty > 0) {
        $qty +=1;
        $query = "update cart set quantity = '$qty' where product_id = '$product_id' AND customer_id= $customer_id";
        mysqli_query($db, $query);
        
    }

    header("location:../../?cartpage");
}

function MinusQty($product_id){
    global $db;
    $customer_id = $_SESSION['userdata']['user_id'];
 
    $query = "select * from cart where product_id = '$product_id'";
    $run = mysqli_query($db,$query);
    while ($row = mysqli_fetch_array($run)) {
        $qty = $row['quantity'];
        $price=$row['price'];
        
    }
   
    if ($qty > 1) {
        $qty -=1;
        $query = "update cart set quantity = '$qty' where product_id = '$product_id' AND customer_id= $customer_id";
        mysqli_query($db, $query);
       
    }

    header("location:../../?cartpage");
}

function DeleteProductCart($product_id){
   global $db;
    $customer_id = $_SESSION['userdata']['user_id'];
     $delete_product = "delete from cart where  product_id = '$product_id' and customer_id=$customer_id";
     $run_delete = mysqli_query($db, $delete_product);
     header("location:../../?cartpage");
}

function emptyCart() {
    global $db;

    $user_id = $_SESSION['userdata']['user_id'];

    $query = "SELECT cart_id FROM cart WHERE customer_id = '$user_id'";
    $result = mysqli_query($db, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $cart_id = $row['cart_id'];

        $delete_items_query = "DELETE FROM cart WHERE cart_id = '$cart_id'";
        mysqli_query($db, $delete_items_query);

       
    }

   header("location:../../?cartpage");

}
function getFarmer(){
    global $db;
        $query = "SELECT first_name,address from users where user_type='Farmer'";
        $run = mysqli_query($db,$query);
        $orders = [];
        while ($row = mysqli_fetch_assoc($run)) {
            $orders[] = $row;
        }
    
        return $orders; 
}
function buyerOrders($data){
        global $db;
        $address = $data['region'];
        $payment = $data['payment'];
        $total = $_SESSION['grandtotal'];
        $user_id=$_SESSION['userdata']['user_id'];
        $orders=cartDetails($user_id);
              
                if (count($orders) > 0) {
                 foreach ($orders as $order) {
                             $product_title=$order['product_name'];
                             $product_price=$order['price'];
                             $subtotal =$order['subtotal'];
                             $product_id=$order['product_id'];
                             $quantity=$order['quantity'];
            $query1 = "insert into orders (product_id,quantity,customer_id,order_date,pick_up_location,status,payment,total_price) values ('$product_id','$quantity','$user_id',NOW(),'$address','Pending','$payment','$subtotal')";
            $run = mysqli_query($db, $query1);
           
        }
    }
        $clear = "delete from cart where customer_id = $user_id";
        $run = mysqli_query($db, $clear);
        if ($run) {       
            header("location:../../?bhome");
        }
        

}