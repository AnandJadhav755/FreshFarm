# FreshFarm 🥦🛒

FreshFarm is a final-year BCA project built using **PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**.  
It's a simple e-commerce web platform designed to connect **farmers** and **customers** for buying and selling organic groceries.

## 👥 User Roles

### 👨‍🌾 Farmer
- Upload organic product photos and details
- View monthly sales report (graph format)
- Make decisions based on report

### 🧑‍🌾 Customer
- Browse and add items to cart
- Checkout with Cash on Delivery (COD) or UPI
- Pick up items on Sunday from a chosen location

## 💻 Tech Stack
- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Database: MySQL (using XAMPP)

## 📊 Features
- Role-based login for Farmers and Customers
- Sales reports for farmers (per month)
- Photo-based product listing
- No AJAX used (full page reloads only)
- Dynamic pricing for organic items

## 📂 Project Structure

FreshFarm/ 
├── css/ 
├── js/ 
├── images/ 
├── php/ 
  │ ├── login.php │
    ├── register.php │
    ├── farmer_dashboard.php 
    │ └── ...
├── sql/ 
  │ └── freshfarm_database.sql 
└── index.php



## 🗃️ Database Schema
- Tables: `users`, `products`, `orders`, `order_items`, `cart`, `category`, `payments`, `sales_report`

## 📝 How to Run
1. Clone the repo
2. Place it inside `htdocs` of XAMPP
3. Import the SQL file into phpMyAdmin
4. Run `http://localhost/FreshFarm` in browser

---

## 📌 Notes
- This is my final year BCA project.
- All documentation is signed and submitted.
- Built without frameworks or AJAX for simplicity.

