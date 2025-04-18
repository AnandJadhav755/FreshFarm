<?php

require_once 'assets/php/functions.php';
$pagecount = count($_GET);
// Check for specific page actions and render accordingly
if(isset($_SESSION['Auth']) && !$pagecount){
    if(checkUserType()){
        showPage('header', ['page_title' => 'Home']);
        showPageFarmer('farmer_nav');
        showPageFarmer('farmerHomePage');
    }else{
        showPageBuyer('bhome');
    }
    
}elseif(isset($_SESSION['Auth']) && isset($_GET['MyProducts'])){
    showPageFarmer('header', ['page_title' => 'MyProducts']);
    showPageFarmer('farmer_nav');
    showPageFarmer('MyProducts');
}elseif(isset($_SESSION['Auth']) && isset($_GET['transactions'])){
    showPageFarmer('header', ['page_title' => 'Transaction']);
    showPageFarmer('farmer_nav');
    showPageFarmer('Transactions');
}elseif(isset($_SESSION['Auth']) && isset($_GET['aboutus'])){
    showPageFarmer('header', ['page_title' => 'About Us']);
    showPageFarmer('farmer_nav');
    showPageFarmer('aboutUs');
}elseif(isset($_SESSION['Auth']) && isset($_GET['InsertProduct'])){
    showPageFarmer('InsertProduct');
}elseif(isset($_SESSION['Auth']) && isset($_GET['FarmerProductDetails'])){
    
    showPageFarmer('FarmerProductDetails');
    
}
elseif(isset($_SESSION['Auth']) && isset($_GET['EditProduct'])){
    showPageFarmer('EditProduct');
    
}elseif(isset($_SESSION['Auth']) && isset($_GET['FarmerProfile'])){
    //showPage('header', ['page_title' => 'FarmerProductDetails']);
    //showPage('farmer_nav');
    showPageFarmer('FarmerProfile');
    
}elseif(isset($_SESSION['Auth']) && isset($_GET['EditProfile_Farmer'])){
    //showPage('header', ['page_title' => 'FarmerProductDetails']);
    //showPage('farmer_nav');
    showPageFarmer('EditProfile');
    
}elseif(isset($_SESSION['Auth']) && isset($_GET['reports'])){
    //showPage('header', ['page_title' => 'FarmerProductDetails']);
    //showPage('farmer_nav');
    showPageFarmer('Reports');
    
}
elseif(isset($_SESSION['Auth']) && isset($_GET['bhome'])){
    showPageBuyer('bhome');
}elseif(isset($_SESSION['Auth']) && isset($_GET['SearchResult'])){
    showPageBuyer('SearchResult');
}elseif(isset($_SESSION['Auth']) && isset($_GET['Buyer_Transaction'])){
    showPageBuyer('Transaction');
}elseif(isset($_SESSION['Auth']) && isset($_GET['buyerprofile'])){
    showPageBuyer('buyerprofile');
}elseif(isset($_SESSION['Auth']) && isset($_GET['cartpage'])){
    
    showPageBuyer('cartpage');
}elseif(isset($_SESSION['Auth']) && isset($_GET['farmers'])){
    showPageBuyer('farmers');
}elseif(isset($_SESSION['Auth']) && isset($_GET['Checkout'])){
    showPageBuyer('Checkout');
}
elseif(isset($_GET['signup'])) {
    showPage('header', ['page_title' => 'FreshFarm - SignUp']);
    showPage('signup');
} elseif (isset($_GET['login'])) {
    showPage('header', ['page_title' => 'FreshFarm - Login']);
    showPage('login');
} elseif (isset($_GET['forgotpassword'])) {
    showPage('header', ['page_title' => 'FreshFarm - Forgot Password']);
    showPage('forgot_password');
} else {
    if(isset($_SESSION['Auth'])){
        showPageFarmer('header', ['page_title' => 'Home']);
        showPageFarmer('farmer_nav');
        showPageFarmer('farmerHomePage',);
    }else{
        showPage('header', ['page_title' => 'FreshFarm - Login']);
        showPage('login'); // Default page, assuming you have a home.php in assets/pages
    }
    
}

showPage('footer'); // Footer for all pages

// Clear errors after rendering the page to avoid lingering errors on refresh
unset($_SESSION['error']);
unset($_SESSION['formdata']);
?>
