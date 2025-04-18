<br>
<div style="display:block;">
     <div class=content_item><label style="font-size :30px; text-shadow: 1px 1px 1px gray;"><b>TRANSACTION HISTORY</b></label></div>
          <br>
     </div>
     <div class="container">
          <table class="table">
               <thead>
                         <th>Product Name</th>
                         <th>Name</th>
                         <th>Phone Number</th>
                         <th>Delivery Address</th>
                         <th>Quantity</th>
                         <th>Amount</th>
               </thead>
               <tbody>
                    <?php
                        $orders=getOrders($_SESSION['userdata']['user_id']);
                        if (count($orders) > 0) {
                         foreach ($orders as $order) {
                             $product_name=$order['name'];
                             $buyer_name=$order['first_name'] . " " . $order['last_name'];
                             $phone=$order['phone_number'];
                             $address=$order['address'];
                             $qty=$order['quantity'];
                             $totals=$order['price'];
                         
                    ?>
                    <tr>
                         <td data-label="Product Name"><?php echo $product_name; ?></td>
                         <td data-label="Name"><?php echo $buyer_name; ?></td>
                         <td data-label="Phone Number"><?php echo $phone; ?></td>
                         <td data-label="Address"><?php echo $address; ?></td>
                         <td data-label="Quantity"><?php echo $qty; ?></td>
                         <td data-label="Price"><?php echo $totals; ?></td>
                    </tr>
                    <?php
                         }
                         } else {
                             echo "No orders found for this farmer.<br>";
                    }
                    ?>
               </tbody>
          </table>
     </div>
</div> <br> <br>
          