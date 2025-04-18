<?php
require_once 'functions.php';



//for managaing signup
if(isset($_GET['signup'])){
    $response=validateSignupForm($_POST);
    if($response['status']){
        if(createUser($_POST)){
            header('location:../../?login&newuser');
            }else{
                echo "<script>alert('somethihng is wrong')</script>";
            }
    }else{
        $_SESSION['error']=$response;
        $_SESSION['formdata']=$_POST;
        header("location:../../?signup");
    }
        
}
    
    //for managing login
    if(isset($_GET['login'])){
        $response=validateLoginForm($_POST);
      
        if($response['status']){
         $_SESSION['Auth'] = true;
         $_SESSION['userdata'] = $response['user'];

    
         header("location:../../");
    
        }else{
            $_SESSION['error']=$response;
            $_SESSION['formdata']=$_POST;
            header("location:../../?login");
        }
            
}
if(isset($_GET['InsertProduct'])){
    if(addProduct($_POST,$_FILES)){
        header('location:../../');
    }else{
        echo "<script>alert('something is wrong')</script>";
    }
    
}
if(isset($_GET['logout'])){
    session_destroy();
    header('location:../../');

}
if(isset($_GET['EditProfile'])){
        $response=checkpwd($_POST);
        if($response['status']){
            if(EditProfile($_POST)){
                header('location:../../?FarmerProfile');
                }else{
                    echo "<script>alert('something is wrong')</script>";
                }
        }else{
            $_SESSION['error']=$response;
            $_SESSION['formdata']=$_POST;
            header("location:../../?EditProfile_Farmer");
        }
    
}


if (isset($_POST['update_pro'])) {
   if(updateProduct($_POST)){
     header('location:../../?MyProducts');
   }else{
    echo "<script>alert('something is wrong')</script>";
   }
}

if (isset($_POST['delete_pro'])) {
    if(deleteProduct($_POST)){
        header('location:../../?MyProducts');
      }else{
       echo "<script>alert('something is wrong')</script>";
}
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    DeleteProductCart($product_id);
}
if (isset($_GET['AddQty'])) {
    $product_id = $_GET['AddQty'];
    AddQty($product_id);
}
if (isset($_GET['MinusQty'])) {
    $product_id = $_GET['MinusQty'];
    MinusQty($product_id);
}
if (isset($_GET['add_cart'])) {
    $product_id = $_GET['add_cart'];
    $quantity=$_GET['quantity'];
    cart($product_id,$quantity);

}if (isset($_GET['emptyCart'])) { 
    emptyCart($emptyCart);
}if (isset($_GET['checkout'])) { 
    buyerOrders($_POST);
}
?>
