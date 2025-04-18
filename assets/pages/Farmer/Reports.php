<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 15px;
            margin-right: 10px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
        #error-message {
            color: red;
            margin-bottom: 20px;
        }
        #loading-message {
            display: none;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Monthly Sales Report</h1>
    </header>

    <div id="loading-message">Loading sales data...</div>
    <div id="error-message"></div>

    <!-- Table for Sales Data -->
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Total Item Sold</th>
                <th>Total Sales (INR)</th>
                <th>Month</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                        $orders=fetch_sales_data($_SESSION['userdata']['user_id']);
                        if (count($orders) > 0) {
                         foreach ($orders as $order) {
                             $product_name=$order['product_name'];
                             $total_items_sold=$order['total_items_sold'];
                             $total_price=$order['total_price'];
                             $month=$order['month'];
                         
                    ?>
                    <tr>
                         <td data-label="Product Name"><?php echo $product_name; ?></td>
                         <td data-label="total_items_sold"><?php echo $total_items_sold; ?></td>
                         <td data-label="total_price"><?php echo $total_price; ?></td>
                         <td data-label="month"><?php echo $month; ?></td>
                    </tr>
                    <?php
                         }
                         } else {
                             echo "No orders found for this farmer.<br>";
                    }
                    ?>
               </tbody>
    </table>

   
</body>
</html>